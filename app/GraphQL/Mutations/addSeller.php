<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use App\Models\Seller;

class addSeller
{
    public function __invoke($root, array $args)
    {
        $user = Auth::user();

        // Ensure that a user is logged in
        if (!$user) {
            throw new \Exception('User is not authenticated.');
        }

        // Find the customer for the user
        $seller = $user->seller;

        if (!$seller) {
            // Create a new customer if not found
            $seller = new Seller();
            $seller->user_id = $user->id;
        }

        // Set the customer details
        $seller->o_username = $args['o_username'];
        $seller->o_name = $args['o_name'];
        $seller->o_address = $args['o_address'];
        $seller->o_city = $args['o_city'];
        $seller->o_phone = $args['o_phone'];
        $seller->o_bio = $args['o_bio'] ?? null;

        // Save the customer
        $seller->save();

        $message = $seller->wasRecentlyCreated ? 'Seller added successfully.' : 'Seller updated successfully.';

        return [
            'seller' => $seller,
            'message' => $message,
        ];
    }
}