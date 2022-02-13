<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banners;
use Str;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('banner.create');
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
            'banner_title' => 'required',
            'banner_name' => 'required',
            'banner_image' => 'image',
        ]);

        $banners_id = Banners::insertGetId([
            'banner_title' =>Str::lower($request->banner_title),
            'banner_name' =>Str::lower($request->banner_name),
        ]);

        if($request->hasFile('banner_image')){
            $new_image_extension = $request->file('banner_image')->getClientOriginalExtension();
            $image_name = $banners_id.".".$new_image_extension;
            // image uploads starts
            Image::make($request->file('banner_image'))->resize(270,310)->save(base_path('public/Uploads/banner_photo/' .$image_name));
            // image uploads ends
            Banners::find($banners_id)->update([
                'banner_image' => $image_name, 
            ]);
        }

        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
