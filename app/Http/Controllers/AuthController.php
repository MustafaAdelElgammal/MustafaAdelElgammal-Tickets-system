<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\LoginHistory;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    { 

    }

    public function login(Request $request) {

        $resource = null;
        try { 
              
            //return dump(toClass($data)->api_token);
            $validator = validator($request->json()->all(), [ 
                "email" =>  "required",  
                "password" =>  "required" 
            ], [
                "required" => __('fill all required data')
            ]);
            
            if ($validator->fails()) {
                return responseJson(0, $validator->errors()->first());
            }
            $data = $request->all();
            $user = Auth::attempt($data);
            $user_data = User::where('email', $request->email)->first();
            if (!$user)
                return responseJson(0, __('email or password error'));
              
            if (!$user_data->api_token) {
                $user_data->api_token = time();
                $user_data->update();
            }

            $resource = $user_data->fresh();


        } catch (\Exception $th) {
            return responseJson(0, $th->getMessage());
        }

        return responseJson(1, __('done'), $resource);
    }

    
}
