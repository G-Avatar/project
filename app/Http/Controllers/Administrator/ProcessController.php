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

    public function editProcess(Request $request)
    {
        $validatedData = $request->validate([
            'process_id' => 'required|exists:processes,id',
            'process_name' => 'required|unique:processes,process_name,'.$request->process_id,
            'process_description' => 'required|unique:processes,process_description,'.$request->process_id,
        ]);

        Process::where('id',$request->process_id)
        ->update($request->except('_token','_method','process_id'));

        return redirect()->route('admin-area-page')->with('success', 'Process updated successfully');
    }
}
