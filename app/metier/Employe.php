<?php

namespace App\Modele;

class Employe
{
    protected $table = 'PERSONNEL';
    protected $primaryKey = "matricule";
    public $timestamps = true;
    protected $fillable = array('nom', 'prenom', 'tel', 'codeFonc');
    protected $visible = array('nom', 'prenom', 'tel', 'codeFonc');
    protected $hidden = array();
}
