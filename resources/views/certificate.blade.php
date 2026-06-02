<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sustainability Certificate</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: #f8fafc;
            color: #1f2937;
            text-align: center;
            padding: 40px;
        }
        .container {
            border: 5px solid #10b981;
            padding: 50px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .logo {
            width: 120px;
            margin-bottom: 20px;
        }
        h1 {
            color: #065f46;
            font-size: 36px;
            margin-bottom: 10px;
        }
        h2 {
            color: #10b981;
            font-size: 28px;
            margin-bottom: 40px;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .name {
            font-size: 32px;
            font-weight: bold;
            color: #1f2937;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #10b981;
            display: inline-block;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .stats {
            background-color: #ecfdf5;
            border: 2px solid #d1fae5;
            padding: 20px;
            border-radius: 10px;
            margin-top: 40px;
        }
        .stat-item {
            font-size: 20px;
            font-weight: bold;
            color: #047857;
            margin: 10px 0;
        }
        .footer {
            margin-top: 60px;
            font-size: 14px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Green Footprints</h1>
        <h2>Certificate of Sustainability</h2>
        
        <p>This is proudly presented to</p>
        <div class="name">{{ $user->name }}</div>
        
        <p>In recognition of their commitment to reducing their carbon footprint and actively segregating waste at the source in the city of {{ $user->city }}.</p>
        
        <div class="stats">
            <p><strong>Latest Ecological Audit</strong></p>
            <div class="stat-item">Carbon Debt: {{ number_format($record->carbon_kg ?? 0, 1) }} kg CO2</div>
            <div class="stat-item">Plastic Used: {{ $record->plastic_items ?? 0 }} items/day</div>
            <div class="stat-item">Trees Debt: {{ $record->trees_debt ?? 0 }} 🌳</div>
        </div>

        <div class="footer">
            <p>Generated on {{ date('F j, Y') }} by Green Footprints</p>
            <p>The Sprouting Step - Individual Impact & Growth</p>
        </div>
    </div>
</body>
</html>
