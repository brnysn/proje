<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password extends Model
{
    use SoftDeletes;

    use Encryptable;

    protected $encryptable = ['pass'];
    
    protected $hidden = 'deleted_at';

    protected $fillable = [
        'title', 
        'username', 
        'pass', 
        'site_url', 
        'ip', 
        'description',
        'owner'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
