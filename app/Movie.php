<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // public function mutator(text) {
    // 	//$this->genres = json_encode($text);
    // }

    // public function accessor() {
    // 	//return json_decode($this->genres);
    // }

    protected $casts = [
    	'genres' => 'array',
    ];
}
