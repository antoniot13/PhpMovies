<?php

namespace App\Http\Controllers;

use App\Movie;
use App\TMDBImpl;
use App\TMDb;
use App\TMDbException;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = TMDBImpl::getMovies();

       return view('home')->withMovies($movies);
        //return view('home')->with('movies', 'balu');//->withMovies($movies);
    }
}
