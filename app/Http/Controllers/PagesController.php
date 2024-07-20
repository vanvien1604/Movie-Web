<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use DB;

class PagesController extends Controller
{
    public function index(Request $request){
        $tk = $request->input('search');
        $Search = Movie::with('episode')->where('title', 'LIKE', '%'.$tk.'%' )->get();

        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $phimhot = Movie::with('episode')->where('phim_thinh_hanh',1)->orderBy('id','DESC')->take(5)->get();
        $phimhot_sidebar = Movie::where('phim_thinh_hanh',1)->orderBy('id','DESC')->take(20)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $Episodes = Episode::with('Movie')->orderBy('episode', 'DESC')->get();
        $Categories_home = Category::with('Movie')->orderBy('id', 'DESC')->where('status',1)->get();
        return view('pages.home', compact('Categories','Genres','Countries','Categories_home', 'phimhot', 'Episodes', 'phimhot_sidebar', 'Search', 'tk'));
    }
    public function category($slug){
        $phimhot_sidebar = Movie::where('phim_thinh_hanh',1)->orderBy('id','DESC')->take(20)->get();
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $Movie = Movie::with('episode')->where('category_id', $cate_slug->id)->paginate(12);
        return view('pages.category', compact('Categories','Genres','Countries','cate_slug','Movie','phimhot_sidebar'));
    }
    public function genre($slug){
        $phimhot_sidebar = Movie::where('phim_thinh_hanh',1)->orderBy('id','DESC')->take(20)->get();
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $tl_slug = Genre::where('slug',$slug)->first();
        $Movie = Movie::with('episode')->where('genre_id', $tl_slug->id)->paginate(12);
        return view('pages.genre', compact('Categories','Genres','Countries','tl_slug','Movie','phimhot_sidebar'));
    }
    public function country($slug){
        $phimhot_sidebar = Movie::where('phim_thinh_hanh',1)->orderBy('id','DESC')->take(20)->get();
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $qg_slug = Country::where('slug',$slug)->first();
        $Movie = Movie::with('episode')->where('country_id', $qg_slug->id)->paginate(12);
        
        return view('pages.country', compact('Categories','Genres','Countries','qg_slug','Movie','phimhot_sidebar'));
    }
    public function movie($slug)
    {
        $phimhot_sidebar = Movie::where('phim_thinh_hanh',1)->orderBy('id','DESC')->take(20)->get();
        $Categories = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $Movie = Movie::with('Category', 'Genre', 'Country')->where('slug', $slug)->orderBy('id', 'DESC')->where('status', 1)->first();
        $episode_tapdau = Episode::with('Movie')->where('movie_id',$Movie->id)->orderBy('episode', 'ASC')->take(1)->first();
        // lấy tổng tập phim
        $episode_current_list = Episode::with('Movie')->where('movie_id',$Movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        $Movielq = Movie::with('Category', 'Genre', 'Country')
            ->where('category_id', $Movie->Category->id)
            ->orderBy(DB::raw('RAND()'))
            ->get();
        return view('pages.movie', compact('Categories', 'Genres', 'Countries', 'Movie', 'Movielq', 'episode_tapdau', 'episode_current_list_count','phimhot_sidebar'));
    }
    public function watch($slug,$tap){
        if(isset($tap)){
            $tapphim = $tap;
        }else{
            $tapphim = 1;
        }
        $tapphim = substr($tap, 4,20);
        $phimhot_sidebar = Movie::where('phim_thinh_hanh',1)->orderBy('id','DESC')->take(20)->get();
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $Movie = Movie::with('Category','Genre','Country','episode')->where('slug',$slug)->where('status',1)->first();
        $Episode = Episode::where('movie_id', $Movie->id)->where('episode', $tapphim)->first();
        $Movielq = Movie::with('Category', 'Genre', 'Country')
            ->where('category_id', $Movie->Category->id)
            ->orderBy(DB::raw('RAND()'))
            ->get();
        return view('pages.watch', compact('Categories','Genres','Countries','Movie','Movielq','Episode', 'tapphim','phimhot_sidebar'));
    }
    public function episode(){
        return view('pages.episode');
    }
}
