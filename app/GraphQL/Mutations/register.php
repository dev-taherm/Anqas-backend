<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Register
{
    public function __invoke($root, array $args)
    {
        $validator = Validator::make($args['input'], [
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = new User();
        $user->username = $args['input']['username'];
        $user->email = $args['input']['email'];
        $user->password = Hash::make($args['input']['password']);
        $user->save();

        return [
            'success' => true,
            'message' => 'Registration successful.',
        ];
    }
}