<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 25/01/2019
 * Time: 14:10
 */

namespace App\Http\Controllers;

use App\metier\EmployeT;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use App\dao\ServiceEmploye;


class ControllerEmploye extends Controller
{
    public function getListeEmploye(){
        try {
            $unEmploye = new ServiceEmploye();
            $response = $unEmploye->getListePersonnel();
            if (isset ($response)){
                    return json_encode($response);

            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function listeEmployeAttraction($idA){
        try {
            $unEmployeAtt = new ServiceEmploye();
            $response = $unEmployeAtt->getListePersonnelAttraction($idA);
            return json_encode($response);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 205);
        }
    }

    public function ajoutEmploye(){
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $employeJson = json_decode($json);
            if ($employeJson != null) {
                $mat = $employeJson->matricule;
                $nom = $employeJson->nom;
                $pren = $employeJson->prenom;
                $tel = $employeJson->tel;
                $codeF = $employeJson->codeFonc;
                $unService = new ServiceEmploye();
                $uneReponse = $unService->insertEmploye($mat, $nom, $pren, $tel, $codeF);
                return response()->json($uneReponse);
            }
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }

    public function modifEmploye(){
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $employeJson = json_decode($json);
            if ($employeJson != null) {
                $mat = $employeJson->MATRICULE;
                $nom = $employeJson->NOM;
                $pren = $employeJson->PRENOM;
                $tel = $employeJson->TEL;
                $codeF = $employeJson->CODEFONC;
                $unService = new ServiceEmploye();
                $uneReponse = $unService->updateEmploye($mat, $nom, $pren, $tel, $codeF);
                return response()->json($uneReponse);
            }
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 201);
        }
    }

    public function getListeFonction(){
        try {
            $unEmploye = new ServiceEmploye();
            $response = $unEmploye->getListeFonction();
            if (isset ($response)){
                return json_encode($response);

            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function getUnEmploye($mat){
        try {
            $unEmploye = new ServiceEmploye();
            $response = $unEmploye->getPersonnelById($mat);
            if (isset ($response)){
                return json_encode($response);

            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function supprEmploye($mat)
    {
        try {
            $unService = new ServiceEmploye();
            $uneReponse = $unService->deleteEmploye($mat);
            return json_encode($uneReponse);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return $erreur;
        }
    }

}
