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
            'status' => 'required|boolean',
        ]);
        $Category = new Category();
        $Category->title = $data['title'];
        $Category->description = $data['description'] ?? '';
        $Category->status = $data['status'];
        $Category->slug = Str::slug($data['title']);
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
            'title' => 'required|max:255',
            'status' => 'required|boolean',
        ]);
        $Category = Category::find($id);
        $Category->title = $data['title'];
        $Category->description = $data['description'] ?? '';
        $Category->status = $data['status'];
        $Category->slug = Str::slug($data['title']);
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
