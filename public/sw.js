const CACHE_NAME = 'green-footprints-v4';
const urlsToCache = [
    './',
    './logo.jpeg',
    './manifest.json'
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return Promise.all(
                    urlsToCache.map(url => {
                        return cache.add(url).catch(error => {
                            console.error('Failed to cache:', url, error);
                        });
                    })
                );
            })
    );
});

self.addEventListener('fetch', event => {
    // For page navigations, bypass the strict request object and fetch the URL directly.
    // This allows the browser to naturally follow redirects (like / -> /login) without ERR_FAILED.
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request.url).catch(() => {
                return caches.match('./');
            })
        );
        return;
    }

    // For assets (images, css, js), use cache-first
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Cache hit - return response
                if (response) {
                    return response;
                }
                return fetch(event.request).catch(() => {
                    // Ignore fetch errors for assets
                });
            })
    );
});

self.addEventListener('activate', event => {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});
