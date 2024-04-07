<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        return  User::findOrFail($id);
    }

    public function index() {
        return User::get();
    }

    //request
    public function store(Request $rep) {
        $name = $rep->input('name');
    }

    #Dependency Injection & Route Parameters
    public function update (Request $req, $id) {
        
    }
}
