<?php

use Illuminate\Support\Facades\CSRFToken;
use Illuminate\Support\Facades\Auth;

class Query
{
    public function me($rootValue, array $args)
    {
        $user = Auth::user();

        $csrfToken = csrf_token();

        // Return the user object along with the CSRF token
        return array_merge($user->attributesToArray(), ['csrfToken' => $csrfToken]);
    }
}