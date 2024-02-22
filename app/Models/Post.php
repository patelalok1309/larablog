<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Post extends Model implements HasMedia
{
    use HasFactory , SoftDeletes ,InteractsWithMedia ;

    protected $fillable = [
        'title',
        'content',
        'status',
        'excerpt',
        'user_id',
        'category_id'
    ];


    protected $appends = ['url'];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }


    // public function clearMediaCollection(string $collectionName = 'feature_image'): HasMedia
    // {
    //     //implement clearMediaCollecction() method
    // }        

    public function getUrlAttribute(){
        return $this->getFirstMediaUrl('feature_image');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class , 'commentable')->whereNull('parent_id')->latest();
    }
}
