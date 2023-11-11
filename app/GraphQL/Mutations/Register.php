<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Register
{
    public function __invoke($_, array $args)
    {
        // Validate the input data
        $validatedData = validator($args, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Generate an access token for the new user (optional)
        $token = $user->createToken('api')->plainTextToken;

        // Return the user or token (or any other desired response)
        return $user;
    }
}