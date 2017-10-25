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

    public function setGenresAttribute($value) {
      $this->attributes['genres'] = json_encode($value);
    }

    protected $casts = [
    	'genres' => 'array',
    ];

    const rules = [
    	'name' => 'required | unique',
    	'director' => 'required', 
    	'image_url' => 'url',
    	'duration' => 'required | min: 1 | max: 500',
    	'release_date' => 'required | unique'
    ];



    public static function search($name = NULL, $take, $skip) {
        if($name == NULL)
        {
            return self::skip($skip)->take($take);
        } else {
                $movies = Movie::where('name', 'LIKE', '%' . $name . '%')->skip($skip)->take($take);
                return $movies;
        }
    }
}
