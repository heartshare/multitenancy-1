<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TenantTestController extends Controller
{

    public function store(Request $request)
    {
//        dd($request);
        $tenant1 = Tenant::create(['id' => $request->name]);
        $tenant1->domains()->create(['domain' => $request->name.'.localhost']);

        Artisan::call('tenants:seed');
        return back()->with('success','created successfully');
    }
}
