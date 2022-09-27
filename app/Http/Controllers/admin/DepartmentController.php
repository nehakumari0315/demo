<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;


class DepartmentController extends Controller
{
    public function index(){
       $data=Department::with('department_list')->get();
        return view('admin/showdepartment',compact('data'));
    }

    public function store(Request $request){
        $data= Department::create(['department'=> $request->department]);
        $details=$request->designation;
        foreach($details as $dataDetail){
        $details =new Designation;
        $details['department_id']  =   $data->id;
        $details['designation'] =   $dataDetail;
        $details->save();
       }

       return redirect()->back()->with('success',' admin data insert successfully');
    }

    public function delDelete($id){
        $data= Department::find($id);
       foreach($data as $delData){
            Designation::where('department_id',$id)->delete();
       }
          Department::where('id',$id)->delete();
          return redirect()->back()->with('success','Data delete successfully');
    }

    public function edit($id){
        $data=Department::with('department_list')->find($id);
        return view('admin/edit',compact('data'));
    }

    public function update(Request $request,$id){
       Department::where('id',$request->id)->update(['department'=> $request->department]);
        $item=$request->designation;
        $delete_degignations = Designation::where('department_id',$request->id)->delete();
        foreach($item as $itemDetail){
            $designation = new Designation;
            $designation->department_id = $id;
            $designation->designation = $itemDetail;
            $designation->save();

    }
        return redirect('admin/department')->with('success',' admin data update successfully');
    }


}
