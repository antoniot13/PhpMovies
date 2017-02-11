<?php

namespace app;

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
    public $base_url;

    public function __construct($_title, $_id, $_image, $_overview, $_popularity, $_vote_count, $_vote_average,
                                $_release_date, $_genre_array, $_base_url) {
        $this->title = $_title;
        $this->id = $_id;
        $this->image = $_image;
        $this->overview = $_overview;
        $this->popularity = $_popularity;
        $this->vote_count = $_vote_count;
        $this->vote_average = $_vote_average;
        $this->release_date = $_release_date;
        $this->genre_array = $_genre_array;
        $this->base_url = $_base_url;
    }

    public function getTitle() {
        return $this->title;
    }
}
