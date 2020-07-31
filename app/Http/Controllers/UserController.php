<?php

namespace App\Http\Controllers;

use App\Tenant;
use App\User;
use Illuminate\Http\Request;
use Stancl\Tenancy\Database\Models\Domain;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function createUser(Request $request){
        //dd();
        $domain=Domain::firstWhere('domain',$request->domain);
        if(is_null($domain)){
            return response()->json(['message'=>'domain not found!'],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tenant = Tenant::find($domain->tenant_id);
        tenancy()->initialize($tenant);
        try {
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ];
            User::create($data);
            return response()->json(['message'=>'User created successfully'],Response::HTTP_OK);
        }
       catch (\Exception $exception){
           return response()->json(['message'=>$exception->getMessage()],Response::HTTP_UNPROCESSABLE_ENTITY);
       }

    }
}
