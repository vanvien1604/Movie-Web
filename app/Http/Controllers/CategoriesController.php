<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categories = Category::orderBy('id','DESC')->get();
        return view('admin.Categories.index', compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
            'status' => 'required|boolean',

        ],[
            'title.required' => 'Yêu cầu nhập tiêu đề !',
            'description.required' => 'Yêu cầu nhập mô tả !',
            'unique.required' => 'Tiêu đề đã tồn tại, vui lòng nhập khác !'
        ]);
        $Category = new Category();
        $Category->title = $data['title'];
        $Category->description = $data['description'];
        $Category->status = $data['status'];
        $Category->slug = Str::slug($data['title']);
        // thêm hình ảnh    
        // $get_image = $request->image;
        // $path = 'uploads/categories/';
        // $get_name_image = $get_image->getClientOriginalName();
        // $name_image = current(explode('.',$get_name_image));
        // $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
        // $get_image->move($path,$new_image);
        // $Category->image = $new_image;
        toastr()->success('Thêm mới Thành Công !');

        $Category->save();
        return redirect('/Categories');
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
    public function edit(string $id)
    {
        $Category = Category::find($id);
        return view('admin.Categories.edit', compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
            'status' => 'required|boolean',

        ],[
            'title.required' => 'Yêu cầu nhập tiêu đề !',
            'description.required' => 'Yêu cầu nhập mô tả !',
            'unique.required' => 'Tiêu đề đã tồn tại, vui lòng nhập khác !'
        ]);
        $Category = Category::find($id);
        $Category->title = $data['title'];
        $Category->description = $data['description'];
        $Category->status = $data['status'];
        $Category->slug = Str::slug($data['title']);
        // thêm hình ảnh

        // if($request->image){
        // $get_image = $request->image;
        // $path = 'uploads/categories/';
        // $get_name_image = $get_image->getClientOriginalName();
        // $name_image = current(explode('.',$get_name_image));
        // $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
        // $get_image->move($path,$new_image);
        // $Category->image = $new_image;
        // }
        toastr()->success('Cập nhật Thành Công !');
        $Category->save();
        return redirect('/Categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Categories = Category::find($id);
        toastr()->success('Xóa thành công !');
        $Categories->delete();
        return redirect('Categories');
    }
}
