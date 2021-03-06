<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Blog extends Eloquent    
{
    protected $table = 'blogs';

    protected $fillable = array(
        'title',
        'content',     
    );
    public function coments()
    {
        return $this->hasMany('Coment', 'post_id', 'id');
    }

}
