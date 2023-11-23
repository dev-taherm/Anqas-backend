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
        $request = $customer->Request;

       
         $request = new Request();
        $request->customer_id = $customer->id;
        $request->titel = $args['titel'];
        $request->descriptions = $args['descriptions'];
        $request->post_address = $args['post_address'];
        $request->post_status = $args['post_status'];
      

        // Save the postr
        $request->save();

        $message =  'post added successfully.' ;

        return [
            'postr' => $request,
            'message' => $message,
        ];
    }
}