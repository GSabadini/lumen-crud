<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * @return Response|ResponseFactory
     */
    public function index()
    {
        $customers = Customer::all();

        return response($customers);
    }

    /**
     * @param $id
     * @return Response|ResponseFactory
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return response($customer);
    }

    /**
     * @param Request $request
     * @return Response|ResponseFactory
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

        return response($customer, 201);
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response|ResponseFactory
     */
    public function update($id, Request $request)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return response($customer);
    }

    /**
     * @param $id
     * @return Response|ResponseFactory
     */
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();

        return response(null, 204);
    }
}

