<?php

namespace App\Http\Services;

use App\Models\Customer;
use Exception;

class DeleteCustomerService
{
    public function destroyCustomer($id)
    {
        $deleteCustomer = Customer::where('active', true)->findOrfail($id)->update(['active' => false]);
        
        if (!$deleteCustomer){
            throw new Exception('Não há registros de clientes.');
        }

        return true;
    }
}