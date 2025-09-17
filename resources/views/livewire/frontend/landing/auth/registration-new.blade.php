<div>
    <!-- Progress Bar -->
    <div class="progress-bar">
        <div class="progress" id="progress-bar" style="width: 50%"></div>
    </div>

    <div class="step-indicator">
        Step <span id="current-step">1</span> of 2
    </div>

    <!-- Success Message -->
    <div id="success-message" class="success-message" style="display: none;"></div>

    <!-- Error Message -->
    <div id="error-message" class="error-message" style="display: none;"></div>

    <!-- Step 1: Personal Information -->
    @if($currentStep == 1)
    <form method="POST" action="{{ url('/validate-step1') }}">
        @csrf
        <div  class="form-step active">
            <h3 style="margin-bottom: 20px; color: #2d3748; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Personal Information</h3>

            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">First Name <span style="color: #e53e3e;">*</span></label>
                    <input type="text" id="first-name" name="firstName" placeholder="Ex. John" required>
                    <span id="first-name-error" class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="last-name">Last Name <span style="color: #e53e3e;">*</span></label>
                    <input type="text" id="last-name" name="lastName" placeholder="Ex. Doe" required>
                    <span id="last-name-error" class="error-message"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="country">Country <span style="color: #e53e3e;">*</span></label>
                    <select id="country" name="country" class="form-select" required>
                        <option value="" disabled selected>Select your country</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                    </select>
                    <span id="country-error" class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="language">Language <span style="color: #e53e3e;">*</span></label>
                    <select id="language" name="language" class="form-select" required>
                        <option value="" disabled selected>Select your language</option>
                        <option value="English">English</option>
                        <option value="Bengali">Bengali</option>
                        <option value="Spanish">Spanish</option>
                        <option value="French">French</option>
                        <option value="Arabic">Arabic</option>
                    </select>
                    <span id="language-error" class="error-message"></span>
                </div>
            </div>

            <div class="form-navigation">
               <button type="submit" class="btn">Next</button>
            </div>
        </div>
    </form>
    @endif

    <!-- Step 2: Account Information -->
    @if($currentStep == 2)
