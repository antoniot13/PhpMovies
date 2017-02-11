<?php

namespace app;

include 'TMDb.php';
include 'Movie.php';

class TMDBImpl {
    public static function getMovies() {
        $apiKey = '45fb341c9e1114958b519e32556afaa1';

        $tmdb = new TMDb($apiKey);

        $list = $tmdb->searchMovie('The Godfather');

        $movies_array = array();

        foreach($list["results"] as $temp) {
            $m = new Movie($temp["title"], $temp["id"], $temp["poster_path"], $temp["overview"], $temp["popularity"],
                $temp["vote_count"], $temp["vote_average"], $temp["release_date"], $temp["genre_ids"]);
            array_push($movies_array, $m);
        }
        return $movies_array;
    }
}