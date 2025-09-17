<?php

namespace App\Livewire\Frontend\Landing\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class Registration extends Component
{
    public $currentStep = 1;
    public $firstName, $lastName, $country, $language;
    public $whatsappNumber, $email, $referenceNo, $password, $password_confirmation;
    public $successMessage = '';

    private function generateUniqueId(string $name): string
    {
        // Remove extra spaces and trim the name
        $name = trim(preg_replace('/\s+/', ' ', $name));

        // Get the first part of the name
        $nameParts = explode(' ', $name);
        $firstPart = $nameParts[0] ?? 'user';

        // Ensure the name has at least 2 characters; use defaults if not
        if (strlen($firstPart) < 2) {
            $firstPart = 'user';
        }

        // Get first and last letters, capitalize them
        $firstLetter = strtoupper(substr($firstPart, 0, 1));
        $lastLetter = strtoupper(substr($firstPart, -1));

        // Generate 5 random digits
        $randomDigits = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);

        // Combine to form 7-character unique_id
        $uniqueId = $firstLetter . $lastLetter . $randomDigits;

        // Check if the unique_id already exists, regenerate digits if necessary
        while (User::where('unique_id', $uniqueId)->exists()) {
            $randomDigits = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $uniqueId = $firstLetter . $lastLetter . $randomDigits;
        }

        return $uniqueId;
    }

    protected $rules = [
        'firstName' => 'required|min:2',
        'lastName' => 'required|min:2',
        'country' => 'required',
        'language' => 'required',
        'whatsappNumber' => 'required|unique:users,whatsapp_number',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    public function firstStepSubmit()
    {
        $this->validate([
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'country' => 'required',
            'language' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'whatsappNumber' => 'required|unique:users,whatsapp_number',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Check if reference exists
        if ($this->referenceNo) {
            $referrer = User::where('unique_id', $this->referenceNo)->first();
            if (!$referrer) {
                $this->addError('referenceNo', 'Invalid reference number');
                return;
            }
        }

        // Create user
        $user = User::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'country' => $this->country,
            'language' => $this->language,
            'whatsapp_number' => $this->whatsappNumber,
            'email' => $this->email,
            'reference_no' => $this->referenceNo,
            'password' => Hash::make($this->password),
            'unique_id' => $this->generateUniqueId($this->lastName),
            'status' => 'pending',
        ]);

        // Create referral record if reference exists
        if ($this->referenceNo && isset($referrer)) {
            Referral::create([
                'referrer_id' => $referrer->id,
                'referred_id' => $user->id,
                'bonus_amount' => 0, // Admin will set this later
                'status' => 'pending',
            ]);
        }

        $this->successMessage = 'Registration successful! Please wait for admin approval.';
        $this->resetForm();
        $this->currentStep = 1;

        // মডেল ক্লোজ করার ইভেন্ট emit করুন
        $this->dispatch('closeModal');

        event(new Registered($user));

        Auth::login($user);

        // Regenerate the session ID to prevent session fixation attacks
        session()->regenerate();

        $redirectUrl = session('url.intended', RouteServiceProvider::HOME);

        $this->redirect($redirectUrl, navigate: true);
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function resetForm()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->country = '';
        $this->language = '';
        $this->whatsappNumber = '';
        $this->email = '';
        $this->referenceNo = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.frontend.landing.auth.registration');
    }
}
