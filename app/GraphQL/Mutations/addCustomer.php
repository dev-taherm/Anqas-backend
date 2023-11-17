<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class addCustomer
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

        if (!$customer) {
            // Create a new customer if not found
            $customer = new Customer();
            $customer->user_id = $user->id;
        }

        // Set the customer details
        $customer->name = $args['name'];
        $customer->address = $args['address'];
        $customer->city = $args['city'];
        $customer->phone = $args['phone'];
        $customer->bio = $args['bio'] ?? null;

        // Save the customer
        $customer->save();

        $message = $customer->wasRecentlyCreated ? 'Customer added successfully.' : 'Customer updated successfully.';

        return [
            'customer' => $customer,
            'message' => $message,
        ];
    }
}