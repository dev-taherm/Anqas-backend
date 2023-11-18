<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::where(function ($query) use ($args) {
            $query->where('email', $args['identifier'])
                  ->orWhere('username', $args['identifier']);
        })->first();

        if (! $user || ! Hash::check($args['password'], $user->password)) {
            throw ValidationException::withMessages([
                'identifier' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        $token = $user->createToken($args['device'])->plainTextToken;

        return [
            'user'=>$user,
            'success' => true,
            'message' => 'Login successful.',
            'token' => $token,
        ];
    }
}