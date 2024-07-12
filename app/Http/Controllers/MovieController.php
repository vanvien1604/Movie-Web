<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use Str;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $request = Request('p');
        $Movies = Movie::with('Category', 'Genre', 'Country')->orderBy('id', 'DESC')->get();
        return view('admin.Movie.index', compact('Movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $Category = Category::orderBy('id', 'DESC')->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        return view('admin.Movie.create', compact('Category', 'Genres', 'Countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $data = $request->all();
            $Movies = new Movie();
            $Movies->title = $data['title'];
            $Movies->description = $data['description'];
            $Movies->sotap = $data['sotap'];
            $Movies->ngon_ngu = $data['ngon_ngu'];
            $Movies->status = $data['status'];
            $Movies->slug = Str::slug($data['title']);
            $Movies->category_id = $data['category_id'];
            $Movies->genre_id = $data['genre_id'];
            $Movies->country_id = $data['country_id'];
            $Movies->phim_thinh_hanh = $data['phim_thinh_hanh'];
            //thêm hình ảnh
            $get_image = $request->image;
            $path = 'backend/uploads/Movies/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $Movies->image = $new_image;
    
            $Movies->save();
            toastr()->success('Thêm mới Thành Công !');
            return redirect('/Movie');
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
    public function edit($id)
    {   
        $Category = Category::orderBy('id', 'DESC')->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $Movies = Movie::find($id);
        return view('admin.Movie.edit', compact('Movies','Category', 'Genres', 'Countries'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $Movies = Movie::find($id);
        $Movies->title = $data['title'];
        $Movies->description = $data['description'];
        $Movies->sotap = $data['sotap'];
        $Movies->ngon_ngu = $data['ngon_ngu'];
        $Movies->status = $data['status'];
        $Movies->slug = Str::slug($data['title']);
        $Movies->category_id = $data['category_id'];
        $Movies->genre_id = $data['genre_id'];
        $Movies->country_id = $data['country_id'];
        $Movies->phim_thinh_hanh = $data['phim_thinh_hanh'];
        //thêm hình ảnh
        $get_image = $request->image;
        if ($get_image) {
            if(!empty($Movies->image)){
                unlink('backend/uploads/Movies/'.$Movies->image);
            };
            $get_image = $request->image;
            $path = 'backend/uploads/Movies/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $Movies->image = $new_image;
        }
        
        $Movies->save();
        toastr()->success('Cập nhật Thành Công !');
        return redirect('/Movie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Movies = Movie::find($id);
        if(!empty($Movies->image)){
            unlink('backend/uploads/Movies/'.$Movies->image);
        };
        $Movies->delete();
        toastr()->success('Xóa Thành Công !');

        return \redirect('Movie');
    }
}
