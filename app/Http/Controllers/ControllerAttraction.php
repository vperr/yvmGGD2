<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 25/01/2019
 * Time: 14:10
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use App\dao\ServiceAttraction;


class ControllerAttraction extends Controller
{
    public function listeAttraction(){
        try {
            $uneAttraction = new ServiceAttraction();
            $response = $uneAttraction->getAttraction();
            return json_encode($response);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 205);
        }
    }

    public function modifierAttraction(){
            try {
                $json = file_get_contents('php://input'); // Récupération du flux JSON
                $attractionJson = json_decode($json);
                if ($attractionJson != null) {
                    $idA = $attractionJson->idAtt;
                    $codeTA = $attractionJson->codeTA;
                    $libA = $attractionJson->libelleATT;
                    $tailleA = $attractionJson->tailleMin;
                    $ageA = $attractionJson->ageMin;
                    $image = $attractionJson->img;
                    $unService = new ServiceAttraction();
                    $uneReponse = $unService->updateAttraction($idA, $codeTA, $libA, $tailleA, $ageA, $image);
                    return response()->json($uneReponse);
                }
            } catch(MonException $e) {
                $erreur = $e->getMessage();
                return response()->json($erreur, 201);
            }
    }
}
