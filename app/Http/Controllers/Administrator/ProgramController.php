<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function addProgram(Request $request)
    {
        $validatedData = $request->validate([
            'institute_id' => 'required|exists:institutes,id',
            'program_name' => 'required|unique:programs,program_name',
            'program_description' => 'required|unique:programs,program_description',
        ]);

        Program::create($validatedData);

        return redirect()->route('admin-area-page')->with('success', 'Program added successfully');
    }
}
