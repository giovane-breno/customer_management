<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function ShowCustomersTable()
    {
        try {
            $customer = Customer::where('active', true)->orderby('id', 'desc')->get();
            return response()->json(['customers' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Empty table, register one customer at least!'], 404);
        }
    }

    public function AddCustomer($request)
    {
        try {
            $customer = Customer::create([
                'name' => $request->name,
                'age' => $request->age,
                'adress' => $request->adress,
                'state' => $request->state,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'active' => 1,
            ]);
            $customer->save();
            return response()->json(['message' => 'Customer sucessfully registered!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid Request'], 400);
        }
    }

    public function SelectCustomer($id)
    {
        try {
            $customer = Customer::where('active', true)->findOrfail($id);
            return response()->json(['customer' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found!'], 404);
        }
    }

    public function UpdateCustomer($request, $id)
    {
        try {
            $customer = Customer::where('active', true)->findOrfail($id);
            $customer->fill([
                'name' => $request->name,
                'age' => $request->age,
                'adress' => $request->adress,
                'state' => $request->state,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);
            $customer->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found!'], 404);
        }
    }
}
