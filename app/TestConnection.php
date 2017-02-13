<?php

namespace app;

include 'SortImpl.php';
include 'TMDBImpl.php';

echo DBImpl::getRatingsForMovie('1') . "<br />";

foreach (DBImpl::getCommentsForMovie('1') as $temp) {
    //echo $UserId . " : " . $Comment . "<br />";
}

echo DBImpl::getUserById('1') . "<br />";

echo DBImpl::getMoviesWatchedByUser('1')[0] . "<br />";

#echo "Affected rows: " . DBImpl::insertIntoUserMovies(1, 101);

#echo "Affected rows: " . DBImpl::insertIntoUserMoviesComments(2, 10, "komOdPHP");

#echo "Affected rows: " . DBImpl::insertIntoRatings(1, 9, 9);

echo DBImpl::insertIntoUserPicture(1, "picture1") . "<br />";

echo DBImpl::getPictureByUser(1);

echo "<br /><br /><br /><br />";

$mov = TMDBImpl::getMovies();

echo "<br /><br /><br /><br />";
usort($mov, "SortImpl::cmp_popularity");

$comm = DBImpl::getCommentsForMovie(328111);
var_dump($comm);
echo $comm[0][1];



