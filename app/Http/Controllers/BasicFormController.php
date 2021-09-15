<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasicFormController extends Controller
{
    public function store(Request $request)
    {
        try {

//            dd($request->all());
            DB::beginTransaction();
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->status = $request->status;
            $employee->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data stored successfully');

        }catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