<form method="POST" action="{{ url('/register') }}">
    @csrf
    <div  class="form-step">
        <h3 style="margin-bottom: 20px; color: #2d3748; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Account Information</h3>

        <div class="form-group">
            <label for="whatsapp">WhatsApp Number <span style="color: #e53e3e;">*</span></label>
            <input type="tel" id="whatsapp" name="whatsappNumber" placeholder="Enter your WhatsApp number" required>
            <span id="whatsapp-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="email">Your Email Address <span style="color: #e53e3e;">*</span></label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            <span id="email-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="reference">Reference No</label>
            <input type="text" id="reference" name="referenceNo" placeholder="Enter reference number (if any)">
            <span id="reference-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="password">New Password <span style="color: #e53e3e;">*</span></label>
            <input type="password" id="password" name="password" placeholder="Create a strong password" required>
            <span id="password-error" class="error-message"></span>
        </div>

        <input type="hidden" name="firstName" value="{{ old('firstName') }}">
        <input type="hidden" name="lastName" value="{{ old('lastName') }}">
        <input type="hidden" name="country" value="{{ old('country') }}">
        <input type="hidden" name="language" value="{{ old('language') }}">

        <div class="form-group">
            <label for="confirm-password">Confirm Password <span style="color: #e53e3e;">*</span></label>
            <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm your password" required>
        </div>

        <div class="form-navigation">
            <button type="button" id="prev-btn" class="btn btn-outline">Previous</button>
            <button type="submit" class="btn">Create Account</button
        </div>
    </div>

    <div class="form-footer">
        <p>Already have an account? <a href="#" id="goto-login-from-register">Login here</a></p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nextBtn = document.getElementById('next-btn');
            const prevBtn = document.getElementById('prev-btn');
            const submitBtn = document.getElementById('submit-btn');
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const progressBar = document.getElementById('progress-bar');
            const currentStepSpan = document.getElementById('current-step');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');

            // CSRF টোকেন
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Next বাটন ক্লিক হ্যান্ডলার
            nextBtn.addEventListener('click', function() {
                // এরর মেসেজ ক্লিয়ার করুন
                clearErrorMessages();

                // ফর্ম ডেটা সংগ্রহ
                const formData = new FormData();
                formData.append('firstName', document.getElementById('first-name').value);
                formData.append('lastName', document.getElementById('last-name').value);
                formData.append('country', document.getElementById('country').value);
                formData.append('language', document.getElementById('language').value);
                formData.append('_token', csrfToken);

                // AJAX রিকোয়েস্ট
                fetch('{{ url('validate-step1') }}', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Step 2 দেখাও
                        step1.style.display = 'none';
                        step2.style.display = 'block';
                        progressBar.style.width = '100%';
                        currentStepSpan.textContent = '2';
                        errorMessage.style.display = 'none';
                    } else {
                        // ভ্যালিডেশন এরর দেখাও
                        if (data.errors) {
                            for (const field in data.errors) {
                                const errorElement = document.getElementById(field + '-error');
                                if (errorElement) {
                                    errorElement.textContent = data.errors[field][0];
                                }
                            }
                        }
                        errorMessage.textContent = 'Please fix the errors above.';
                        errorMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorMessage.textContent = 'An error occurred. Please try again.';
                    errorMessage.style.display = 'block';
                });
            });

            // Previous বাটন ক্লিক হ্যান্ডলার
            prevBtn.addEventListener('click', function() {
                step2.style.display = 'none';
                step1.style.display = 'block';
                progressBar.style.width = '50%';
                currentStepSpan.textContent = '1';
                errorMessage.style.display = 'none';
                clearErrorMessages();
            });

            // Submit বাটন ক্লিক হ্যান্ডলার
            submitBtn.addEventListener('click', function() {
                // এরর মেসেজ ক্লিয়ার করুন
                clearErrorMessages();

                // ফর্ম ডেটা সংগ্রহ
                const formData = new FormData();
                formData.append('firstName', document.getElementById('first-name').value);
                formData.append('lastName', document.getElementById('last-name').value);
                formData.append('country', document.getElementById('country').value);
                formData.append('language', document.getElementById('language').value);
                formData.append('whatsappNumber', document.getElementById('whatsapp').value);
                formData.append('email', document.getElementById('email').value);
                formData.append('referenceNo', document.getElementById('reference').value);
                formData.append('password', document.getElementById('password').value);
                formData.append('password_confirmation', document.getElementById('confirm-password').value);
                formData.append('_token', csrfToken);

                // AJAX রিকোয়েস্ট
                fetch('{{ url('register') }}', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        successMessage.textContent = data.message;
                        successMessage.style.display = 'block';
                        errorMessage.style.display = 'none';

                        // রিডাইরেক্ট বা মডেল ক্লোজ
                        setTimeout(() => {
                            const registerModal = document.getElementById('register-modal');
                            if (registerModal) {
                                registerModal.classList.remove('active');
                                document.body.style.overflow = 'auto';
                            }

                            if (data.redirect) {
                                window.location.href = data.redirect;
                            }
                        }, 2000);
                    } else {
                        // ভ্যালিডেশন এরর দেখাও
                        if (data.errors) {
                            for (const field in data.errors) {
                                const errorElement = document.getElementById(field + '-error');
                                if (errorElement) {
                                    errorElement.textContent = data.errors[field][0];
                                }
                            }
                        }

                        errorMessage.textContent = data.message || 'Registration failed. Please try again.';
                        errorMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorMessage.textContent = 'An error occurred. Please try again.';
                    errorMessage.style.display = 'block';
                });
            });

            // এরর মেসেজ ক্লিয়ার করার ফাংশন
            function clearErrorMessages() {
                const errorElements = document.querySelectorAll('.error-message');
                errorElements.forEach(element => {
                    element.textContent = '';
                });
            }
        });
    </script>
</div>
