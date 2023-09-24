<?php

namespace App\Models;

use App\Http\Controllers\Admin\SectionsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','section_id'];

    public function section(){
       return $this->belongsTo(Section::class);
    }
}
