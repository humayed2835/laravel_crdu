<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

use Carbon\Carbon;
use Str;
use auth;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('category.index',[
            'all_categorys' => Category::all(),
        ]);
            
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        // print_r($request->all());

        $category_name = Str::lower($request->category_name);

        if(category::where('category_name', "=" , $category_name)-> doesntExist()){
            category::insert([
                'category_name'=> $category_name,
                'created_at'=> Carbon::now(),
                'added_by'=> auth::user()->id,
            ]);
        }else{
            return back()->with('insErr', 'already registered');
        }

        return back()->with('insDone', 'Inserted !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $single_category = category::find($id);
       return view('category.edit',compact('single_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'category_name' => 'required',
        ],[
            'category_name.required' => 'fill first !',
        ]);

        $category_name = Str::lower($request->category_name);
        category::findOrFail($request->category_id)->update([
            'category_name' => $category_name,
        ]);
        return redirect('/category/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        category::find($id)->delete();
        return back();
    }
    public function deletedCategory()
    {
        $all_trashed = category::onlyTrashed()->get();
        return view('category.trashed', compact('all_trashed'));
    }

    public function categoryrestore($id)
    {
        category::withTrashed()->where('id',$id)->restore();
        return back();
    }

    public function vanish($id)
    {
        category::withTrashed()->where('id',$id)->forceDelete();
        return back()->with('delDone', 'Deleted successfully !');
    }













}
