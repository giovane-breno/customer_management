<?php

namespace App\Http\Services;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class UpdateCustomerService
{
    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::where('active', true)->findOrfail($id);
        $customer->fill([
            'name' => $request->name,
            'age' => $request->age,
            'adress' => $request->adress,
            'state' => $request->state,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);
        $saved = $customer->save();
        if (!$saved) {
            throw new Exception('Não foi possível atualizar o cliente.');
        }

        return true;
    }
}
