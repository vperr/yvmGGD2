<?php

namespace App\Modele;

class User
{
    protected $table = 'USERS';
    protected $primaryKey = "ID";
    public $timestamps = true;
    protected $fillable = array('NAME', 'EMAIL', 'PASSWORD', 'LAST_UPDATE', 'USER_UPDATE');
    protected $visible = array('NAME', 'EMAIL', 'LAST_UPDATE', 'USER_UPDATE');
    protected $hidden = array('PASSWORD', 'rememberToken');


}
