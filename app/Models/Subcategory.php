<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\category;

class Subcategory extends Model
{
    use HasFactory;
    

    public function relationTocategories()
    {
        return $this->belongsTo(category::class, 'category_id' , 'id');
    }
}
