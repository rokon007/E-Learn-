<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* :root {
            --primary-color: rgb(15, 23, 42);
            --secondary-color: #1e293b;
            --accent-color: #4c84ff;
            --light-bg: #f1f5f9;
            --text-light: #f8fafc;
            --text-dark: #1e293b;
        } */

        body {
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
            background-color: var(--light-bg);
        }

        :root {
            --primary-color: rgb(15, 23, 42);
            --secondary-color: #1e293b;
            --accent-color: #4c84ff;
            --light-bg: #f1f5f9;
            --text-light: #f8fafc;
            --text-dark: #1e293b;
            --success: #10b981;
            --warning: #f59e0b;
            --info: #3b82f6;
        }

        /* body {
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
            background-color: var(--light-bg);
            padding: 20px;
        } */

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0 0px;
        }

        .btn {
            display: inline-block;
            background: var(--accent-color);
            color: #fff;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #3a6fd9;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--accent-color);
            color: var(--accent-color);
        }

        .btn-outline:hover {
            background: var(--accent-color);
            color: #fff;
        }

        /* Navigation Bar */
        header {
            background-color: var(--primary-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            background-color:#000080;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color:white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #cbd5e1;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent-color);
        }

        .auth-buttons {
            display: flex;
            align-items: center;
        }

        .auth-buttons .btn {
            margin-left: 15px;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
            margin-right:10px;
        }

        .menu-toggle span {
            height: 3px;
            width: 100%;
            background-color: white;
            border-radius: 3px;
            transition: all 0.3s;
        }

        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
            margin-top: 80px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: var(--primary-color);
            color: white;
            position: fixed;
            height: calc(100vh - 80px);
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 900;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #334155;
            text-align: center;
        }

        .sidebar-header h3 {
            color: white;
            font-size: 1.2rem;
        }

        .sidebar-menu {
            list-style: none;
            padding: 10px 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: var(--accent-color);
            color: white;
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .dashboard-title {
            font-size: 1.8rem;
            color: var(--text-dark);
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 1.1rem;
            color: var(--text-dark);
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .card-text {
            color: #64748b;
            font-size: 0.9rem;
        }

        .dashboard-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .section-header {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-title {
            font-size: 1.3rem;
            color: var(--text-dark);
        }

        .course-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .course-card {
            background: var(--light-bg);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-img {
            height: 150px;
            width: 100%;
            object-fit: cover;
        }

        .course-content {
            padding: 15px;
        }

        .course-title {
            font-size: 1rem;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .course-progress {
            background: #e2e8f0;
            border-radius: 5px;
            height: 8px;
            margin-bottom: 10px;
        }

        .progress-bar {
            height: 100%;
            background: var(--accent-color);
            border-radius: 5px;
        }

        .course-stats {
            display: flex;
            justify-content: space-between;
            color: #64748b;
            font-size: 0.8rem;
        }

        /* Footer */
        footer {
            background: var(--primary-color);
            color: #fff;
            padding: 30px 0 30px;
            background-color:#000080;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #cbd5e0;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--accent-color);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #334155;
            color: #cbd5e0;
            background-color:#000080;
        }

        /* Mobile Sidebar Toggle */
        .sidebar-toggle {
            display: none;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
            margin-right: 15px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .nav-links li {
                margin-left: 20px;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar {
                transform: translateX(-100%);
                width: 220px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sidebar-toggle {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .nav-links {
                display: none;
            }

            .auth-buttons {
                display: none;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .user-info {
                margin-top: 15px;
            }
        }

        @media (max-width: 480px) {
            .btn {
                padding: 10px 20px;
            }

            .main-content {
                padding: 20px;
            }

            .dashboard-title {
                font-size: 1.5rem;
            }

            .card-value {
                font-size: 1.5rem;
            }
        }
    </style>
    <style>

        /* Enhanced Card Styles */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title {
            font-size: 1.2rem;
            color: var(--text-dark);
            font-weight: 600;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--accent-color), #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 15px 0;
            display: flex;
            align-items: center;
        }

        .card-value i {
            margin-right: 10px;
            color: var(--success);
            font-size: 1.5rem;
        }

        .card-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e2e8f0, transparent);
            margin: 20px 0;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #f8fafc;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .info-item:hover {
            background-color: #f1f5f9;
        }

        .info-label {
            font-weight: 500;
            color: #64748b;
            display: flex;
            align-items: center;
        }

        .info-label i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: var(--accent-color);
        }

        .info-value {
            font-weight: 600;
            color: var(--text-dark);
        }

        .status-active {
            color: var(--success);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }

        .status-active::before {
            content: "";
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--success);
            margin-right: 8px;
            display: inline-block;
        }

        .card-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-sm {
            padding: 10px 20px;
            font-size: 0.9rem;
            text-align: center;
        }

        .btn-success {
            background-color: var(--success);
        }

        .btn-success:hover {
            background-color: #0da271;
        }

        .btn-info {
            background-color: var(--info);
        }

        .btn-info:hover {
            background-color: #2563eb;
        }

        .referral-code {
            display: inline-block;
            padding: 8px 15px;
            background-color: #f1f5f9;
            border-radius: 6px;
            font-family: monospace;
            font-weight: 600;
            color: var(--accent-color);
            border: 1px dashed #cbd5e1;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-color), #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            margin-right: 15px;
        }

        .user-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .user-id {
            color: #64748b;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
     @yield('css')
     @livewireStyles
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="container">
            @livewire('layout.user-navbar')
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Sidebar -->
        @livewire('layout.user-aside')
        <!-- Main Content -->
        <main class="main-content">
            {{$slot}}
        </main>
    </div>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="copyright">
                <p>&copy; 2023 E-Learn. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script>
        // Sidebar Toggle Functionality
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const logoutBtn = document.getElementById('logout-btn');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if(confirm('Are you sure you want to logout?')) {
                window.location.href = 'index.html';
            }
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 992) {
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target) && !menuToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
    @yield('js')
    @stack('scripts')
</body>
</html>
