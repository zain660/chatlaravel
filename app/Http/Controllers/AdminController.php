<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Packages;
class AdminController extends Controller
{
    public function index(){
        return view('admin.home',get_defined_vars());
    }

    public function all_users(){
        $all_user = User::where('id', '!=',Auth::user()->id)->paginate(10);
        return view('admin.all_users',get_defined_vars());
    }
    public function deactive_user($id){
        User::where('id',$id)->update(array(
            'account_is_active' => 0
        ));
        return redirect()->back()->with('success','User account deactivated Successfuly');
    }
    public function active_user($id){
        User::where('id',$id)->update(array(
            'account_is_active' => 1
        ));
        return redirect()->back()->with('success','User account activated Successfuly');
    }


    public function all_deactive_users(){
        $all_deactive_users = User::where('account_is_active', 0)->paginate(10);
        return view('admin.deactive_users',get_defined_vars());
    }
    public function all_active_users(){
        $all_active_users = User::where('account_is_active', 1)->where('id','!=',Auth::user()->id)->paginate(10);
        return view('admin.active_users',get_defined_vars());
    }

    public function all_packages(){
        $all_packages = Packages::all();
        return view('admin.all_packages',get_defined_vars());
    }

    public function create_package(){
        return view('admin.create_package');
    }

    public function add_package(Request $request){
        $package = new Packages;
        $package->pacakge_name = $request->package_name;
        $package->pacakge_description = $request->pacakge_description;
        $package->pacakge_price = $request->pacakge_price;
        $package->pacakge_valid = $request->pacakge_valid;
        $package->total_allow_message = $request->total_msg;
        $package->is_active = 1;
        $package->save();
        return redirect()->back()->with('success','Package Created Successfuly.');
    }

    public function activate_package($id){
        Packages::where('id',$id)->update(array(
            'is_active' => 1
        ));
        return redirect()->back()->with('success','Package Activated Successfuly.');

    }

    public function deactivate_package($id){
        Packages::where('id',$id)->update(array(
            'is_active' => 0
        ));
        return redirect()->back()->with('success','Package DeActivated Successfuly.');
    }

    public function edit_package($id){
        $package = Packages::findorfail($id);
        return view('admin.edit',get_defined_vars());
    }

    public function update_packages(Request $request, $id){

        Packages::findorfail($id)->update(array(
            'pacakge_name' => $request->package_name,
            'pacakge_description' => $request->pacakge_description,
            'pacakge_price' => $request->pacakge_price,
            'total_allow_message' => $request->total_msg,
            'pacakge_valid' => $request->pacakge_valid,
        ));
        return redirect('/admin/all-packages')->with('success','Package Updated Successfuly.');
    }
}
