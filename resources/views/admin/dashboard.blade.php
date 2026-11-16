<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaTech | Admin Dashboard</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            color: #f4f5ff;
            overflow-x: hidden;
            background: #070b1b;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: -3;
            background:
                radial-gradient(ellipse at 12% 25%, rgba(35,89,255,.28), transparent 42%),
                radial-gradient(ellipse at 88% 30%, rgba(144,35,255,.32), transparent 43%),
                radial-gradient(ellipse at 55% 100%, rgba(64,30,180,.22), transparent 45%),
                linear-gradient(135deg, #07112b 0%, #10103b 50%, #210d42 100%);
        }

        .network {
            position: fixed;
            inset: 0;
            z-index: -2;
            pointer-events: none;
            opacity: .28;
            background-image: radial-gradient(circle, #a995ff 1px, transparent 1.6px);
            background-size: 42px 42px;
            animation: networkMove 22s linear infinite;
        }

        .network::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(35deg, transparent 48%, rgba(135,100,255,.12) 49%, transparent 50%),
                linear-gradient(145deg, transparent 48%, rgba(72,124,255,.1) 49%, transparent 50%);
            background-size: 190px 160px, 230px 190px;
        }

        .particle {
            position: fixed;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            pointer-events: none;
            background: #b69aff;
            box-shadow: 0 0 10px #8b5cff, 0 0 25px #8b5cff;
            z-index: -1;
            animation: particleFloat 6s ease-in-out infinite;
        }

        .p1 { top: 15%; left: 10%; }
        .p2 { top: 30%; left: 85%; animation-delay: 1s; }
        .p3 { top: 65%; left: 20%; animation-delay: 2s; }
        .p4 { top: 80%; left: 75%; animation-delay: 3s; }
        .p5 { top: 45%; left: 50%; animation-delay: 1.5s; }
        .p6 { top: 20%; left: 65%; animation-delay: 2.5s; }
        .p7 { top: 75%; left: 40%; animation-delay: 4s; }
        .p8 { top: 55%; left: 90%; animation-delay: 2s; }
        .p9 { top: 35%; left: 30%; animation-delay: 3.5s; }
        .p10 { top: 90%; left: 15%; animation-delay: 1s; }

        /* Sidebar */

        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 3;
            padding: 30px 20px;
            border-right: 1px solid rgba(157,151,255,.2);
            background: rgba(4,10,38,.82);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            box-shadow: 8px 0 40px rgba(0,0,0,.18);
        }

        .logo {
            color: white;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 40px;
            letter-spacing: -.7px;
        }

        .logo span {
            color: #b69aff;
        }

        .sidebar a {
            display: block;
            padding: 14px 15px;
            margin-bottom: 10px;
            color: #d0d7f5;
            text-decoration: none;
            border-radius: 10px;
            transition: .25s;
            border: 1px solid transparent;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: white;
            background: linear-gradient(110deg, rgba(48,112,255,.9), rgba(133,42,255,.92));
            border-color: rgba(255,255,255,.18);
            box-shadow: 0 0 25px rgba(111,65,255,.3);
        }

        /* Main content */

        .main {
            margin-left: 250px;
            padding: 35px;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .header h1 {
            font-size: clamp(24px, 3vw, 32px);
            letter-spacing: -.6px;
            margin-bottom: 8px;
        }

        .header p {
            color: #b6c2e8;
            margin-top: 8px;
            font-size: 14px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(120,76,255,.15);
            color: #e1d6ff;
            padding: 10px 16px;
            border: 1px solid rgba(176,144,255,.25);
            border-radius: 22px;
            font-size: 12px;
            white-space: nowrap;
        }

        .badge::before {
            content: "";
            width: 7px;
            height: 7px;
            background: #bd8aff;
            border-radius: 50%;
            box-shadow: 0 0 10px #a86bff;
        }

        .alert-success {
            color: #b9ffe0;
            background: rgba(16,185,129,.13);
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid rgba(52,211,153,.35);
            font-size: 13px;
        }

        /* Summary cards */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card,
        .table-box {
            background: linear-gradient(135deg, rgba(255,255,255,.105), rgba(255,255,255,.035));
            border: 1px solid rgba(164,157,255,.22);
            border-radius: 17px;
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            box-shadow: 0 10px 35px rgba(0,0,0,.18), inset 0 1px 0 rgba(255,255,255,.055);
        }

        .card {
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: transform .25s, border-color .25s;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(167,139,250,.55);
        }

        .card::after {
            content: "";
            position: absolute;
            right: -45px;
            top: -55px;
            width: 130px;
            height: 130px;
            background: rgba(112,74,255,.13);
            filter: blur(35px);
            border-radius: 50%;
            pointer-events: none;
        }

        .card .icon {
            font-size: 24px;
            margin-bottom: 17px;
            position: relative;
        }

        .card p {
            color: #bac5e8;
            font-size: 13px;
            position: relative;
        }

        .card h2 {
            font-size: 32px;
            margin-top: 14px;
            color: #d2baff;
            position: relative;
        }

        .card .active-text {
            color: #4adea5;
        }

        /* Chart and tables */

        .table-box {
            padding: 25px;
            margin-bottom: 28px;
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            gap: 12px;
            flex-wrap: wrap;
        }

        .table-header h2 {
            font-size: 21px;
        }

        .table-header span {
            color: #aebbe3;
            font-size: 12px;
        }

        /* Compact, responsive chart */

        .chart-container {
            position: relative;
            width: 100%;
            max-width: 620px;
            height: 260px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th,
        td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid rgba(172,164,255,.14);
            font-size: 13px;
        }

        th {
            color: #dedbff;
            background: rgba(93,87,180,.22);
            white-space: nowrap;
        }

        td {
            color: #e1e6ff;
            vertical-align: middle;
        }

        tbody tr {
            background: rgba(8,13,48,.28);
            transition: background .2s;
        }

        tbody tr:hover {
            background: rgba(112,83,225,.12);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .status-form {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .status-select {
            padding: 9px 10px;
            border: 1px solid rgba(178,169,255,.28);
            border-radius: 7px;
            background: #171943;
            color: #f4f3ff;
            outline: none;
            min-width: 125px;
            font-size: 12px;
        }

        .status-select option {
            background: #171943;
            color: white;
        }

        .status-select:focus {
            border-color: #a98aff;
        }

        .update-btn {
            background: linear-gradient(120deg, #3979ff, #8539f5);
            color: white;
            border: 1px solid rgba(255,255,255,.15);
            padding: 9px 12px;
            border-radius: 7px;
            cursor: pointer;
            transition: .25s;
            font-size: 12px;
            font-weight: 700;
        }

        .update-btn:hover {
            box-shadow: 0 0 24px rgba(131,72,255,.45);
            transform: translateY(-1px);
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #b8c3e6;
        }

        .back-link {
            display: inline-block;
            margin-top: 3px;
            color: #c8afff;
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @keyframes networkMove {
            from { background-position: 0 0; }
            to { background-position: 180px 180px; }
        }

        @keyframes particleFloat {
            0%, 100% {
                transform: translateY(0) scale(1);
                opacity: .4;
            }

            50% {
                transform: translateY(-24px) scale(1.7);
                opacity: 1;
            }
        }

        /* Tablet */

        @media (max-width: 1050px) {
            .sidebar {
                width: 210px;
                padding: 25px 15px;
            }

            .main {
                margin-left: 210px;
                padding: 25px;
            }

            .cards {
                gap: 13px;
            }

            .card {
                padding: 19px;
            }

            .chart-container {
                max-width: 560px;
                height: 250px;
            }
        }

        @media (max-width: 900px) {
            .cards {
                grid-template-columns: 1fr;
            }
        }

        /* Mobile */

        @media (max-width: 760px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                padding: 18px;
            }

            .logo {
                margin-bottom: 15px;
            }

            .sidebar a {
                display: inline-block;
                margin: 0 5px 5px 0;
                padding: 10px 12px;
            }

            .main {
                margin-left: 0;
                padding: 20px 16px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .table-box {
                padding: 17px;
            }

            .table-header h2 {
                font-size: 18px;
            }

            .chart-container {
                height: 220px;
            }

            .card h2 {
                font-size: 28px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    <div class="network" aria-hidden="true"></div>

    <span class="particle p1" aria-hidden="true"></span>
    <span class="particle p2" aria-hidden="true"></span>
    <span class="particle p3" aria-hidden="true"></span>
    <span class="particle p4" aria-hidden="true"></span>
    <span class="particle p5" aria-hidden="true"></span>
    <span class="particle p6" aria-hidden="true"></span>
    <span class="particle p7" aria-hidden="true"></span>
    <span class="particle p8" aria-hidden="true"></span>
    <span class="particle p9" aria-hidden="true"></span>
    <span class="particle p10" aria-hidden="true"></span>

    <!-- Sidebar -->

    <aside class="sidebar">

        <div class="logo">Nova<span>Tech.</span></div>

        <a href="{{ route('admin.dashboard') }}" class="active">
            📊 Dashboard
        </a>

        <a href="{{ route('admin.enquiries') }}">
            📩 Enquiries
        </a>

        <a href="{{ url('/') }}">
            🌐 View Website
        </a>

    </aside>

    <!-- Main dashboard -->

    <main class="main">

        <header class="header">

            <div>
                <h1>Admin Dashboard</h1>
                <p>Welcome to your NovaTech control panel.</p>
            </div>

            <span class="badge">Admin Panel</span>

        </header>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Summary cards -->

        <section class="cards">

            <div class="card">
                <div class="icon">📩</div>
                <p>Total Enquiries</p>
                <h2>{{ $totalEnquiries }}</h2>
            </div>

            <div class="card">
                <div class="icon">📅</div>
                <p>Latest Enquiries</p>
                <h2>{{ $recentEnquiries->count() }}</h2>
            </div>

            <div class="card">
                <div class="icon">🌐</div>
                <p>Website Status</p>
                <h2 class="active-text">Active</h2>
            </div>

        </section>

        <!-- Enquiry chart -->

        <section class="table-box">

            <div class="table-header">
                <h2>📊 Enquiry Status Overview</h2>
                <span>Live statistics</span>
            </div>

            <div class="chart-container">
                <canvas id="enquiryChart"></canvas>
            </div>

        </section>

        <!-- Recent enquiries -->

        <section class="table-box">

            <div class="table-header">
                <h2>Recent Enquiries</h2>
                <span>Latest 5 messages</span>
            </div>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($recentEnquiries as $enquiry)

                        <tr>

                            <td>#{{ $enquiry->id }}</td>

                            <td>{{ $enquiry->name }}</td>

                            <td>{{ $enquiry->email }}</td>

                            <td>{{ $enquiry->subject ?? 'N/A' }}</td>

                            <td>
                                {{ $enquiry->created_at
                                    ? \Carbon\Carbon::parse($enquiry->created_at)->format('d M Y, h:i A')
                                    : 'N/A' }}
                            </td>

                            <td>

                                <form
                                    action="{{ route('admin.enquiries.update', $enquiry->id) }}"
                                    method="POST"
                                    class="status-form"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <select name="status" class="status-select" required>

                                        <option value="New"
                                            {{ in_array($enquiry->status, ['New', 'new']) ? 'selected' : '' }}>
                                            New
                                        </option>

                                        <option value="In Progress"
                                            {{ in_array($enquiry->status, ['In Progress', 'in progress']) ? 'selected' : '' }}>
                                            In Progress
                                        </option>

                                        <option value="Completed"
                                            {{ in_array($enquiry->status, ['Completed', 'completed']) ? 'selected' : '' }}>
                                            Completed
                                        </option>

                                    </select>

                                    <button type="submit" class="update-btn">
                                        Update
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="empty">
                                No enquiries found yet.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </section>

        <a href="{{ url('/') }}" class="back-link">
            ← Back to Website
        </a>

    </main>

    <!-- Professional Chart.js chart -->

    <script>
        const chartCanvas = document.getElementById('enquiryChart');

        const enquiryData = [
            {{ $newEnquiries }},
            {{ $inProgressEnquiries }},
            {{ $completedEnquiries }}
        ];

        const chartColors = [
            '#60A5FA',
            '#FBBF24',
            '#34D399'
        ];

        new Chart(chartCanvas, {

            type: 'bar',

            data: {
                labels: ['New', 'In Progress', 'Completed'],

                datasets: [{
                    label: 'Enquiries',

                    data: enquiryData,

                    backgroundColor: [
                        'rgba(96, 165, 250, 0.82)',
                        'rgba(251, 191, 36, 0.82)',
                        'rgba(52, 211, 153, 0.82)'
                    ],

                    borderColor: chartColors,

                    borderWidth: 1.5,

                    borderRadius: 9,

                    borderSkipped: false,

                    barPercentage: 0.55,

                    categoryPercentage: 0.65,

                    maxBarThickness: 52,

                    hoverBackgroundColor: chartColors,

                    hoverBorderWidth: 2
                }]
            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                animation: {
                    duration: 900,
                    easing: 'easeOutQuart'
                },

                layout: {
                    padding: {
                        top: 22,
                        left: 8,
                        right: 8,
                        bottom: 0
                    }
                },

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {
                        enabled: true,

                        backgroundColor: '#111633',

                        titleColor: '#C4B5FD',

                        bodyColor: '#FFFFFF',

                        borderColor: 'rgba(167, 139, 250, 0.5)',

                        borderWidth: 1,

                        padding: 12,

                        cornerRadius: 10,

                        displayColors: true,

                        callbacks: {
                            label: function(context) {
                                return ' Enquiries: ' + context.parsed.y;
                            }
                        }
                    }
                },

                scales: {

                    x: {

                        border: {
                            display: false
                        },

                        grid: {
                            display: false
                        },

                        ticks: {
                            color: '#E0E7FF',

                            font: {
                                family: 'Inter',
                                size: 12,
                                weight: '600'
                            },

                            padding: 10
                        }
                    },

                    y: {

                        beginAtZero: true,

                        border: {
                            display: false
                        },

                        ticks: {
                            color: '#C4B5FD',

                            precision: 0,

                            stepSize: 1,

                            padding: 10,

                            font: {
                                family: 'Inter',
                                size: 11
                            }
                        },

                        grid: {
                            color: 'rgba(196, 181, 253, 0.12)',
                            drawTicks: false
                        }
                    }
                }
            },

            plugins: [{

                id: 'enquiryValueLabels',

                afterDatasetsDraw(chart) {

                    const ctx = chart.ctx;

                    chart.data.datasets.forEach((dataset, datasetIndex) => {

                        const meta = chart.getDatasetMeta(datasetIndex);

                        meta.data.forEach((bar, index) => {

                            const value = dataset.data[index];

                            if (value === null || value === undefined) {
                                return;
                            }

                            ctx.save();

                            ctx.fillStyle = '#FFFFFF';

                            ctx.font = '600 13px Inter, Arial, sans-serif';

                            ctx.textAlign = 'center';

                            ctx.textBaseline = 'bottom';

                            const yPosition = value === 0
                                ? chart.scales.y.getPixelForValue(0) - 8
                                : bar.y - 8;

                            ctx.fillText(value, bar.x, yPosition);

                            ctx.restore();

                        });

                    });

                }

            }]

        });
    </script>

</body>
</html>