<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaTech | Enquiries</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        html {
            min-height: 100%;
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

        /* Main area */

        .main {
            margin-left: 250px;
            padding: 35px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .topbar h1 {
            font-size: clamp(24px, 3vw, 32px);
            margin-bottom: 8px;
            letter-spacing: -.6px;
        }

        .topbar p {
            color: #b6c2e8;
            font-size: 14px;
            line-height: 1.6;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .back-btn {
            background: linear-gradient(120deg, #3979ff, #8539f5);
            color: white;
            padding: 12px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid rgba(255,255,255,.2);
            box-shadow: 0 0 22px rgba(104,70,255,.25);
            transition: .25s;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(131,72,255,.45);
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border-radius: 30px;
            color: #e1d6ff;
            background: rgba(120,76,255,.15);
            border: 1px solid rgba(176,144,255,.25);
            font-size: 12px;
        }

        .admin-badge::before {
            content: "";
            width: 7px;
            height: 7px;
            background: #bd8aff;
            border-radius: 50%;
            box-shadow: 0 0 10px #a86bff;
        }

        /* Summary cards */

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0,1fr));
            gap: 20px;
            margin-bottom: 28px;
        }

        .card,
        .table-box,
        .chart-card {
            background: linear-gradient(
                135deg,
                rgba(255,255,255,.105),
                rgba(255,255,255,.035)
            );
            border: 1px solid rgba(164,157,255,.22);
            border-radius: 17px;
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            box-shadow:
                0 10px 35px rgba(0,0,0,.18),
                inset 0 1px 0 rgba(255,255,255,.055);
        }

        .card {
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: transform .3s, border-color .3s;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(169,138,255,.5);
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

        .card p {
            color: #bac5e8;
            margin-bottom: 12px;
            font-size: 13px;
            position: relative;
        }

        .card h2 {
            font-size: 31px;
            color: #d2baff;
            position: relative;
        }

        .card-icon {
            font-size: 23px;
            margin-bottom: 15px;
        }

        /* Analytics charts */

        .analytics {
            display: grid;
            grid-template-columns: repeat(2, minmax(0,1fr));
            gap: 22px;
            margin-bottom: 28px;
        }

        .chart-card {
            min-width: 0;
            padding: 25px;
            transition: transform .3s, border-color .3s, box-shadow .3s;
        }

        .chart-card:hover {
            transform: translateY(-4px);
            border-color: rgba(155,130,255,.6);
            box-shadow: 0 15px 40px rgba(89,74,255,.16);
        }

        .chart-heading {
            margin-bottom: 8px;
            font-size: 18px;
            font-weight: 700;
            color: #f4f1ff;
        }

        .chart-description {
            margin-bottom: 22px;
            font-size: 12px;
            color: #aebbe3;
            line-height: 1.7;
        }

        .chart-container {
            position: relative;
            height: 280px;
            width: 100%;
        }

        .chart-note {
            color: #9da9d2;
            font-size: 11px;
            line-height: 1.6;
            margin-top: 15px;
        }

        /* Table */

        .table-box {
            padding: 25px;
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .table-box h2 {
            margin-bottom: 5px;
            font-size: 21px;
        }

        .table-subtitle {
            color: #aebbe3;
            font-size: 12px;
            margin-top: 7px;
            line-height: 1.6;
        }

        /* Export button */

        .export-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 9px;
            background: linear-gradient(120deg, #059669, #10b981);
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid rgba(255,255,255,.2);
            box-shadow: 0 0 20px rgba(16,185,129,.18);
            transition: .25s;
            white-space: nowrap;
        }

        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 25px rgba(16,185,129,.4);
            color: #ffffff;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin: 22px 0 15px;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            min-width: 220px;
            padding: 12px 15px;
            color: white;
            border: 1px solid rgba(178,169,255,.26);
            border-radius: 9px;
            outline: none;
            font-size: 13px;
            background: rgba(5,10,39,.55);
        }

        .search-input::placeholder {
            color: #9da9d2;
        }

        .search-input:focus {
            border-color: #a98aff;
            box-shadow: 0 0 0 3px rgba(124,58,237,.17);
        }

        .search-btn,
        .status-btn {
            background: linear-gradient(120deg, #3979ff, #8539f5);
            color: white;
            border: 1px solid rgba(255,255,255,.15);
            padding: 12px 18px;
            border-radius: 9px;
            cursor: pointer;
            font-weight: 700;
            font-size: 12px;
            transition: .25s;
        }

        .search-btn:hover,
        .status-btn:hover {
            box-shadow: 0 0 24px rgba(131,72,255,.45);
            transform: translateY(-1px);
        }

        .reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            background: rgba(255,255,255,.07);
            color: #e0e5ff;
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 9px;
            text-decoration: none;
            font-size: 12px;
        }

        .reset-btn:hover {
            background: rgba(255,255,255,.13);
        }

        .search-info {
            color: #aebbe3;
            font-size: 12px;
            margin-bottom: 17px;
            line-height: 1.6;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid rgba(172,164,255,.17);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(172,164,255,.14);
            vertical-align: top;
        }

        th {
            background: rgba(93,87,180,.22);
            color: #dedbff;
            font-size: 12px;
            white-space: nowrap;
        }

        td {
            font-size: 13px;
            color: #e1e6ff;
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

        .message {
            max-width: 240px;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            color: #c5cee9;
            line-height: 1.6;
        }

        .date {
            white-space: nowrap;
            color: #b7c2e4;
        }

        select {
            width: 130px;
            max-width: 100%;
            padding: 9px;
            color: #f4f3ff;
            border: 1px solid rgba(178,169,255,.28);
            border-radius: 7px;
            background: #171943;
            outline: none;
            font-size: 12px;
        }

        select option {
            color: white;
            background: #171943;
        }

        .status-btn {
            padding: 9px 11px;
            margin-top: 8px;
        }

        /* View Details button */

        .view-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 13px;
            border-radius: 8px;
            background: linear-gradient(120deg, #3979ff, #8539f5);
            color: #ffffff;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            border: 1px solid rgba(255,255,255,.2);
            transition: .25s;
        }

        .view-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 20px rgba(131,72,255,.45);
            color: #ffffff;
        }

        .action-cell {
            min-width: 145px;
        }

        /* Messages */

        .success,
        .error-message {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .success {
            color: #b9ffe0;
            background: rgba(16,185,129,.13);
            border: 1px solid rgba(52,211,153,.35);
        }

        .error-message {
            color: #ffd1d9;
            background: rgba(244,63,94,.13);
            border: 1px solid rgba(251,113,133,.35);
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #b8c3e6;
            line-height: 1.7;
        }

        .empty a {
            color: #c8afff;
        }

        /* Animations */

        @keyframes networkMove {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 180px 180px;
            }
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

        /* Responsive design */

        @media (max-width: 1050px) {
            .sidebar {
                width: 210px;
                padding: 25px 15px;
            }

            .main {
                margin-left: 210px;
                padding: 25px;
            }

            .summary {
                gap: 13px;
            }

            .card {
                padding: 19px;
            }

            .analytics {
                grid-template-columns: 1fr;
            }
        }

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

            .summary {
                grid-template-columns: 1fr;
            }

            .table-box,
            .chart-card {
                padding: 17px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-input {
                width: 100%;
                min-width: 0;
            }

            .search-btn,
            .reset-btn {
                min-height: 42px;
            }

            .chart-container {
                height: 250px;
            }

            .export-btn {
                width: 100%;
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

    {{-- Sidebar --}}

    <aside class="sidebar">

        <div class="logo">Nova<span>Tech.</span></div>

        <a href="{{ route('admin.dashboard') }}">
            📊 Dashboard
        </a>

        <a href="{{ route('admin.enquiries') }}" class="active">
            📩 Enquiries
        </a>

        <a href="{{ url('/') }}">
            🌐 View Website
        </a>

    </aside>

    {{-- Main content --}}

    <main class="main">

        {{-- Page heading --}}

        <div class="topbar">

            <div>
                <h1>Enquiries Management</h1>

                <p>
                    View and manage messages received from your website.
                </p>
            </div>

            <div class="topbar-actions">

                <span class="admin-badge">
                    Admin Panel
                </span>

                <a href="{{ route('admin.dashboard') }}" class="back-btn">
                    ← Dashboard
                </a>

            </div>

        </div>

        {{-- Success message --}}

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation errors --}}

        @if($errors->any())
            <div class="error-message">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Summary calculations --}}

        @php
            $newCount = $enquiries->whereIn('status', ['New', 'new'])->count();

            $progressCount = $enquiries->whereIn(
                'status',
                ['In Progress', 'in progress']
            )->count();

            $completedCount = $enquiries->whereIn(
                'status',
                ['Completed', 'completed']
            )->count();

            $chartTotal = $newCount + $progressCount + $completedCount;
        @endphp

        {{-- Summary cards --}}

        <section class="summary">

            <div class="card">
                <div class="card-icon">📩</div>
                <p>Total Enquiries</p>
                <h2>{{ $enquiries->count() }}</h2>
            </div>

            <div class="card">
                <div class="card-icon">✨</div>
                <p>New Enquiries</p>
                <h2>{{ $newCount }}</h2>
            </div>

            <div class="card">
                <div class="card-icon">✅</div>
                <p>Completed Enquiries</p>
                <h2>{{ $completedCount }}</h2>
            </div>

        </section>

        {{-- Analytics section --}}

        <section class="analytics">

            {{-- Bar chart --}}

            <div class="chart-card">

                <h2 class="chart-heading">
                    📊 Enquiry Status Overview
                </h2>

                <p class="chart-description">
                    Compare the number of enquiries in each status.
                </p>

                <div class="chart-container">
                    <canvas id="enquiryBarChart"></canvas>
                </div>

                <p class="chart-note">
                    Each bar represents the number of enquiries in that status.
                </p>

            </div>

            {{-- Doughnut chart --}}

            <div class="chart-card">

                <h2 class="chart-heading">
                    🍩 Enquiry Distribution
                </h2>

                <p class="chart-description">
                    View the distribution of enquiries by status.
                </p>

                <div class="chart-container">
                    <canvas id="enquiryDoughnutChart"></canvas>
                </div>

                <p class="chart-note">
                    Total enquiries represented in these charts:
                    <strong>{{ $chartTotal }}</strong>
                </p>

            </div>

        </section>

        {{-- Enquiries table --}}

        <section class="table-box">

            <div class="table-heading">

                <div>
                    <h2>📨 All Enquiries</h2>

                    <p class="table-subtitle">
                        Review incoming messages and update their progress.
                    </p>
                </div>

                {{-- Export button --}}

                <a
                    href="{{ route('admin.enquiries.export', request()->only('search')) }}"
                    class="export-btn"
                >
                    📥 Export to Excel
                </a>

            </div>

            {{-- Search form --}}

            <form
                action="{{ route('admin.enquiries') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    value="{{ $search ?? '' }}"
                    placeholder="Search by name or email..."
                    aria-label="Search enquiries by name or email"
                >

                <button type="submit" class="search-btn">
                    🔍 Search
                </button>

                <a href="{{ route('admin.enquiries') }}" class="reset-btn">
                    Reset
                </a>

            </form>

            <p class="search-info">

                Showing {{ $enquiries->count() }} enquiry/enquiries

                @if(!empty($search))
                    for "{{ $search }}"
                @endif

            </p>

            {{-- Table --}}

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($enquiries as $enquiry)

                            <tr>

                                <td>
                                    {{ $enquiry->id }}
                                </td>

                                <td>
                                    {{ $enquiry->name }}
                                </td>

                                <td>
                                    {{ $enquiry->email }}
                                </td>

                                <td>
                                    {{ $enquiry->subject ?? 'N/A' }}
                                </td>

                                <td class="message">
                                    {{ $enquiry->message }}
                                </td>

                                <td class="date">
                                    {{ $enquiry->created_at
                                        ? \Carbon\Carbon::parse($enquiry->created_at)->format('d M Y, h:i A')
                                        : 'N/A'
                                    }}
                                </td>

                                {{-- Update status --}}

                                <td>

                                    <form
                                        action="{{ route('admin.enquiries.update', $enquiry->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <select name="status" required>

                                            <option
                                                value="New"
                                                {{ in_array($enquiry->status, ['New', 'new']) ? 'selected' : '' }}
                                            >
                                                New
                                            </option>

                                            <option
                                                value="In Progress"
                                                {{ in_array($enquiry->status, ['In Progress', 'in progress']) ? 'selected' : '' }}
                                            >
                                                In Progress
                                            </option>

                                            <option
                                                value="Completed"
                                                {{ in_array($enquiry->status, ['Completed', 'completed']) ? 'selected' : '' }}
                                            >
                                                Completed
                                            </option>

                                        </select>

                                        <br>

                                        <button type="submit" class="status-btn">
                                            Update Status
                                        </button>

                                    </form>

                                </td>

                                {{-- View Details button --}}

                                <td class="action-cell">

                                    <a
                                        href="{{ route('admin.enquiries.show', $enquiry->id) }}"
                                        class="view-btn"
                                    >
                                        👁 View Details
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="empty">

                                    @if(!empty($search))

                                        No enquiries found for "{{ $search }}".

                                        <br><br>

                                        <a href="{{ route('admin.enquiries') }}">
                                            Clear search and view all enquiries
                                        </a>

                                    @else

                                        No enquiries found yet.

                                    @endif

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>

    {{-- Chart functionality --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const chartCanvasBar =
                document.getElementById('enquiryBarChart');

            const chartCanvasDoughnut =
                document.getElementById('enquiryDoughnutChart');

            const statusLabels = [
                'New',
                'In Progress',
                'Completed'
            ];

            const statusCounts = [
                {{ $newCount }},
                {{ $progressCount }},
                {{ $completedCount }}
            ];

            const statusColors = [
                '#4385ff',
                '#ffad42',
                '#34d399'
            ];

            if (typeof Chart === 'undefined') {
                console.error(
                    'Chart.js failed to load. Please check your internet connection.'
                );
                return;
            }

            Chart.defaults.color = '#c5cee9';
            Chart.defaults.font.family = 'Inter, sans-serif';

            /* Bar Chart */

            if (chartCanvasBar) {

                new Chart(chartCanvasBar, {

                    type: 'bar',

                    data: {
                        labels: statusLabels,

                        datasets: [{
                            label: 'Number of Enquiries',
                            data: statusCounts,
                            backgroundColor: statusColors,
                            borderRadius: 8,
                            borderSkipped: false,
                            maxBarThickness: 65
                        }]
                    },

                    options: {

                        responsive: true,
                        maintainAspectRatio: false,

                        animation: {
                            duration: 1000,
                            easing: 'easeOutQuart'
                        },

                        plugins: {

                            legend: {
                                display: false
                            },

                            tooltip: {
                                backgroundColor: '#111735',
                                borderColor: 'rgba(169,138,255,.5)',
                                borderWidth: 1,
                                padding: 12,
                                displayColors: true
                            }

                        },

                        scales: {

                            x: {
                                grid: {
                                    display: false
                                },

                                border: {
                                    display: false
                                },

                                ticks: {
                                    color: '#d5d9f5'
                                }
                            },

                            y: {
                                beginAtZero: true,

                                ticks: {
                                    precision: 0,
                                    stepSize: 1
                                },

                                grid: {
                                    color: 'rgba(174,187,227,.10)'
                                },

                                border: {
                                    display: false
                                }
                            }

                        }

                    }

                });

            }

            /* Doughnut Chart */

            if (chartCanvasDoughnut) {

                new Chart(chartCanvasDoughnut, {

                    type: 'doughnut',

                    data: {
                        labels: statusLabels,

                        datasets: [{
                            data: statusCounts,
                            backgroundColor: statusColors,
                            borderColor: '#11152f',
                            borderWidth: 4,
                            hoverOffset: 10
                        }]
                    },

                    options: {

                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',

                        animation: {
                            animateRotate: true,
                            duration: 1200
                        },

                        plugins: {

                            legend: {

                                position: 'bottom',

                                labels: {
                                    color: '#d5d9f5',
                                    padding: 20,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }

                            },

                            tooltip: {
                                backgroundColor: '#111735',
                                borderColor: 'rgba(169,138,255,.5)',
                                borderWidth: 1,
                                padding: 12
                            }

                        }

                    }

                });

            }

        });
    </script>

</body>
</html>