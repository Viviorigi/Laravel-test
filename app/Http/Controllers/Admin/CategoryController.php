<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\StoreUpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate=Category::all();
        return view('admin.category.index',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate=Category::all();
         return view('admin.category.add',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create($request->all());
            return redirect()->route('category.index')->with('success','Them moi thanh cong');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success','Them moi that bai');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {      
        $cate=Category::all();
        return view('admin.category.edit',compact('category','cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return redirect()->route('category.index')->with('success','Sua thanh cong');
        } catch (\Throwable $th) {
           return redirect()->back()->with('error','Sua that bai');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        try {
            $category->delete();
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Xoa that bai');
        }
       
    }
    public function trash(){
        $cate=Category::onlyTrashed()->get();
        return view('admin.category.trash',compact('cate'));
    }
    public function restore( $id) {
        Category::withTrashed()->where('id',$id)->restore();
        return redirect()->route('category.index')->with('success','Khoi phuc thanh cong');
    }
    public function forceDelete($id){
        Category::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()->with('success','Da xoa hoan toan');
    }
}
