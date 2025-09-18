<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Favicon -->
    {{-- <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" /> --}}
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: rgb(15, 23, 42);
            --secondary-color: #1e293b;
            --accent-color: #4c84ff;
            --light-bg: #f1f5f9;
            --text-light: #f8fafc;
            --text-dark: #1e293b;
        }

        body {
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
            background-color: var(--light-bg);
        }

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

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .section-subtitle {
            text-align: center;
            margin-bottom: 50px;
            color: #cbd5e1;
            font-size: 1.1rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
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

        /* Mobile Sidebar */
        .mobile-sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100vh;
            background: var(--primary-color);
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            transition: right 0.4s ease;
            padding: 80px 20px 20px;
            overflow-y: auto;
        }

        .mobile-sidebar.active {
            right: 0;
        }

        .sidebar-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.5rem;
            color: #cbd5e1;
            cursor: pointer;
            background: none;
            border: none;
        }

        .sidebar-links {
            list-style: none;
        }

        .sidebar-links li {
            margin-bottom: 15px;
        }

        .sidebar-links a {
            text-decoration: none;
            color: #cbd5e1;
            font-weight: 500;
            font-size: 1.1rem;
            display: block;
            padding: 10px 0;
            transition: color 0.3s;
        }

        .sidebar-links a:hover {
            color: var(--accent-color);
        }

        .sidebar-auth {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #334155;
        }

        .sidebar-auth .btn {
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Hero Section with Slider */
        .hero {
            padding: 80px 0 100px;
            background: var(--primary-color);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .slider-container {
            position: relative;
            margin: 0 auto;
            height: 500px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.8s ease;
        }

        .slide.active {
            opacity: 1;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.9), transparent);
            padding: 30px;
            color: white;
            text-align: left;
        }

        .slide-content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .slide-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background 0.3s;
        }

        .slider-dot.active {
            background: var(--accent-color);
        }

        .slider-arrows {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            transform: translateY(-50%);
            z-index: 10;
        }

        .arrow {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }

        .arrow:hover {
            background: var(--accent-color);
        }

        /* Our Services Section */
        .services {
            padding: 100px 0;
            background-color: var(--secondary-color);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .service-card {
            background: var(--primary-color);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            padding: 30px;
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: var(--accent-color);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .service-card h3 {
            margin-bottom: 15px;
            color: var(--text-light);
        }

        .service-card p {
            color: #cbd5e1;
        }

        /* FAQ Section */
        .faq {
            padding: 100px 0;
            background-color: var(--primary-color);
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            background: var(--secondary-color);
            padding: 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--text-light);
        }

        .faq-question i {
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            background: var(--secondary-color);
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s, padding 0.3s;
            color: #cbd5e1;
        }

        .faq-item.active .faq-answer {
            max-height: 200px;
            padding: 20px;
        }

        /* Login Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1002;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s;
            padding: 20px;
            overflow-y: auto;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: #fff;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            padding: 30px;
            position: relative;
            transform: translateY(-50px);
            transition: transform 0.4s;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal.active .modal-content {
            transform: translateY(0);
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            color: #4a5568;
            cursor: pointer;
            background: none;
            border: none;
        }

        .modal-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: #2d3748;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #4a5568;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: var(--accent-color);
            outline: none;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer p {
            color: #718096;
            margin-top: 15px;
        }

        .form-footer a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Registration Modal */
        .registration-modal .modal-content {
            max-width: 500px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-select:focus {
            border-color: var(--accent-color);
            outline: none;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .progress-bar {
            height: 5px;
            background-color: #e2e8f0;
            border-radius: 5px;
            margin-bottom: 25px;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            background-color: var(--accent-color);
            width: 50%;
            transition: width 0.3s ease;
        }

        .step-indicator {
            text-align: center;
            margin-bottom: 20px;
            color: #4a5568;
            font-weight: 500;
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

        /* Responsive Design */
        @media (max-width: 992px) {
            .nav-links li {
                margin-left: 20px;
            }

            .slide-content h1 {
                font-size: 2rem;
            }

            .slide-content p {
                font-size: 1rem;
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

            .section-title {
                font-size: 2rem;
            }

            .services, .faq {
                padding: 80px 0;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .slider-container {
                height: 400px;
            }

            .slide-content {
                padding: 20px;
            }

            .slide-content h1 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 1.7rem;
            }

            .btn {
                padding: 10px 20px;
            }

            .modal-content {
                padding: 20px;
            }

            .form-navigation {
                flex-direction: column;
                gap: 10px;
            }

            .form-navigation .btn {
                width: 100%;
            }

            .mobile-sidebar {
                width: 280px;
            }

            .slider-container {
                height: 300px;
            }

            .slide-content h1 {
                font-size: 1.3rem;
            }

            .slide-content p {
                font-size: 0.9rem;
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
            @livewire('layout.landing-navbar')
        </div>
    </header>

    <!-- Mobile Sidebar -->
    @livewire('layout.mobile-sidebar')


    <div class="overlay" id="overlay"></div>

    {{$slot}}

    <!-- Login Modal -->
    <div class="modal" id="login-modal">
        <div class="modal-content">
            <button class="modal-close" id="login-modal-close">
                <i class="fas fa-times"></i>
            </button>

            <div class="modal-header">
                <h2>Login to Your Account</h2>
                <p>Welcome back! Please enter your details</p>
            </div>

            @livewire('frontend.landing.auth.login')
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal registration-modal" id="register-modal">
        <div class="modal-content">
            <button class="modal-close" id="register-modal-close">
                <i class="fas fa-times"></i>
            </button>

            <div class="modal-header">
                <h2>Create Your Account</h2>
                <p>Join thousands of learners today</p>
            </div>

            <!-- Livewire কম্পোনেন্ট -->
            @livewire('frontend.landing.auth.registration')
        </div>
    </div>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">


            <div class="copyright">
                <p>&copy; 2025 E-Learn. All rights reserved.</p>
            </div>
        </div>
    </footer>
    @yield('js')
    <script>
        // Livewire ইভেন্ট লিসেনার
        document.addEventListener('livewire:initialized', function () {
            // Next বাটনের জন্য ইভেন্ট লিসেনার
            document.addEventListener('click', function(e) {
                if (e.target.id === 'next-btn') {
                    // Validation চেক করুন
                    const firstName = document.getElementById('first-name');
                    const lastName = document.getElementById('last-name');
                    const country = document.getElementById('country');
                    const language = document.getElementById('language');

                    if (!firstName.value || !lastName.value || !country.value || !language.value) {
                        alert('Please fill all required fields');
                        return;
                    }

                    // Livewire মেথড কল করুন
                    Livewire.dispatch('firstStepSubmit');
                }
            });

            // Previous বাটনের জন্য ইভেন্ট লিসেনার
            document.addEventListener('click', function(e) {
                if (e.target.id === 'prev-btn') {
                    Livewire.dispatch('back', { step: 1 });
                }
            });

            Livewire.on('closeModal', () => {
                const registerModal = document.getElementById('register-modal');
                if (registerModal) {
                    registerModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // DOM লোড হলে স্টেপ ভিজিবিলিটি সেট করুন
        document.addEventListener('DOMContentLoaded', function() {
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');

            // প্রাথমিকভাবে শুধুমাত্র প্রথম স্টেপ দেখান
            if (step1) step1.style.display = 'block';
            if (step2) step2.style.display = 'none';
        });
    </script>
    @livewireScripts
     <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
    <script>
        // Mobile Sidebar Functionality
        const menuToggle = document.getElementById('menu-toggle');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const sidebarClose = document.getElementById('sidebar-close');
        const overlay = document.getElementById('overlay');
        const loginBtn = document.getElementById('login-btn');
        const registerBtn = document.getElementById('register-btn');
        const sidebarLoginBtn = document.getElementById('sidebar-login-btn');
        const sidebarRegisterBtn = document.getElementById('sidebar-register-btn');
        const loginModal = document.getElementById('login-modal');
        const registerModal = document.getElementById('register-modal');
        const loginModalClose = document.getElementById('login-modal-close');
        const registerModalClose = document.getElementById('register-modal-close');
        const gotoRegisterFromLogin = document.getElementById('goto-register-from-login');
        const gotoLoginFromRegister = document.getElementById('goto-login-from-register');
        const nextBtn = document.getElementById('next-btn');
        const prevBtn = document.getElementById('prev-btn');
        const form = document.getElementById('registration-form');
        const formSteps = document.querySelectorAll('.form-step');
        const formProgress = document.getElementById('form-progress');
        const currentStepElement = document.getElementById('current-step');
        let currentStep = 1;

        // Toggle Sidebar
        menuToggle.addEventListener('click', () => {
            mobileSidebar.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        // Close Sidebar
        sidebarClose.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        function closeSidebar() {
            mobileSidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Open Login Modal
        loginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            loginModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        sidebarLoginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeSidebar();
            setTimeout(() => {
                loginModal.classList.add('active');
            }, 300);
        });

        // Open Register Modal
        registerBtn.addEventListener('click', (e) => {
            e.preventDefault();
            registerModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        sidebarRegisterBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeSidebar();
            setTimeout(() => {
                registerModal.classList.add('active');
            }, 300);
        });

        // Close Modals
        loginModalClose.addEventListener('click', closeLoginModal);
        registerModalClose.addEventListener('click', closeRegisterModal);

        function closeLoginModal() {
            loginModal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function closeRegisterModal() {
            registerModal.classList.remove('active');
            document.body.style.overflow = 'auto';
            resetForm();
        }

        // Switch between modals
        gotoRegisterFromLogin.addEventListener('click', (e) => {
            e.preventDefault();
            closeLoginModal();
            setTimeout(() => {
                registerModal.classList.add('active');
            }, 300);
        });

        gotoLoginFromRegister.addEventListener('click', (e) => {
            e.preventDefault();
            closeRegisterModal();
            setTimeout(() => {
                loginModal.classList.add('active');
            }, 300);
        });

        // Next Button
        nextBtn.addEventListener('click', () => {
            // Validate step 1
            const firstName = document.getElementById('first-name');
            const lastName = document.getElementById('last-name');
            const country = document.getElementById('country');
            const language = document.getElementById('language');

            if (!firstName.value || !lastName.value || !country.value || !language.value) {
                alert('Please fill all required fields');
                return;
            }

            // Go to next step
            document.getElementById('step-1').classList.remove('active');
            document.getElementById('step-2').classList.add('active');
            formProgress.style.width = '100%';
            currentStep = 2;
            currentStepElement.textContent = currentStep;
        });

        // Previous Button
        prevBtn.addEventListener('click', () => {
            document.getElementById('step-2').classList.remove('active');
            document.getElementById('step-1').classList.add('active');
            formProgress.style.width = '50%';
            currentStep = 1;
            currentStepElement.textContent = currentStep;
        });

        // Form Submission
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            // Validate step 2
            const whatsapp = document.getElementById('whatsapp');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm-password');

            if (!whatsapp.value || !email.value || !password.value || !confirmPassword.value) {
                alert('Please fill all required fields');
                return;
            }

            if (password.value !== confirmPassword.value) {
                alert('Passwords do not match');
                return;
            }

            // Form is valid, show success message
            alert('Registration successful! Welcome to E-Learn.');
            closeRegisterModal();
        });

        // Reset form when modal is closed
        function resetForm() {
            form.reset();
            document.getElementById('step-2').classList.remove('active');
            document.getElementById('step-1').classList.add('active');
            formProgress.style.width = '50%';
            currentStep = 1;
            currentStepElement.textContent = currentStep;
        }

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                closeLoginModal();
            }
            if (e.target === registerModal) {
                closeRegisterModal();
            }
            if (e.target === overlay) {
                closeSidebar();
            }
        });



        // Form Submission for Login
        document.querySelector('.auth-form').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Login successful!');
            closeLoginModal();
        });

        // Image Slider Functionality
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slider-dot');
        const prevArrow = document.querySelector('.arrow.prev');
        const nextArrow = document.querySelector('.arrow.next');
        let currentSlide = 0;
        let slideInterval;

        // Function to show a specific slide
        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            currentSlide = (n + slides.length) % slides.length;

            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        // Next slide
        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        // Previous slide
        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        // Start auto sliding
        function startSlideShow() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        // Stop auto sliding
        function stopSlideShow() {
            clearInterval(slideInterval);
        }

        // Event listeners for arrows
        nextArrow.addEventListener('click', () => {
            stopSlideShow();
            nextSlide();
            startSlideShow();
        });

        prevArrow.addEventListener('click', () => {
            stopSlideShow();
            prevSlide();
            startSlideShow();
        });

        // Event listeners for dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopSlideShow();
                showSlide(index);
                startSlideShow();
            });
        });

        // Start the slideshow
        startSlideShow();

        document.addEventListener('livewire:load', function () {
            // Registration modal functionality
            const registerBtn = document.getElementById('register-btn');
            const registerModal = document.getElementById('register-modal');
            const registerModalClose = document.getElementById('register-modal-close');

            registerBtn.addEventListener('click', (e) => {
                e.preventDefault();
                registerModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            registerModalClose.addEventListener('click', () => {
                registerModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside
            window.addEventListener('click', (e) => {
                if (e.target === registerModal) {
                    registerModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // Open Login Modal
        loginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            loginModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        sidebarLoginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeSidebar();
            setTimeout(() => {
                loginModal.classList.add('active');
            }, 300);
        });

        // Close Login Modal
        loginModalClose.addEventListener('click', closeLoginModal);

        function closeLoginModal() {
            loginModal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Switch between modals
        gotoRegisterFromLogin.addEventListener('click', (e) => {
            e.preventDefault();
            closeLoginModal();
            setTimeout(() => {
                registerModal.classList.add('active');
            }, 300);
        });

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                closeLoginModal();
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
