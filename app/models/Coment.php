<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Coment extends Eloquent
{

    protected $table = 'coments';

    protected $fillable = array(
        'coment',
    );
    public function blogs()
    {
        return $this->belongsTo('Blog', 'post_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
   
}
