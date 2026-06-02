const CACHE_NAME = 'green-footprints-v5';
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
    // Always bypass non-GET requests (POST, PUT, DELETE etc.) so forms work correctly
    if (event.request.method !== 'GET') {
        return; // Let browser handle it natively
    }

    // For GET page navigations, use network-first so redirects (e.g. / -> /login) work
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request).catch(() => {
                return caches.match('./');
            })
        );
        return;
    }

    // For GET assets (images, css, js), use cache-first
    event.respondWith(
        caches.match(event.request)
            .then(response => {
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
