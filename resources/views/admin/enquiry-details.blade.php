<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NovaTech | Enquiry Details</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            color: #f4f5ff;
            background:
                radial-gradient(ellipse at 15% 20%, rgba(35,89,255,.25), transparent 42%),
                radial-gradient(ellipse at 85% 25%, rgba(144,35,255,.28), transparent 43%),
                linear-gradient(135deg, #07112b, #10103b 50%, #210d42);
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 20px;
            background: rgba(4,10,38,.85);
            border-right: 1px solid rgba(157,151,255,.2);
            backdrop-filter: blur(20px);
        }

        .logo {
            color: white;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 40px;
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
            font-size: 14px;
            transition: .25s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: white;
            background: linear-gradient(110deg, #3979ff, #8539f5);
        }

        .main {
            margin-left: 250px;
            padding: 35px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        h1 {
            font-size: clamp(24px, 3vw, 32px);
            margin-bottom: 8px;
        }

        .subtitle {
            color: #b6c2e8;
            font-size: 14px;
            line-height: 1.7;
        }

        .back-btn {
            display: inline-block;
            padding: 12px 18px;
            color: white;
            background: linear-gradient(120deg, #3979ff, #8539f5);
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .details-card {
            max-width: 950px;
            padding: 30px;
            background: linear-gradient(
                135deg,
                rgba(255,255,255,.105),
                rgba(255,255,255,.035)
            );
            border: 1px solid rgba(164,157,255,.25);
            border-radius: 18px;
            backdrop-filter: blur(20px);
            box-shadow: 0 15px 45px rgba(0,0,0,.2);
        }

        .details-heading {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(172,164,255,.2);
        }

        .details-heading h2 {
            font-size: 22px;
            margin-bottom: 8px;
        }

        .details-heading p {
            color: #aebbe3;
            font-size: 13px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .detail-item {
            min-width: 0;
            padding: 18px;
            border-radius: 12px;
            background: rgba(8,13,48,.38);
            border: 1px solid rgba(172,164,255,.15);
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .detail-label {
            display: block;
            margin-bottom: 10px;
            color: #b69aff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .detail-value {
            color: #f1f3ff;
            font-size: 14px;
            line-height: 1.8;
            overflow-wrap: anywhere;
            white-space: pre-wrap;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 30px;
            color: #e2d8ff;
            background: rgba(139,92,246,.18);
            border: 1px solid rgba(167,139,250,.3);
            font-size: 12px;
            font-weight: 700;
        }

        .footer {
            margin-top: 25px;
            color: #8e9bc6;
            font-size: 12px;
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

            .details-card {
                padding: 18px;
            }

            .details-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .detail-item.full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

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

    <main class="main">

        <div class="topbar">
            <div>
                <h1>Enquiry Details</h1>
                <p class="subtitle">
                    View the complete information submitted by the customer.
                </p>
            </div>

            <a href="{{ route('admin.enquiries') }}" class="back-btn">
                ← Back to Enquiries
            </a>
        </div>

        <section class="details-card">

            <div class="details-heading">
                <h2>
                    📩 Enquiry #{{ $enquiry->id }}
                </h2>

                <p>
                    Customer enquiry information
                </p>
            </div>

            <div class="details-grid">

                <div class="detail-item">
                    <span class="detail-label">Enquiry ID</span>
                    <div class="detail-value">
                        #{{ $enquiry->id }}
                    </div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Status</span>
                    <div class="detail-value">
                        <span class="status">
                            {{ $enquiry->status ?? 'New' }}
                        </span>
                    </div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Customer Name</span>
                    <div class="detail-value">
                        {{ $enquiry->name ?? 'N/A' }}
                    </div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Email Address</span>
                    <div class="detail-value">
                        {{ $enquiry->email ?? 'N/A' }}
                    </div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Subject</span>
                    <div class="detail-value">
                        {{ $enquiry->subject ?? 'N/A' }}
                    </div>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Submitted Date</span>
                    <div class="detail-value">
                        {{ $enquiry->created_at
                            ? \Carbon\Carbon::parse($enquiry->created_at)->format('d M Y, h:i A')
                            : 'N/A'
                        }}
                    </div>
                </div>

                <div class="detail-item full">
                    <span class="detail-label">Customer Message</span>
                    <div class="detail-value">{{ $enquiry->message ?? 'No message available.' }}</div>
                </div>

            </div>

            <div class="footer">
                NovaTech Admin Panel · Enquiry Management
            </div>

        </section>

    </main>

</body>
</html>
