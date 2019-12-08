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

class ServiceEmploye
{
    public function getListePersonnel()
    {
        try {
        $response = DB::table('PERSONNEL')
            ->select('matricule', 'nom', 'prenom', 'tel', 'codeFonc')
            ->orderBy('matricule')
            ->get();
        return $response;
    } catch (QueryException $e) {
        throw new MonException($e->getMessage());
    }
    }

    public function getListePersonnelAttraction($idA){
        try {
            $response = DB::table('PERSONNEL')
                ->select('nom', 'prenom', 'tel', 'codefonc','idAtt')
                ->join('OCCUPER', 'OCCUPER.matricule', '=', 'PERSONNEL.matricule')
                ->where('OCCUPER.idAtt', '=', $idA )
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function insertEmploye($mat, $nom, $prenom, $telephone, $codeFonc){
        try {
            $dateJour = date("Y-m-d");
            DB::table('PERSONNEL')->insert(
                ['matricule' => $mat, 'nom' => $nom,
                    'prenom' => $prenom,
                    'tel' => $telephone, 'codeFonc' => $codeFonc]
            );
            $response = array(
                'status_message' => 'Insertion réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
