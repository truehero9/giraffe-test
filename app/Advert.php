<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Advert extends Model
{
    const ITEMS_ON_PAGE = 5;

    protected $fillable = ['title', 'description', 'author_name'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_name', 'username');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function isAuthor()
    {
        return Auth::user() && $this->author->id === Auth::user()->id;
    }

    public function edit($title, $description) {
        $this->title = $title;
        $this->description = $description;
        $this->save();
    }
}
