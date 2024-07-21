<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Str;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $Countries = Country::orderBy('id','DESC')->get();
        return view('admin.Country.index', compact('Countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Country.create');
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
        $Countries = new Country();
        $Countries->title = $data['title'];
        $Countries->description = $data['description'] ?? '';
        $Countries->status = $data['status'];
        $Countries->slug = Str::slug($data['title']);
        toastr()->success('Thêm mới Thành Công !');

        $Countries->save();
        return \redirect('/Country');
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
        $Countries = Country::find($id);
        return view('admin.Country.edit', compact('Countries'));
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
        $Countries = Country::find($id);
        $Countries->title = $data['title'];
        $Countries->description = $data['description'] ?? '';
        $Countries->status = $data['status'];
        $Countries->slug = Str::slug($data['title']);
        toastr()->success('Cập nhật Thành Công !');

        $Countries->save();
        return \redirect('/Country');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Countries = Country::find($id);
        toastr()->success('Xóa thành công !');
        $Countries->delete();
        return \redirect('/Country');
    }
}
