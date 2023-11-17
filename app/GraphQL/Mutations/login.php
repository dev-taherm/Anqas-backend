<?php declare(strict_types=1);

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
        $user = User::where('email', $args['email'])->first();

        if (! $user || ! Hash::check($args['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token= $user->createToken($args['device'])->plainTextToken;
         return [
            'success' => true,
            'message' => 'Login successful.',
            'token' => $token,
        ];
    }
}    
