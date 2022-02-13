<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\category;
use App\Models\Subcategory;

use Str;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
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
        $all_products =Product::all();
        return view('product.index',compact('all_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_catecories = category::all();
        $all_sub_catecories = Subcategory::all();
        return view('product.create',compact('all_catecories','all_sub_catecories'));
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
            'product_name' => 'required',
            'old_price' => 'required|numeric',
            'product_image' => 'image',
        ]);
        $product_slug = Str::slug(Str::lower($request->product_name));
        $sku = Str::lower(Str::substr($request->product_name,0,3)."-".Str::random());

        $product_id = Product::insertGetId([
            'product_name' =>Str::lower($request->product_name),
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'product_slug' => $product_slug,
            'product_sku' => $sku,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'short_description' => $request->short_description,
            'created_at' =>Carbon::now(),

        ]);
        if($request->hasFile('product_image')){
            $new_image_extension = $request->file('product_image')->getClientOriginalExtension();
            $image_name = $product_id.".".$new_image_extension;
            // image uploads starts
            Image::make($request->file('product_image'))->resize(523,576)->save(base_path('public/Uploads/product_photo/' .$image_name));
            // image uploads ends
            Product::find($product_id)->update([
                'product_image' => $image_name, 
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
    public function delete($id)
    {
        if(Product::find($id)->product_image != "product_default_image.jpg"){
            unlink(public_path()."/Uploads/product_photo/".Product::find($id)->product_image);
        }
        Product::find($id)->delete();
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
        $product_info = Product::find($id);
        return view('product.edit',compact('product_info'));
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
        if($request->hasFile('product_image')){
            if(Product::find($request->id)->product_image != "product_default_image.jpg"){
                unlink(public_path()."/Uploads/product_photo/".Product::find($request->id)->product_image);
            }

            $new_image_extension = $request->file('product_image')->getClientOriginalExtension();
            $image_name = $request->id.".".$new_image_extension;
            // image uploads starts
            Image::make($request->file('product_image'))->resize(270,310)->save(base_path('public/Uploads/product_photo/' .$image_name));
            Product::find($request->id)->update([
                'product_image' => $image_name,
            ]);
        }
        return back();
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
