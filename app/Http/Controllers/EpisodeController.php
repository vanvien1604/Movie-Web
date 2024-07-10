<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Episode;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Episodes = Episode::orderBy('id','DESC')->get();
        return view('admin.Episode.index',compact('Episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $list_movie = Movie::orderBy('id','DESC')->get();
        return view('admin.Episode.create', compact('list_movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $data = $request->all();
        $Episodes = new Episode();
        $Episodes->movie_id = $data['movie_id'];
        $Episodes->linkphim = $data['linkphim'];
        $Episodes->episode = $data['episode'];
        toastr()->success('Thêm mới Thành Công !');

        $Episodes->save();
        return \redirect('/Episode');
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
        $Episodes = Episode::find($id);
        $list_movie = Movie::orderBy('id','DESC')->get();
        return view('admin.Episode.edit',compact('Episodes','list_movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $Episodes = Episode::find($id);
        $Episodes->movie_id = $data['movie_id'];
        $Episodes->linkphim = $data['linkphim'];
        $Episodes->episode = $data['episode'];
        toastr()->success('Cập nhật Thành Công !');

        $Episodes->save();
        return \redirect('/Episode');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $Episodes = Episode::find($id);
            $Episodes->delete();
            toastr()->success('Xóa Thành Công !');
    
            return \redirect('Episode');
        }
    }

    public function select_movie()
    {
        $id = $_GET['id'];
        $Movie = Movie::find($id);
        if ($Movie) {
            $output = '<option>--- chọn tập phim ---</option>';
            for ($i = 1; $i <= $Movie->sotap; $i++) {
                $output .= '<option value="'.$i.'">'.$i.'</option>';
            }
        } else {
            $output = '<option>Không tìm thấy phim</option>';
        }
        return response()->json($output); // Ensure output is returned
    }
    
}
