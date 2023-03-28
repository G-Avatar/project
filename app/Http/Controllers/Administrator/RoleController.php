<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('Administrator.role',[
            'data'=>Role::get()
        ]);
    }

    public function show($id)
    {
        $data = Role::with('users')
        ->where('id',$id)
        ->first();
        return view('Administrator.user',[
            'data'=>$data
        ]);
    }
}
