<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable =
        ['name','description', 'price','image', 'stock'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Fetch the most recent image as cover

}
