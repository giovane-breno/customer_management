<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $customer = Customer::where('active', true)->orderby('id', 'desc')->get();
            return response()->json(['customers' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Empty table, register one customer at least!'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $customer = Customer::where('active', true)->findOrfail($id);
            return response()->json(['customer' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found!'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Customer::where('active', true)->findOrfail($id)->update(['active' => false]);
            return response()->json(['message' => 'Customer deleted sucessfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found or already deleted!'], 404);
        }
    }
}
