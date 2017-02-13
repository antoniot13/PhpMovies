<?php

namespace app;

include 'TMDb.php';
include 'Movie.php';
include 'DBImpl.php';

class TMDBImpl {
    public static function getMovies() {
        $apiKey = '45fb341c9e1114958b519e32556afaa1';

        $tmdb = new TMDb($apiKey);

        //$list = $tmdb->searchMovie('The Godfather');
        $list = $tmdb->getPopularMovies();
        $movies_array = array();

        foreach($list["results"] as $temp) {
            $ourRating = DBImpl::getRatingsForMovie($temp["id"]);
            $m = new Movie($temp["title"], $temp["id"], $temp["poster_path"], $temp["overview"], $temp["popularity"],
                $temp["vote_count"], ($temp["vote_average"] + $ourRating) / 2, $temp["release_date"], $temp["genre_ids"],
                'http://image.tmdb.org/t/p/w500');
            array_push($movies_array, $m);
        }
        return $movies_array;
    }

    public static function getMovie($id) {
        $apiKey = '45fb341c9e1114958b519e32556afaa1';
        $tmdb = new TMDb($apiKey);
        $temp = $tmdb->getMovie($id);
        $movies_array = array();

        //return $temp["genres"];

            $m = new Movie($temp["title"], $temp["id"], $temp["poster_path"], $temp["overview"], $temp["popularity"],
                $temp["vote_count"], $temp["vote_average"], $temp["release_date"],$temp["genres"],
                'http://image.tmdb.org/t/p/w500');
        array_push($movies_array, $m);

        return $movies_array;
    }
}