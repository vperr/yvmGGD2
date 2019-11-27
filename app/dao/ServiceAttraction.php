<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 29/01/2019
 * Time: 14:23
 */

namespace App\dao;

use App\Exceptions\MonException;
use App\metier\Visiteur;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Facades\Hash;

class ServiceAttraction
{
    public function getAttraction(){
        try {
            $response = DB::table('ATTRACTION')
                ->select('libelleAtt', 'tailleMin', 'ageMin', 'img', 'libelleTA')
                ->join('TYPE_ATTRACTION', 'TYPE_ATTRACTION.codeTA', '=', 'ATTRACTION.codeTA')
                ->orderBy('idAtt')
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function updateAttraction($idA, $codeTA, $libA, $tailleA, $ageA, $image){
        try {
            $dateJour = date("Y-m-d");
            DB::table('ATTRACTION')->where('idAtt', '=', $idA)
                ->update(['CodeTA' => $codeTA, 'libelleAtt' => $libA,
                    'tailleMin' => $tailleA,
                    'ageMin' => $ageA,
                    'img' => $image
                ]);
            $response = array(
                'status_message' => 'Modification réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
