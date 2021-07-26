<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['category_id', 'user_id', 'slug', 'title', 'image','description', 'hours_spent','published_status', 'published_at', 'created_at', 'updated_at', 'deleted_at'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format("dmyHi"), '-');
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class);
}
    public function users(){
        return $this->belongsTo(User::class);
}
}
