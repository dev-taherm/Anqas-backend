<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use App\Models\Request;

class addRequest
{
    public function __invoke($root, array $args)
    {
        $user = Auth::user();

        // Ensure that a user is logged in
        if (!$user) {
            throw new \Exception('User is not authenticated.');
        }

        // Find the customer for the user
        $customer = $user->customer;
        $postr = $customer->postr;

       
         $postr = new Request();
        $postr->customer_id = $customer->id;
        $postr->titel = $args['titel'];
        $postr->descriptions = $args['descriptions'];
        $postr->post_address = $args['post_address'];
        $postr->post_status = $args['post_status'];
      

        // Save the postr
        $postr->save();

        $message =  'post added successfully.' ;

        return [
            'postr' => $postr,
            'message' => $message,
        ];
    }
}