<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller {

    public function create(Request $request) {
        $validatedData = Validator::make($request->all(), [
                    'name' => 'required',
                    'password' => 'required',
                    'email' => 'required|email|unique:users'
                        ], [
                    'email.required' => 'Email is required!',
                    'name.required' => 'Name is required!',
                    'password.required' => 'Password is required!'
                        ]
        );
        if ($validatedData->fails()) {
            return redirect('register')
                            ->withErrors($validatedData->errors()->all())
                            ->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $data = array('name' => $name, "email" => $email, "password" => $password);
        DB::table('users')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
        return redirect('/login');
    }

}
