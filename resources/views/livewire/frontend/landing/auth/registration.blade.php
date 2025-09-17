<div>
    <!-- Progress Bar -->
    <div class="progress-bar">
        <div class="progress" style="width: {{ $currentStep * 50 }}%"></div>
    </div>

    <div class="step-indicator">
        Step <span id="current-step">{{ $currentStep }}</span> of 2
    </div>

    <!-- Success Message -->
    @if($successMessage)
        <div class="success-message">
            {{ $successMessage }}
        </div>
    @endif

    <!-- Step 1: Personal Information -->
    <div class="form-step {{ $currentStep == 1 ? 'active' : '' }}" id="step1">
        <h3 style="margin-bottom: 20px; color: #2d3748; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Personal Information</h3>

        <div class="form-row">
            <div class="form-group">
                <label for="first-name">First Name <span style="color: #e53e3e;">*</span></label>
                <input type="text" id="first-name" wire:model="firstName" placeholder="Ex. John" required>
                @error('firstName') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="last-name">Last Name <span style="color: #e53e3e;">*</span></label>
                <input type="text" id="last-name" wire:model="lastName" placeholder="Ex. Doe" required>
                @error('lastName') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="country">Country <span style="color: #e53e3e;">*</span></label>
                <select id="country" wire:model="country" class="form-select" required>
                    <option value="" disabled selected>Select your country</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="United States">United States</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                </select>
                @error('country') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="language">Language <span style="color: #e53e3e;">*</span></label>
                <select id="language" wire:model="language" class="form-select" required>
                    <option value="" disabled selected>Select your language</option>
                    <option value="English">English</option>
                    <option value="Bengali">Bengali</option>
                    <option value="Spanish">Spanish</option>
                    <option value="French">French</option>
                    <option value="Arabic">Arabic</option>
                </select>
                @error('language') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-navigation">
            <button type="button" onclick="validateStep1()" class="btn">Next</button>
        </div>
    </div>

    <!-- Step 2: Account Information -->
    <div class="form-step {{ $currentStep == 2 ? 'active' : '' }}" id="step2">
        <h3 style="margin-bottom: 20px; color: #2d3748; padding-bottom: 10px; border-bottom: 1px solid #e2e8f0;">Account Information</h3>

        <div class="form-group">
            <label for="whatsapp">WhatsApp Number <span style="color: #e53e3e;">*</span></label>
            <input type="tel" id="whatsapp" wire:model="whatsappNumber" placeholder="Enter your WhatsApp number" required>
            @error('whatsappNumber') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Your Email Address <span style="color: #e53e3e;">*</span></label>
            <input type="email" id="email" wire:model="email" placeholder="Enter your email address" required>
            @error('email') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="reference">Reference No</label>
            <input type="text" id="reference" wire:model="referenceNo" placeholder="Enter reference number (if any)">
            @error('referenceNo') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="password">New Password <span style="color: #e53e3e;">*</span></label>
            <input type="password" id="password" wire:model="password" placeholder="Create a strong password" required>
            @error('password') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirm Password <span style="color: #e53e3e;">*</span></label>
            <input type="password" id="confirm-password" wire:model="password_confirmation" placeholder="Confirm your password" required>
        </div>

        <div class="form-navigation">
            <button type="button" class="btn btn-outline" onclick="goToStep(1)">Previous</button>
            <button type="button" onclick="submitForm()" class="btn">Create Account</button>
        </div>
    </div>

    <div class="form-footer">
        <p>Already have an account? <a href="#" id="goto-login-from-register">Login here</a></p>
    </div>

    <script>
        // DOM লোড হলে স্টেপ ভিজিবিলিটি সেট করুন
        document.addEventListener('DOMContentLoaded', function() {
            updateStepVisibility();
        });

        // Livewire ইভেন্ট লিসেনার
        document.addEventListener('livewire:initialized', function () {
            // Livewire state পরিবর্তন হলে স্টেপ ভিজিবিলিটি আপডেট করুন
            Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
                succeed(() => {
                    if (component.name === 'frontend.landing.auth.registration') {
                        updateStepVisibility();
                    }
                });
            });

            Livewire.on('closeModal', () => {
                const registerModal = document.getElementById('register-modal');
                if (registerModal) {
                    registerModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // স্টেপ ভিজিবিলিটি আপডেট করার ফাংশন
        function updateStepVisibility() {
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const currentStep = @this.currentStep;

            if (currentStep === 1) {
                if (step1) step1.style.display = 'block';
                if (step2) step2.style.display = 'none';
            } else if (currentStep === 2) {
                if (step1) step1.style.display = 'none';
                if (step2) step2.style.display = 'block';
            }
        }

        // স্টেপ 1 ভ্যালিডেশন এবং পরবর্তী স্টেপে যাওয়ার ফাংশন
        function validateStep1() {
            const firstName = document.getElementById('first-name');
            const lastName = document.getElementById('last-name');
            const country = document.getElementById('country');
            const language = document.getElementById('language');

            if (!firstName.value || !lastName.value || !country.value || !language.value) {
                alert('Please fill all required fields');
                return;
            }

            // Livewire মেথড কল করুন
            @this.call('firstStepSubmit');
        }

        // পূর্ববর্তী স্টেপে যাওয়ার ফাংশন
        function goToStep(step) {
            @this.call('back', step);
        }

        // ফর্ম সাবমিট করার ফাংশন
        function submitForm() {
            @this.call('secondStepSubmit');
        }
    </script>
</div>
