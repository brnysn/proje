<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{

    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $hidden = ['deleted_at'];

    protected $fillable = [
        'name', 
        'description',
        'owner'
    ];

    public function passwords()
    {
        return $this->belongsToMany(Password::class);
    }
}
