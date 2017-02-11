<?php

namespace app;

include 'TMDb.php';
include 'Movie.php';
include 'DBImpl.php';

echo DBImpl::getRatingsForMovie('1') . "<br />";

foreach (DBImpl::getCommentsForMovie('1') as $UserId => $Comment) {
    echo $UserId . " : " . $Comment . "<br />";
}

echo DBImpl::getUserById('1') . "<br />";

