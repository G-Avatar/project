<?php

namespace App\Http\Controllers\DCC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return view('Dcc.template');
    }
}
