<?php

namespace App\Http\Services;

use App\Models\Customer;
use Exception;

class FindActiveCustomerService
{
    public function findCustomers()
    {
        $activeCustomers = Customer::where('active', true)->orderby('id', 'desc')->get();
        if(count($activeCustomers) == 0){
            throw new Exception('Não há registros de clientes.');
        }
        
        return $activeCustomers;
    }
}