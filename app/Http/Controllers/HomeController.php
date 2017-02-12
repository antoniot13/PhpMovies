<?php

namespace App\Http\Controllers;

use App\Movie;
use App\TMDBImpl;
use App\TMDb;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = TMDBImpl::getMovies();
       //$movies[0]
       return view('home', ['movies' => $movies]);
        //return view('home')->with('movies', 'balu');//->withMovies($movies);
    }

    public function show($id)
    {
        $movies=TMDBImpl::getMovies();
        $singlemovie=[];
        foreach ($movies as $movie)
        {
            if($movie->id==$id)
            {
                $singlemovie=$movie;
            }

        }


        return view('singlemovie',['singlemovie'=> $singlemovie]);
    }
}
