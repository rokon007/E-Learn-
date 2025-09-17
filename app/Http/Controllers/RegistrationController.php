<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function validateStep1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'country' => 'required',
            'language' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); // HTTP 422 Unprocessable Entity
        }

        return response()->json(['success' => true]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'country' => 'required',
            'language' => 'required',
            'whatsappNumber' => 'required|unique:users,whatsapp_number',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }

        // Check if reference exists
        if ($request->referenceNo) {
            $referrer = User::where('unique_id', $request->referenceNo)->first();
            if (!$referrer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid reference number'
                ], 422);
            }
        }

        // Create user
        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'country' => $request->country,
            'language' => $request->language,
            'whatsapp_number' => $request->whatsappNumber,
            'email' => $request->email,
            'reference_no' => $request->referenceNo,
            'password' => Hash::make($request->password),
            'unique_id' => $this->generateUniqueId($request->lastName),
            'status' => 'pending',
        ]);

        // Create referral record if reference exists
        if ($request->referenceNo && isset($referrer)) {
            Referral::create([
                'referrer_id' => $referrer->id,
                'referred_id' => $user->id,
                'bonus_amount' => 0,
                'status' => 'pending',
            ]);
        }

        // লগইন করানো (ঐচ্ছিক)
        auth()->login($user);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! Please wait for admin approval.',
            'redirect' => url('/dashboard') // আপনার ড্যাশবোর্ড URL
        ]);
    }

    private function generateUniqueId($name)
    {
        $name = trim(preg_replace('/\s+/', ' ', $name));
        $nameParts = explode(' ', $name);
        $firstPart = $nameParts[0] ?? 'user';

        if (strlen($firstPart) < 2) {
            $firstPart = 'user';
        }

        $firstLetter = strtoupper(substr($firstPart, 0, 1));
        $lastLetter = strtoupper(substr($firstPart, -1));
        $randomDigits = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $uniqueId = $firstLetter . $lastLetter . $randomDigits;

        while (User::where('unique_id', $uniqueId)->exists()) {
            $randomDigits = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $uniqueId = $firstLetter . $lastLetter . $randomDigits;
        }

        return $uniqueId;
    }
}
