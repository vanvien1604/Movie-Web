<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $Genres = Genre::orderBy('id','DESC')->get();
        return view('admin.Genre.index', compact('Genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Genre.create');
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
        ]);
        $Genres = new Genre();
        $Genres->title = $data['title'];
        $Genres->description = $data['description'];
        $Genres->status = $data['status'];
        $Genres->slug = Str::slug($data['title']);
        toastr()->success('Thêm mới Thành Công !');

        $Genres->save();
        return \redirect('/Genre');
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
        $Genres = Genre::find($id);
        return view('admin.Genre.edit', compact('Genres'));
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
        ]);
        $Genres = Genre::find($id);
        $Genres->title = $data['title'];
        $Genres->description = $data['description'];
        $Genres->status = $data['status'];
        $Genres->slug = Str::slug($data['title']);
        toastr()->success('Cập nhật Thành Công !');

        $Genres->save();
        return \redirect('/Genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Genres = Genre::find($id);
        toastr()->success('Xóa thành công !');
        $Genres->delete();
        return \redirect('/Genre');
    }
}
