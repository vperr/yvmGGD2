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
            ->select('matricule', 'nom', 'prenom', 'tel', 'libelleFonc')
            ->join('FONCTION', 'PERSONNEL.codeFonc', '=', 'FONCTION.codeFonc')
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

    public function updateEmploye($mat, $nom, $pren, $tel, $codeF)
    {
        try {
            DB::table('PERSONNEL')->where('matricule', '=', $mat)
                ->update(['nom' => $nom, 'prenom' => $pren,
                    'tel' => $tel,
                    'codeFonc' => $codeF,
                ]);
            $response = array(
                'status_message' => 'Modification réalisée'
            );
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getListeFonction(){
        try {
            $response = DB::table('FONCTION')
                ->select('codeFonc', 'libelleFonc')
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function getPersonnelById($mat){
        try {
            $response = DB::table('PERSONNEL')
                ->select('matricule', 'nom', 'prenom', 'tel', 'codefonc')
                ->where('matricule', '=', $mat)
                ->get();
            return $response;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    /**
     * Suppression d'un employe
     * @param type $mat : Id d'un employé à supprimer
     **/
    public function deleteEmploye($mat){
        try {
            DB::table('PERSONNEL')->where('matricule', '=', $mat)->delete();

            return true;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
