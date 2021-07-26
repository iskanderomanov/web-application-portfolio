<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['parent_id', 'slug', 'title', 'description', 'created_at', 'updated_at', 'deleted_at'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format("dmyHi"), '-');
    }

    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }
}
