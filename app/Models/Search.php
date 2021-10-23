<?php

namespace App\Models;

trait Search
{

    /**
     * Cleans up the search term by
     * Ensuring that there's no MYSQL reversed symbols present in the search
     * Adding MYSQL wildcard characters (* and +) to the search term
     * This helps it to tale advantage of MYSQL's boolean mood
     * @param $term
     * @return mixed|string
     */
    private function buildWildCards($term)
    {
        if ($term == '') {
            return $term;
        }

        $reservedSymobols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term ($reservedSymobols, '', $term);

        $words = explode(' ', $term);

        foreach ($words as $idx => $word) {

            // Add Operators so we can leverage the boolean mode of fulltext indices

            $words[$idx] = '+' . $word . '*';
        }
        $term = implode(' ', $words);

        return $term;
    }

    /**
     *
     * @param $query
     * @param $term
     * @return mixed
     */
    protected function scopeSearch($query, $term)
    {
        $columns = implode(',', $this->searchable);

        $query->whereRaw(
            "MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)",
            $this->buildWildCards($term)
        );
        return $query;
    }
}
