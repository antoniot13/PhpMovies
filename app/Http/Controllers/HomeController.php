<?php

namespace App\Http\Controllers;

use App\DBImpl;
use App\Movie;
use App\TMDBImpl;
use App\TMDb;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $comments=DBImpl::getCommentsForMovie($id);

        return view('singlemovie',['singlemovie'=> $singlemovie], ['comments'=>$comments]);
    }
    public function search()
    {
        //return $_GET["q"];
        $singlemovie = TMDBImpl::getMovie($_GET["q"]);
        //return $singlemovie;

        $comments=DBImpl::getCommentsForMovie($singlemovie[0]->id);
        //return var_dump($comments);

        return view('singlemovie',['singlemovie'=> $singlemovie], ['comments'=>$comments]);
    }

    public function storeComment(Request $request,$id)

    {
        $data['id']=$id;
        $user= Auth::user()['id'];
        $comment=$request->comment;

        DBImpl::insertIntoUserMoviesComments($user,$id,$comment);
        return back();
    }
    public function profile(Request $request, $id) {
        $data['user'] = User::find($id);
        return view('profile', $data);
    }
}
