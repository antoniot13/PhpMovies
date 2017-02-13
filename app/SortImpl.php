<?php

class SortImpl {
    public static function cmp_popularity($a, $b)
    {
        if ($a->popularity == $b->popularity) {
            return 0;
        }
        return ($a->popularity < $b->popularity) ? -1 : 1;
    }

    public static function cmp_vote_count($a, $b)
    {
        if ($a->vote_count == $b->vote_count) {
            return 0;
        }
        return ($a->vote_count < $b->vote_count) ? -1 : 1;
    }

    public static function cmp_release_date($a, $b)
    {
        if ($a->release_date == $b->release_date) {
            return 0;
        }
        return ($a->release_date < $b->release_date) ? -1 : 1;
    }

    public static function cmp_vote_average($a, $b)
    {
        if ($a->vote_average == $b->vote_average) {
            return 0;
        }
        return ($a->vote_average < $b->vote_average) ? -1 : 1;
    }
}

