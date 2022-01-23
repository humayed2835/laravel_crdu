<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

use Str;

use Carbon\Carbon;

class RoleController extends Controller
{
    //to veiw role add from
    function addform(){
        return view('role.add');
    }
    function storerole(Request $request){
        $request->validate([
            'role' => 'required',
        ]);
        $role = Str::lower($request->role);

        Role::insert([
            'role'=> $role,
            'created_at'=> Carbon::now(),
        ]);
    }
}
