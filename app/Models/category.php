<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


Use App\Models\User;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['category_name'];
    
    public function relationToUser()
    {
        return $this->belongsTo(User::class, 'added_by' , 'id');
    }
}
