<?php

namespace App\Http\Controllers\DCC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DCCEvidenceController extends Controller
{
    public function showEvidence()
    {
        return view('Dcc.evidence');
    }
}
