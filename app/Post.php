<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'admin_id', 'subject', 'detail',
    ];

    public function admin()
    {
        $admin = $this->belongsTo(Admin::class);
        return $$admin;
    }
}
