<?php

namespace App\Modele;

class Attraction
{
    protected $table = 'ATTRACTION';
    protected $primaryKey = "idAtt";
    public $timestamps = true;
    protected $fillable = array('codeTA', 'libelleAtt', 'tailleMin', 'ageMin', 'img');
    protected $visible = array('codeTA', 'libelleAtt', 'tailleMin', 'ageMin', 'img');
    protected $hidden = array();
}
