<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\ImgProduct;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\StoreEditProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pro=Product::paginate(5);
        return view('admin.product.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate=Category::all();
        return view('admin.product.add',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
       $file_name=$request->photo->getClientOriginalName();
       $request->photo->storeAs('public/images',$file_name);
       $request->merge(['image'=>$file_name]);
       
       try {
        $pro=Product::create($request->all());
        if($pro && $request->hasFile('photos')){
            foreach ($request->photos as $key => $value) {
                $file_names=$value->getClientOriginalName();
                $value->storeAs('public/images',$file_names);
                ImgProduct::create([
                    'product_id'=>$pro->id,
                    'image'=>$file_names
                ]);
            }
        }
        return redirect()->route('product.index')->with('success','Them moi thanh cong');
       } catch (\Throwable $th) {
        //throw $th;
       }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cate=Category::all();
        $product->all();
        return view('admin.product.edit',compact('cate','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEditProductRequest $request, Product $product)
    {       
        $file_name='';
        if($request->photo==''){
            $file_name=$product->image;
        }else{
            $file_name=$request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images',$file_name);
        }
        $request->merge(['image'=>$file_name]);
        try {
            $product->update($request->all());    
            if($product && $request->hasFile('photos')){   
                ImgProduct::where('product_id',$product->id)->delete();         
                foreach ($request->photos as  $value) {
                    $file_names=$value->getClientOriginalName();
                    $value->storeAs('public/images',$file_names);                   
                    ImgProduct::create([
                        'product_id'=>$product->id,
                        'image'=>$file_names
                    ]);
                }
                
            } 
            return redirect()->route('product.index')->with('success','Sua thanh cong');;
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back();
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       $product->delete();
       try {
        return redirect()->route('product.index')->with('success','xoa thanh cong');
       } catch (\Throwable $th) {
        return redirect()->back();
       }
       
    }

    public function trash(){
        $pro=Product::onlyTrashed()->get();
        return view('admin.product.trash',compact('pro'));
    }
    public function restore( $id) {
        Product::withTrashed()->where('id',$id)->restore();
        return redirect()->route('product.index')->with('success','Khoi phuc thanh cong');
    }
    public function forceDelete($id){
        ImgProduct::where('product_id',$id)->delete();
        Product::withTrashed()->where('id',$id)->forceDelete();
        
        return redirect()->back()->with('success','Da xoa hoan toan');
    }
}
