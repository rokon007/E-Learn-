<div>
    <form class="auth-form" wire:submit.prevent="login">

        <div class="form-group">
            <label for="login-number">WhatsApp Number</label>
            <input type="tel" id="login-number" wire:model="whatsappNumber" placeholder="Enter your WhatsApp number" required>
            @error('whatsappNumber') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="login-password">Password</label>
            <input type="password" id="login-password" wire:model="password" placeholder="Enter your password" required>
            @error('password') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group" style="display: flex; align-items: center; margin-bottom: 20px;">
            <input type="checkbox" id="remember" wire:model="remember" style="margin-right: 10px;">
            <label for="remember" style="margin-bottom: 0;">Remember me</label>
        </div>

        @if(!empty($errorMessage))
            <div class="error-message" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                {{ $errorMessage }}
            </div>
        @endif

        <button type="submit" class="btn" style="width: 100%;">Login</button>

        <div class="form-footer">
            <p>Don't have an account? <a href="#" id="goto-register-from-login">Sign Up</a></p>
        </div>
    </form>

    <style>
        .error-message {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 5px;
            display: block;
        }
    </style>
</div>
