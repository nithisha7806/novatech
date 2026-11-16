<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaTech | Future of Technology</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
            background: #070b1b;
        }
        body::before {
            content: ""; position: fixed; inset: 0; z-index: -3;
            background:
                radial-gradient(ellipse at 12% 25%, rgba(35,89,255,.28), transparent 42%),
                radial-gradient(ellipse at 85% 35%, rgba(144,35,255,.32), transparent 43%),
                radial-gradient(ellipse at 55% 95%, rgba(64,30,180,.24), transparent 45%),
                linear-gradient(135deg, #07112b 0%, #10103b 50%, #210d42 100%);
        }
        .network {
            position: fixed; inset: 0; z-index: -2; pointer-events: none; opacity: .3;
            background-image: radial-gradient(circle, #a995ff 1px, transparent 1.6px);
            background-size: 42px 42px;
            mask-image: linear-gradient(to bottom, black, transparent 95%);
            animation: networkMove 22s linear infinite;
        }
        .network::after {
            content: ""; position: absolute; inset: 0;
            background:
                linear-gradient(35deg, transparent 48%, rgba(135,100,255,.12) 49%, transparent 50%),
                linear-gradient(145deg, transparent 48%, rgba(72,124,255,.10) 49%, transparent 50%);
            background-size: 190px 160px, 230px 190px;
        }
        .particle {
            position: fixed; width: 5px; height: 5px; border-radius: 50%;
            background: #b69aff; box-shadow: 0 0 10px #8b5cff, 0 0 25px #8b5cff;
            pointer-events: none; z-index: -1; animation: particleFloat 6s ease-in-out infinite;
        }
        .p1 { top: 15%; left: 10%; } .p2 { top: 30%; left: 85%; animation-delay: 1s; }
        .p3 { top: 65%; left: 20%; animation-delay: 2s; } .p4 { top: 80%; left: 75%; animation-delay: 3s; }
        .p5 { top: 45%; left: 50%; animation-delay: 1.5s; } .p6 { top: 20%; left: 65%; animation-delay: 2.5s; }
        .p7 { top: 75%; left: 40%; animation-delay: 4s; } .p8 { top: 55%; left: 90%; animation-delay: 2s; }
        .p9 { top: 35%; left: 30%; animation-delay: 3.5s; } .p10 { top: 90%; left: 15%; animation-delay: 1s; }
        .container { width: min(1160px, 90%); margin: auto; }
        nav {
            margin-top: 22px; padding: 13px 20px; display: flex; align-items: center;
            justify-content: space-between; gap: 18px; position: relative; z-index: 5;
            border: 1px solid rgba(255,255,255,.22);
            background: rgba(255,255,255,.11); backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px); border-radius: 14px;
            box-shadow: 0 8px 40px rgba(0,0,0,.24), 0 0 25px rgba(100,80,255,.12);
        }
        .logo { display: flex; align-items: center; gap: 10px; font-size: 22px; font-weight: 800; letter-spacing: -.7px; text-decoration: none; color: white; white-space: nowrap; }
        .logo-icon {
            width: 36px; height: 36px; display: grid; place-items: center; border-radius: 11px;
            background: linear-gradient(135deg,#3485ff,#a33bff); box-shadow: 0 0 24px rgba(119,74,255,.55);
        }
        .logo span:last-child span { color: #c0a4ff; }
        .nav-links { display: flex; align-items: center; gap: 23px; }
        .nav-links a:not(.btn) { color: #e0e3fa; text-decoration: none; font-size: 12px; transition: color .25s; }
        .nav-links a:not(.btn):hover { color: #c1a4ff; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 7px;
            padding: 12px 19px; border-radius: 9px; text-decoration: none; font-size: 12px;
            font-weight: 700; color: white; border: 1px solid rgba(255,255,255,.22);
            background: linear-gradient(135deg,#3979ff,#8539f5);
            box-shadow: 0 0 22px rgba(104,70,255,.32); transition: transform .25s, box-shadow .25s;
            cursor: pointer; font-family: inherit;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 0 32px rgba(131,72,255,.65); }
        .hero { padding: 76px 0 36px; text-align: center; position: relative; }
        .badge {
            display: inline-flex; padding: 8px 15px; border: 1px solid rgba(166,139,255,.4);
            border-radius: 30px; color: #d1c2ff; background: rgba(120,76,255,.12);
            font-size: 11px; margin-bottom: 21px; animation: float 4s ease-in-out infinite;
        }
        .hero h1 { font-size: clamp(35px,5.3vw,65px); line-height: 1.12; letter-spacing: -2.4px; max-width: 900px; margin: auto; font-weight: 800; }
        .gradient-text { background: linear-gradient(90deg,#78b2ff,#bc8aff,#f1a2ff); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .hero p { max-width: 650px; margin: 18px auto 23px; color: #b9c2e2; line-height: 1.8; font-size: 14px; }
        .hero-buttons { display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; }
        .btn-secondary { background: rgba(255,255,255,.08); box-shadow: none; }
        .section { padding: 35px 0 55px; }
        .section-heading { text-align: center; margin-bottom: 30px; }
        .section-heading small { color: #b79aff; font-size: 11px; text-transform: uppercase; letter-spacing: 3px; font-weight: 700; }
        .section-heading h2 { font-size: clamp(25px,3.5vw,37px); margin-top: 12px; letter-spacing: -1px; }
        .section-heading p { color: #b3bddf; margin-top: 10px; font-size: 13px; line-height: 1.8; }
        .services { display: grid; grid-template-columns: repeat(3,minmax(0,1fr)); gap: 20px; }
        .card {
            position: relative; padding: 27px 23px; border-radius: 17px; text-align: center; overflow: hidden;
            background: linear-gradient(135deg,rgba(255,255,255,.17),rgba(255,255,255,.045));
            backdrop-filter: blur(22px); -webkit-backdrop-filter: blur(22px);
            border: 1px solid rgba(255,255,255,.2);
            box-shadow: 0 8px 32px rgba(0,0,0,.22), inset 0 1px 0 rgba(255,255,255,.1);
            transition: transform .3s,border-color .3s,box-shadow .3s;
        }
        .card::before { content: ""; position: absolute; top: 0; left: -110%; width: 100%; height: 2px; background: linear-gradient(90deg,transparent,#c0a0ff,transparent); transition: left .55s; }
        .card:hover { transform: translateY(-7px); border-color: rgba(180,145,255,.8); box-shadow: 0 14px 38px rgba(104,70,255,.24),0 0 22px rgba(153,95,255,.13); }
        .card:hover::before { left: 110%; }
        .card-icon { width: 52px; height: 52px; display: grid; place-items: center; border-radius: 15px; font-size: 25px; margin: 0 auto 17px; background: linear-gradient(135deg,rgba(58,123,255,.28),rgba(168,65,255,.34)); border: 1px solid rgba(255,255,255,.2); box-shadow: 0 0 23px rgba(130,83,255,.2); }
        .card h3 { font-size: 17px; margin-bottom: 10px; }
        .card p { color: #c1c8e5; font-size: 12px; line-height: 1.75; }
        .card-link { display: inline-block; margin-top: 16px; text-decoration: none; color: #c6adff; font-size: 12px; font-weight: 600; }
        .stats {
            display: grid; grid-template-columns: repeat(4,minmax(0,1fr)); gap: 8px; padding: 17px 12px;
            border: 1px solid rgba(255,255,255,.2); background: rgba(255,255,255,.09);
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-radius: 15px;
            box-shadow: 0 8px 35px rgba(0,0,0,.17); margin: 8px auto 27px;
        }
        .stat { text-align: center; padding: 8px 5px; }
        .stat h3 { font-size: clamp(19px,2.3vw,27px); color: #d0b5ff; margin-bottom: 6px; }
        .stat p { color: #c0c7e2; font-size: 11px; }
        .trusted { text-align: center; color: #aeb8d8; font-size: 11px; margin-bottom: 10px; }
        .partners { display: flex; justify-content: center; gap: clamp(22px,6vw,65px); flex-wrap: wrap; color: #d3c9ef; font-size: 14px; font-weight: 600; opacity: .8; }
        .contact-box { max-width: 720px; margin: auto; padding: 30px; border: 1px solid rgba(255,255,255,.18); border-radius: 18px; background: rgba(255,255,255,.075); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); box-shadow: 0 10px 35px rgba(0,0,0,.16); }
        .contact-box form { display: grid; gap: 14px; margin-top: 20px; }
        .contact-box input,.contact-box textarea { width: 100%; padding: 14px; color: white; font-family: inherit; font-size: 13px; background: rgba(4,9,30,.65); border: 1px solid rgba(255,255,255,.17); border-radius: 9px; outline: none; }
        .contact-box input:focus,.contact-box textarea:focus { border-color: #a58aff; box-shadow: 0 0 15px rgba(140,89,255,.2); }
        .contact-box input::placeholder,.contact-box textarea::placeholder { color: #aab3d3; }
        .contact-box textarea { min-height: 115px; resize: vertical; }
        .form-message { color: #b8f5d2; font-size: 13px; line-height: 1.6; }
        footer { border-top: 1px solid rgba(255,255,255,.1); padding: 25px 0; text-align: center; color: #a2accd; font-size: 11px; }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }
        @keyframes networkMove { from { background-position: 0 0; } to { background-position: 180px 180px; } }
        @keyframes particleFloat { 0%,100% { transform: translateY(0) scale(1); opacity: .4; } 50% { transform: translateY(-24px) scale(1.7); opacity: 1; } }
        @media (max-width: 850px) {
            nav { flex-wrap: wrap; } .nav-links { gap: 14px; } .services { gap: 14px; }
            .card { padding: 23px 16px; }
        }
        @media (max-width: 620px) {
            .container { width: 92%; }
            nav { justify-content: center; padding: 13px; }
            .logo { font-size: 20px; }
            .nav-links { width: 100%; flex-wrap: wrap; justify-content: center; gap: 13px; }
            .nav-links a:not(.btn) { font-size: 11px; }
            .nav-links .btn { display: none; }
            .hero { padding: 55px 0 25px; }
            .hero h1 { letter-spacing: -1.4px; }
            .hero p { font-size: 13px; }
            .services { grid-template-columns: 1fr; }
            .card { padding: 25px 20px; }
            .stats { grid-template-columns: repeat(2,minmax(0,1fr)); padding: 12px 8px; }
            .stat h3 { font-size: 23px; }
            .contact-box { padding: 20px; }
            .section { padding: 30px 0 42px; }
        }
        @media (prefers-reduced-motion: reduce) {
            *,*::before,*::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
</head>
<body>
    <div class="network" aria-hidden="true"></div>
    <span class="particle p1" aria-hidden="true"></span><span class="particle p2" aria-hidden="true"></span>
    <span class="particle p3" aria-hidden="true"></span><span class="particle p4" aria-hidden="true"></span>
    <span class="particle p5" aria-hidden="true"></span><span class="particle p6" aria-hidden="true"></span>
    <span class="particle p7" aria-hidden="true"></span><span class="particle p8" aria-hidden="true"></span>
    <span class="particle p9" aria-hidden="true"></span><span class="particle p10" aria-hidden="true"></span>

    <div class="container">
        <nav aria-label="Main navigation">
            <a href="#home" class="logo"><span class="logo-icon">✦</span><span>Nova<span>Tech</span></span></a>
            <div class="nav-links">
                <a href="#services">Products</a>
                <a href="#services">Solutions</a>
                <a href="#about">Company</a>
                <a href="#about">Resources</a>
                <a href="#contact">Contact</a>
                <a href="#contact" class="btn">Get Started ↗</a>
            </div>
        </nav>

        <section class="hero" id="home">
            <div class="badge">✦ &nbsp; INNOVATION STARTS HERE</div>
            <h1>Building the Future of <span class="gradient-text">Technology</span></h1>
            <p>Empowering businesses with cloud, AI, and secure infrastructure solutions.</p>
            <div class="hero-buttons">
                <a href="#services" class="btn">Start Free Trial ›</a>
                <a href="#contact" class="btn btn-secondary">Book a Demo</a>
            </div>
        </section>

        <section class="section" id="services">
            <div class="services">
                <article class="card">
                    <div class="card-icon">☁️</div>
                    <h3>Cloud Infrastructure</h3>
                    <p>Scalable cloud solutions for modern enterprises with reliability and performance in mind.</p>
                    <a href="#contact" class="card-link">Explore service →</a>
                </article>
                <article class="card">
                    <div class="card-icon">🧠</div>
                    <h3>AI &amp; Analytics</h3>
                    <p>Harness data insights with advanced AI and analytics to make smarter business decisions.</p>
                    <a href="#contact" class="card-link">Explore service →</a>
                </article>
                <article class="card">
                    <div class="card-icon">🔐</div>
                    <h3>Cybersecurity</h3>
                    <p>Enterprise-grade security to protect your business, digital systems, and data.</p>
                    <a href="#contact" class="card-link">Explore service →</a>
                </article>
            </div>
        </section>

        <section id="about" aria-label="Company statistics">
            <div class="stats">
                <div class="stat"><h3 class="counter" data-target="200" data-suffix="+">0</h3><p>Projects Delivered</p></div>
                <div class="stat"><h3 class="counter" data-target="50" data-suffix="+">0</h3><p>Business Partners</p></div>
                <div class="stat"><h3 class="counter" data-target="99.9" data-suffix="%">0</h3><p>Service Reliability Goal</p></div>
                <div class="stat"><h3 class="counter" data-target="24" data-suffix="/7">0</h3><p>Digital Availability</p></div>
            </div>
            <p class="trusted">Trusted by innovative companies</p>
            <div class="partners"><span>Acme</span><span>Horizon</span><span>Pulse</span><span>Vertex</span></div>
        </section>

        <section class="section" id="contact">
            <div class="section-heading">
                <small>Get In Touch</small>
                <h2>Let's Build Something Great</h2>
                <p>Tell us about your idea. Let's explore the possibilities.</p>
            </div>
            <div class="contact-box">
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" id="name" name="name" placeholder="Your Name" maxlength="100" value="{{ old('name') }}" required>
                    <input type="email" id="email" name="email" placeholder="Your Email" maxlength="150" value="{{ old('email') }}" required>
                    <input type="text" id="subject" name="subject" placeholder="Project Subject" maxlength="150" value="{{ old('subject') }}" required>
                    <textarea id="message" name="message" placeholder="Tell us about your project..." maxlength="5000" required>{{ old('message') }}</textarea>
                    <button type="submit" class="btn">Send Enquiry →</button>
                    @if (session('success'))
                        <p class="form-message">{{ session('success') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="form-message" style="color:#ffaaaa;">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </form>
            </div>
        </section>
    </div>

    <footer><div class="container">© 2026 NovaTech. Designed for a smarter digital future.</div></footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.counter').forEach(function (counter) {
                const target = Number.parseFloat(counter.dataset.target);
                const suffix = counter.dataset.suffix || '';
                const duration = 1600;
                const start = performance.now();

                function update(now) {
                    const progress = Math.min((now - start) / duration, 1);
                    const value = target * progress;
                    counter.textContent = (Number.isInteger(target) ? Math.floor(value) : value.toFixed(1)) + suffix;
                    if (progress < 1) requestAnimationFrame(update);
                }
                requestAnimationFrame(update);
            });
        });
    </script>
</body>
</html>
