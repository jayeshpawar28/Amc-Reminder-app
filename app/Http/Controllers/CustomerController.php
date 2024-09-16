<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Http\Requests\UpdateCustomerRequest;
use App\Mail\CustomerMail;
use App\Models\ProductModel;
use App\Models\ServiceModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CustomerModel::all();
        return view('customer.customer_list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = ProductModel::all();
        return view('customer.customer_add', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $data = $req->validate([
            'customer_name' => 'required',
            'mobile' => 'nullable',
            'address' => 'nullable',
            'email' => 'required|email|max:255',
            'product_fk' => 'required|exists:product,product_pk',
            'start_date' => 'required',
            'service_frequency' => 'required|',
            'warranty_year' => 'required|numeric|min:1',
            'product_amount' => 'required',
            'product_remark' => 'nullable',
        ]);

        $startDate = Carbon::parse($data['start_date']);
        $endDate = $startDate->addYear();
        $data['end_date'] = $endDate->format('Y-m-d');

        //creating new customer
        $customer = CustomerModel::create($data);

        //Calculate New Service Dates
        $frequency = (int) $data['service_frequency'];
        $nextServiceDate = Carbon::parse($data['start_date']);;
        $serviceCount = 12 / $frequency;

        for ($i=0; $i < $serviceCount; $i++) { 
            $service_date = $nextServiceDate->addMonths($frequency);
            ServiceModel::create([
                'service_date' => $service_date->format('Y-m-d'),
                'customer_fk' => $customer->customer_pk,
                'product_fk' => $customer->product_fk,
            ]);
        }
        
        

        //Send Mail
        $productName = ProductModel::where('product_pk', $customer->product_fk)->value('product_name');
        $serviceDetail = ServiceModel::where('customer_fk', $customer->customer_pk)->get();

        if ($req->has('send_email')) {
            Mail::to($customer->email)->send(new CustomerMail($customer, $serviceDetail,$productName));
        }

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = CustomerModel::find($id);
        $serviceDetail = ServiceModel::where('customer_fk', $data->customer_pk)->get();

        return view('customer.detail', ['data' => $data, 'serviceDetail' => $serviceDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = CustomerModel::find($id);
        return view('customer.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $customer = CustomerModel::find($id);
        
        $data = $req->validate([
            'customer_name' => 'required',
            'mobile' => 'nullable',
            'address' => 'nullable',
            'email' => 'required|email|max:255',
        ]);

        if($customer){
            $customer->update($data);
            return redirect()->route('customer.show', $id)->with('success', 'Customer updated successfully.');
        }

        return redirect()->route('customer.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = CustomerModel::find($id);

        if ($customer) {
            ServiceModel::where('customer_fk', $customer->customer_pk)->delete();
            $customer->delete();
            redirect()->route('customer.index')->with('delete', 'Customer and associated services deleted successfully.');
        }
    
        return redirect()->route('customer.index');

    }
}
