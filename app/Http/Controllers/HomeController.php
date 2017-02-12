<?php

namespace App\Http\Controllers;

use App\DBImpl;
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
        $singlemovie = TMDBImpl::getMovie($id);
        //return $singlemovie;
        return view('singlemovie',['singlemovie'=> $singlemovie]);
    }
    public function search()
    {
        //return $_GET["q"];
        $singlemovie = TMDBImpl::getMovie($_GET["q"]);
        //return $singlemovie;
        $comments=DBImpl::getCommentsForMovie($id);

        return view('singlemovie',['singlemovie'=> $singlemovie], ['comments'=>$comments]);
    }
}
