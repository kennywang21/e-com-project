<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories() {

      return $this->belongsToMany('App\Category', 'products_categories');
    }

    public function sizes() {

      return $this->belongsToMany('App\Size', 'products_sizes');
    }

    public function tags() {

      return $this->belongsToMany('App\Tag', 'products_tags');
    }
}
