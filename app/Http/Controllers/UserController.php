<?php

namespace App\Http\Controllers;

use App\Chungwa;
use App\Fruit;
use App\Tenant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Stancl\Tenancy\Database\Models\Domain;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        //dd();
        $domain = Domain::firstWhere('domain', $request->domain);
        if (is_null($domain)) {
            return response()->json(['message' => 'domain not found!'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tenant = Tenant::find($domain->tenant_id);
        tenancy()->initialize($tenant);
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];
            $user = User::create($data);
            return response()->json(['message' => 'User created successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }

    public function loginUser(Request $request)
    {
        $domain = Domain::firstWhere('domain', $request->domain);
        if (is_null($domain)) {
            return response()->json(['message' => 'domain not found!'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tenant = Tenant::find($domain->tenant_id);
        tenancy()->initialize($tenant);
        $email = $request->email;
        $password = $request->password;
        $user = User::firstWhere('email', $email);
        if (is_null($user)) {
            return response()->json(['message' => 'User account does not exist!'], Response::HTTP_UNPROCESSABLE_ENTITY);

        } elseif (!Hash::check($password, $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect!'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $secret=Str::random(40);
        $user->update(['user_secret'=>$secret]);
        $result = [
            'user' => $user,
            'domain' => $domain,
            'user_secret' => $secret,
            'accessToken' => $user->createToken('oriems-sacco')->plainTextToken,
        ];
        return response()->json(['message' => 'Success','result'=>$result], Response::HTTP_OK);
    }

    public function getOranges(Request $request,$secret)
    {
        $domain = Domain::firstWhere('domain', $request->domain);
        if (is_null($domain)) {
            return response()->json(['message' => 'domain not found!'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tenant = Tenant::find($domain->tenant_id);
        tenancy()->initialize($tenant);
        $user=User::firstWhere('user_secret',$secret);
        if(is_null($user)){
            return response()->json(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }
        $oranges = $user->fruits()->latest()->get();
        return response()->json(['oranges' => $oranges, 'message' => 'Success'], Response::HTTP_OK);

    }
    public function saveOranges(Request $request,$secret)
    {
        $domain = Domain::firstWhere('domain', $request->domain);
        if (is_null($domain)) {
            return response()->json(['message' => 'domain not found!'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tenant = Tenant::find($domain->tenant_id);
        tenancy()->initialize($tenant);
        $user=User::firstWhere('user_secret',$secret);
        if(is_null($user) || $user->user_secret!=$secret){
            return response()->json(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }
        Fruit::create([
            'user_id'=>$user->id,
            'chungwa_id'=>$request->chungwa_id,
        ]);
        return response()->json(['message' => 'Chungwas created successfully!'], Response::HTTP_CREATED);

    }
}
