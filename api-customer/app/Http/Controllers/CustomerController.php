<?php

namespace App\Http\Controllers;

use App\Http\Services\CreateCustomerService;
use App\Http\Services\DeleteCustomerService;
use App\Http\Services\FindActiveCustomerService;
use App\Http\Services\FindCustomerByIdService;
use App\Http\Services\UpdateCustomerService;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function findActiveCustomers()
    {
        try {
            $findActiveCustomerService = new FindActiveCustomerService();
            $activeCustomers = $findActiveCustomerService->findCustomers();
            return response()->json(['customers' => $activeCustomers], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function addCustomer(Request $request)
    {
        try {
            $createCustomerService = new CreateCustomerService();
            $createCustomerService->createCustomer(
                $request->name,
                $request->age,
                $request->adress,
                $request->state,
                $request->email,
                $request->phone_number
            );

            return response()->json(['message' => 'Customer sucessfully registered!'], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function selectCustomer($id)
    {
        try {
            $FindCustomerByIdService = new FindCustomerByIdService();
            $customer = $FindCustomerByIdService->findCustomer($id);
            return response()->json(['customer' => $customer], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function updateCustomer(Request $request, $id)
    {
        try {
            $UpdateCustomerService = new UpdateCustomerService();
            $UpdateCustomerService->updateCustomer($request, $id);
            return response()->json(['message' => 'Customer updated sucessfully!'], 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function deleteCustomer($id)
    {
        try {
            $deleteCustomerService = new DeleteCustomerService();
            $deleteCustomerService->destroyCustomer($id);
            return response()->json(['message' => 'Successful deleted!']);
        } catch (Exception  $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
