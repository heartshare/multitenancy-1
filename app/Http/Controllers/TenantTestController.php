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
        $tenant1 = Tenant::create(['id'=>'_'.rand(100,600).'_'.$request->name]);
        $tenant1->domains()->create(['domain' => $request->name.'.tenancy-test.io']);

        Artisan::call('tenants:seed', [
            '--tenants' => [$tenant1->id]
        ]);
        Artisan::call('passport:keys');
        return back()->with('success','created successfully');
    }
}
