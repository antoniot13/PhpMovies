<?php
/**
 * Created by PhpStorm.
 * User: nemesis
 * Date: 11-Feb-17
 * Time: 19:54
 */
namespace app;

class DBImpl {
    public static function getRatingsForMovie($id) {

        $link = mysqli_connect('127.0.0.1', 'test', 'test_1234', 'phpseries');
        if (!$link) {
            mysqli_close($link);
            die('Could not connect: ' . mysql_error());
        }
        $res = 0;
        if ($result = $link->query("select avg(Rating) from user_movie_rating where MovieId = " . $id)->fetch_all()) {
            $res = $result[0][0];
        }
        mysqli_close($link);
        return $res;
    }

    public static function getUserById($id) {

        $link = mysqli_connect('127.0.0.1', 'test', 'test_1234', 'phpseries');
        if (!$link) {
            mysqli_close($link);
            die('Could not connect: ' . mysql_error());
        }
        $res = "";
        if ($result = $link->query("select name from users where id = " . $id)->fetch_all()) {
            $res = $result[0][0];
        }
        mysqli_close($link);
        return $res;
    }

    public static function getCommentsForMovie($id) {
        $link = mysqli_connect('127.0.0.1', 'test', 'test_1234', 'phpseries');
        if (!$link) {
            mysqli_close($link);
            die('Could not connect: ' . mysql_error());
        }
        $res = array();
        if ($result = $link->query("select UserId, Comment from user_movie_comments where MovieId = " . $id)->fetch_all()) {

            foreach($result as $temp) {
                $res[$temp[0]] = $temp[1];
            }
        }
        mysqli_close($link);
        return $res;
    }

    public static function getMoviesWatchedByUser($userId) {
        $link = mysqli_connect('127.0.0.1', 'test', 'test_1234', 'phpseries');
        if (!$link) {
            mysqli_close($link);
            die('Could not connect: ' . mysql_error());
        }
        $res = array();
        if ($result = $link->query("select MovieId from user_movies where UserId = " . $userId)->fetch_all()) {

            foreach($result as $temp) {
                array_push($res, $temp[0]);
            }
        }
        mysqli_close($link);
        return $res;
    }
}