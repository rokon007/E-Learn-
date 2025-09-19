<div>
    @section('title')
        <title>Change Password</title>
    @endsection

    @section('css')
        <style>
            .password-section {
                background: white;
                border-radius: 15px;
                padding: 30px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                margin-bottom: 30px;
                animation: fadeIn 0.6s ease forwards;
            }

            .password-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .password-title {
                font-size: 1.8rem;
                color: var(--text-dark);
                margin-bottom: 10px;
                position: relative;
                display: inline-block;
            }

            .password-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 4px;
                background: var(--accent-color);
                border-radius: 2px;
            }

            .password-subtitle {
                color: #64748b;
                font-size: 1rem;
                margin-top: 15px;
            }

            .password-form {
                max-width: 500px;
                margin: 0 auto;
            }

            .form-group {
                margin-bottom: 25px;
                position: relative;
            }

            .form-label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: var(--text-dark);
                display: flex;
                align-items: center;
            }

            .form-label i {
                margin-right: 10px;
                color: var(--accent-color);
                width: 20px;
            }

            .form-input {
                width: 100%;
                padding: 12px 16px;
                border: 2px solid #e2e8f0;
                border-radius: 10px;
                font-size: 1rem;
                transition: all 0.3s ease;
                background-color: #f8fafc;
            }

            .form-input:focus {
                border-color: var(--accent-color);
                box-shadow: 0 0 0 3px rgba(76, 132, 255, 0.2);
                outline: none;
                background-color: white;
            }

            .form-input.error {
                border-color: #ef4444;
            }

            .error-message {
                color: #ef4444;
                font-size: 0.85rem;
                margin-top: 5px;
                display: flex;
                align-items: center;
            }

            .error-message i {
                margin-right: 5px;
            }

            .btn-update {
                display: inline-flex;
                align-items: center;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                color: white;
                padding: 12px 30px;
                border-radius: 30px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1rem;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                box-shadow: 0 5px 15px rgba(76, 132, 255, 0.3);
            }

            .btn-update:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(76, 132, 255, 0.4);
            }

            .btn-update:active {
                transform: translateY(0);
            }

            .btn-update i {
                margin-right: 8px;
            }

            .success-message {
                display: inline-flex;
                align-items: center;
                background-color: var(--success);
                color: white;
                padding: 10px 20px;
                border-radius: 30px;
                font-weight: 500;
                margin-left: 15px;
                animation: fadeIn 0.5s ease;
            }

            .success-message i {
                margin-right: 8px;
            }

            .password-strength {
                margin-top: 8px;
                height: 6px;
                border-radius: 3px;
                background-color: #e2e8f0;
                overflow: hidden;
            }

            .strength-meter {
                height: 100%;
                width: 0;
                border-radius: 3px;
                transition: width 0.3s ease;
            }

            .strength-weak {
                background-color: #ef4444;
            }

            .strength-medium {
                background-color: #f59e0b;
            }

            .strength-strong {
                background-color: #10b981;
            }

            .password-requirements {
                margin-top: 10px;
                font-size: 0.85rem;
                color: #64748b;
            }

            .requirement {
                display: flex;
                align-items: center;
                margin-bottom: 5px;
            }

            .requirement i {
                margin-right: 5px;
                font-size: 0.7rem;
            }

            .requirement.met {
                color: #10b981;
            }

            .requirement.unmet {
                color: #64748b;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @media (max-width: 768px) {
                .password-section {
                    padding: 20px;
                }

                .password-title {
                    font-size: 1.5rem;
                }

                .form-actions {
                    flex-direction: column;
                    align-items: center;
                }

                .success-message {
                    margin-left: 0;
                    margin-top: 15px;
                }
            }
        </style>
    @endsection

    <div class="dashboard-header">
        <h1 class="dashboard-title">Change Password</h1>
    </div>

    <section class="password-section">
        <div class="password-header">
            <h2 class="password-title">Update Password</h2>
            <p class="password-subtitle">Ensure your account is using a long, random password to stay secure.</p>
        </div>
        <form wire:submit="updatePassword" class="password-form">
            <div class="form-group">
                <label for="update_password_current_password" class="form-label">
                    <i class="fas fa-lock"></i> Current Password
                </label>
                <input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" class="form-input @error('current_password') error @enderror" autocomplete="current-password" />
                @error('current_password')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password" class="form-label">
                    <i class="fas fa-key"></i> New Password
                </label>
                <input wire:model="password" id="update_password_password" name="password" type="password" class="form-input @error('password') error @enderror" autocomplete="new-password" />
                <div class="password-strength">
                    <div class="strength-meter" id="password-strength-meter"></div>
                </div>
                <div class="password-requirements">
                    <div class="requirement unmet" id="req-length">
                        <i class="fas fa-circle"></i> At least 8 characters
                    </div>
                    <div class="requirement unmet" id="req-uppercase">
                        <i class="fas fa-circle"></i> One uppercase letter
                    </div>
                    <div class="requirement unmet" id="req-lowercase">
                        <i class="fas fa-circle"></i> One lowercase letter
                    </div>
                    <div class="requirement unmet" id="req-number">
                        <i class="fas fa-circle"></i> One number
                    </div>
                </div>
                @error('password')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password_confirmation" class="form-label">
                    <i class="fas fa-check-double"></i> Confirm Password
                </label>
                <input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-input @error('password_confirmation') error @enderror" autocomplete="new-password" />
                @error('password_confirmation')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-actions" style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap;">
                <button type="submit" class="btn-update">
                    <i class="fas fa-save"></i> Update Password
                </button>

                <div wire:loading wire:target="updatePassword" class="success-message">
                    <i class="fas fa-spinner fa-spin"></i> Updating...
                </div>

                <x-action-message class="success-message" on="password-updated">
                    <i class="fas fa-check-circle"></i> {{ __('Password updated successfully!') }}
                </x-action-message>
            </div>
        </form>
    </section>

   @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('update_password_password');
                const strengthMeter = document.getElementById('password-strength-meter');
                const reqLength = document.getElementById('req-length');
                const reqUppercase = document.getElementById('req-uppercase');
                const reqLowercase = document.getElementById('req-lowercase');
                const reqNumber = document.getElementById('req-number');

                if (passwordInput) {
                    passwordInput.addEventListener('input', function() {
                        const password = this.value;
                        let strength = 0;

                        // Check length
                        if (password.length >= 8) {
                            strength += 25;
                            reqLength.classList.remove('unmet');
                            reqLength.classList.add('met');
                        } else {
                            reqLength.classList.remove('met');
                            reqLength.classList.add('unmet');
                        }

                        // Check uppercase
                        if (/[A-Z]/.test(password)) {
                            strength += 25;
                            reqUppercase.classList.remove('unmet');
                            reqUppercase.classList.add('met');
                        } else {
                            reqUppercase.classList.remove('met');
                            reqUppercase.classList.add('unmet');
                        }

                        // Check lowercase
                        if (/[a-z]/.test(password)) {
                            strength += 25;
                            reqLowercase.classList.remove('unmet');
                            reqLowercase.classList.add('met');
                        } else {
                            reqLowercase.classList.remove('met');
                            reqLowercase.classList.add('unmet');
                        }

                        // Check number
                        if (/[0-9]/.test(password)) {
                            strength += 25;
                            reqNumber.classList.remove('unmet');
                            reqNumber.classList.add('met');
                        } else {
                            reqNumber.classList.remove('met');
                            reqNumber.classList.add('unmet');
                        }

                        // Update strength meter
                        strengthMeter.style.width = strength + '%';

                        if (strength < 50) {
                            strengthMeter.className = 'strength-meter strength-weak';
                        } else if (strength < 100) {
                            strengthMeter.className = 'strength-meter strength-medium';
                        } else {
                            strengthMeter.className = 'strength-meter strength-strong';
                        }
                    });
                }
            });
        </script>
   @endsection
</div>
