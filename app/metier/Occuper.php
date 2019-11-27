<?php

namespace App\Modele;

class Occuper
{
    protected $table = 'OCCUPER';
    protected $primaryKey = array('idAtt', 'matricule');
    public $timestamps = true;
    protected $fillable = array();
    protected $visible = array('idAtt', 'matricule');
    protected $hidden = array();
}
