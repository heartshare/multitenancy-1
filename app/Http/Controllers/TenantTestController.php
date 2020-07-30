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
        $id=$tenant1->id;
        $tenant1->domains()->create(['domain' => $request->name.'.localhost']);

        Artisan::call('tenants:seed', [
            '--tenants' => [$tenant1->id]
        ]);
        return back()->with('success','created successfully');
    }
}
