<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function addProcess(Request $request)
    {
        $validatedData = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'process_name' => 'required|unique:processes,process_name',
            'process_description' => 'required|unique:processes,process_description',
        ]);

        Process::create($validatedData);

        return redirect()->route('admin-area-page')->with('success', 'Process added successfully');
    }
}
