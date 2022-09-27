<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
class EmployeeListController extends Controller
{
    public function index(){
         $department_data = Department::all();
        return view('admin/Employee-List/index', compact('department_data'));
    }
    public function subCat(Request $request)
    {
         $subDesignation = Designation::where('department_id',$request->id)->get();
        return response()->json([
            'department_list' => $subDesignation
        ]);
    }
}
