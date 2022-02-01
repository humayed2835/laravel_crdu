<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

use Str;

use Carbon\Carbon;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //to veiw role add from
    function addform(){
        $all_role = Role::all();
        return view('role.add',compact('all_role'));
    }
    function storerole(Request $request){
        $request->validate([
            'role' => 'required',
        ]);
        $role = Str::upper($request->role);

        if(Role::where('role', "=" , $role)-> doesntExist()){
            Role::insert([
                'role'=> $role,
                'created_at'=> Carbon::now(),
            ]);
        }else{
            return back()->with('insErr', 'already registered');
        }

        return back();
    }





}
