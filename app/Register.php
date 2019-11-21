<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model {

    public function index() {

        $devices = Register::all();

        return view('register', compact('devices'));
    }

    public function create() {
        return view('register.create');
    }

    public function storeUser() {

        $device = new User();

        $device->name = request('name');
        $device->email = request('email');
        $device->password = request('password');


        $device->save();

        return redirect('/login');
    }

}
