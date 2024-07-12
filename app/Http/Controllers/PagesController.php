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
    public function index(){
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $phimhot = Movie::where('phim_thinh_hanh',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $Episodes = Episode::with('Movie')->orderBy('episode', 'DESC')->get();
        $Categories_home = Category::with('Movie')->orderBy('id', 'DESC')->where('status',1)->get();
        return view('pages.home', compact('Categories','Genres','Countries','Categories_home', 'phimhot', 'Episodes'));
    }
    public function category($slug){
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $Movie = Movie::where('category_id', $cate_slug->id)->paginate(10);
        return view('pages.category', compact('Categories','Genres','Countries','cate_slug','Movie'));
    }
    public function genre($slug){
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $tl_slug = Genre::where('slug',$slug)->first();
        $Movie = Movie::where('genre_id', $tl_slug->id)->paginate(5);
        return view('pages.genre', compact('Categories','Genres','Countries','tl_slug','Movie'));
    }
    public function country($slug){
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $qg_slug = Country::where('slug',$slug)->first();
        $Movie = Movie::where('country_id', $qg_slug->id)->paginate(5);
        
        return view('pages.country', compact('Categories','Genres','Countries','qg_slug','Movie'));
    }
    public function movie($slug)
    {
        $Categories = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $Movie = Movie::with('Category', 'Genre', 'Country')->where('slug', $slug)->orderBy('id', 'DESC')->where('status', 1)->first();
        $episode_tapdau = Episode::with('Movie')->where('movie_id',$Movie->id)->orderBy('episode', 'ASC')->take(1)->first();
        $Movielq = Movie::with('Category', 'Genre', 'Country')
            ->where('category_id', $Movie->Category->id)
            ->orderBy(DB::raw('RAND()'))
            ->get();
        return view('pages.movie', compact('Categories', 'Genres', 'Countries', 'Movie', 'Movielq', 'episode_tapdau'));
    }
    public function watch($slug,$tap){
        if(isset($tap)){
            $tapphim = $tap;
        }else{
            $tapphim = 1;
        }
        $tapphim = substr($tap, 4,1);
        $Categories = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $Genres = Genre::orderBy('id', 'DESC')->get();
        $Countries = Country::orderBy('id', 'DESC')->get();
        $Movie = Movie::with('Category','Genre','Country','episode')->where('slug',$slug)->where('status',1)->first();
        $Episode = Episode::where('movie_id', $Movie->id)->where('episode', $tapphim)->first();
        $Movielq = Movie::with('Category', 'Genre', 'Country')
            ->where('category_id', $Movie->Category->id)
            ->orderBy(DB::raw('RAND()'))
            ->get();
        return view('pages.watch', compact('Categories','Genres','Countries','Movie','Movielq','Episode', 'tapphim'));
    }
    public function episode(){
        return view('pages.episode');
    }
}
