<?php

namespace App\Http\Services;

use App\Models\Customer;

class DeleteCustomerService
{
    public function DestroyCustomer($id)
    {
        try {
            Customer::where('active', true)->findOrfail($id)->update(['active' => false]);
            return response()->json(['message' => 'Customer deleted sucessfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found or already deleted!'], 404);
        }
    }
}