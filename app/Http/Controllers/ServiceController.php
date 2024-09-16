<?php

namespace App\Http\Controllers;

use App\Models\ServiceModel;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Carbon\Carbon;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ServiceModel::with(['customer', 'product'])->get();
        return view('service.service_list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request,  $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $service)
    {
        //
    }

    public function filterServices($filter)
    {
        switch ($filter) {
            case 'today':
                $date = Carbon::today();
                $services = ServiceModel::whereDate('service_date', $date)->get();
                break;

            case 'yesterday':
                $date = Carbon::yesterday();
                $services = ServiceModel::whereDate('service_date', $date)->get();
                break;

            case 'this-week':
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();
                $services = ServiceModel::whereBetween('service_date', [$startOfWeek, $endOfWeek])->get();
                break;

            case 'last-week':
                $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek();
                $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek();
                $services = ServiceModel::whereBetween('service_date', [$startOfLastWeek, $endOfLastWeek])->get();
                break;

            case 'this-year':
                $startOfYear = Carbon::now()->startOfYear();
                $endOfYear = Carbon::now()->endOfYear();
                $services = ServiceModel::whereBetween('service_date', [$startOfYear, $endOfYear])->get();
                break;

            case 'all':
                $services = ServiceModel::all();
                break;

            default:
                $services = ServiceModel::all();
                break;
        }

        return view('service.service_list', ['data' => $services]);
    }

}
