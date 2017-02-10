<?php

namespace App;

/**
 * Created by PhpStorm.
 * User: nemesis
 * Date: 09-Feb-17
 * Time: 21:01
 */
class Movie {
    public $title;
    public $id;
    public $image = "";
    public $overview;
    public $popularity;
    public $vote_count;
    public $vote_average;
    public $release_date;
    public $genre_array;

    public function __construct($_title, $_id, $_image, $_overview, $_popularity, $_vote_count, $_vote_average,
        $_release_date, $_genre_array) {
        $title = $_title;
        $id = $_id;
        $image = $_image;
        $overview = $_overview;
        $popularity = $_popularity;
        $vote_count = $_vote_count;
        $vote_average = $_vote_average;
        $release_date = $_release_date;
        $genre_array = $_genre_array;
    }

}