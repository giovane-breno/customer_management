<?php

namespace App\Http\Services;

use App\Models\Customer;
use Exception;

class FindCustomerByIdService
{
    public function findCustomer($id)
    {
        $activeCustomer = Customer::where('active', true)->findOrfail($id);
        if(!$activeCustomer){
            throw new Exception('Não há registros desse cliente.');
        }
        
        return $activeCustomer;
    }
}