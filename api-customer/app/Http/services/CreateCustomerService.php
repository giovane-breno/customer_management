<?php

namespace App\Http\Services;

use App\Models\Customer;
use Exception;

class CreateCustomerService
{
    public function createCustomer($name, $age, $adress, $state, $email, $phone_number)
    {
        $customer = Customer::create([
            'name' => $name,
            'age' => $age,
            'adress' => $adress,
            'state' => $state,
            'email' => $email,
            'phone_number' => $phone_number,
            'active' => 1,
        ]);
        $saved = $customer->save();
        if (!$saved){
            throw new Exception('Não foi possível cadastrar o cliente.');
        }
        
        return true;
    }
}
