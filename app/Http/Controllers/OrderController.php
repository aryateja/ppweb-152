<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
                      ->leftJoin('employees', 'employees.EmployeeID', '=', 'orders.EmployeeID')
                      ->leftJoin('customers', 'customers.CustomerID', '=', 'orders.CustomerID')
                      ->orderBy('OrderID', 'asc')
                      ->get();

        return view('pemesanan.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DB::table('orders')
                     ->leftJoin('employees', 'employees.EmployeeID', '=', 'orders.EmployeeID')
                     ->leftJoin('customers', 'customers.CustomerID', '=', 'orders.CustomerID')
                     // ->leftJoin('shippers', 'shippers.ShipperID', '=', 'orders.ShipVia')
                     ->where('OrderID', $id)
                     ->first();

        $order_details = DB::table('order details')
                             ->leftJoin('products', 'products.ProductID', '=', 'order details.ProductID')
                             ->where('OrderID', $id)
                             ->get();

        return view('pemesanan.show', compact('order', 'order_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
