<?php

namespace App\Models\Model\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_name',
        'status',
    ];
}
