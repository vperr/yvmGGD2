<?php

namespace App\Modele;

class Fonction
{
    protected $table = 'FONCTION';
    protected $primaryKey = "codeFonc";
    public $timestamps = true;
    protected $fillable = array('libelleFonc');
    protected $visible = array('libelleFonc');
    protected $hidden = array();
}
