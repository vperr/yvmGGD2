<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 24/01/2019
 * Time: 15:23
 */


namespace App\Http\Controllers;
use App\dao\ServiceLogin;

use http\Env\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\metier\User;
use App\metier\UserT;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ControllerLogin extends Controller
{

    public function signIn()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $userJson = json_decode($json);
            $login = null;
            $login = $userJson->EMAIL;
            $mdp =  $userJson->PASSWORD;

            if ($login != null) {
                $login_employe=$login;
                $pwd_employe=$mdp;

                $unService = new ServiceLogin();
                $uneReponse = $unService->getConnexion($login_employe,$pwd_employe);
                $unUserT = new UserT();
                $unUserT->setID($uneReponse->ID);
                $unUserT->setNAME($uneReponse->NAME);
                $unUserT->setEMAIL($uneReponse->EMAIL);
                $unUserT->setPASSWORD($uneReponse->PASSWORD);
                $unUserT->setLASTUPDATE($uneReponse->LAST_UPDATE);
                $unUserT->setUSERUPDATE($uneReponse->USER_UPDATE);
                return Response()->json($unUserT);
            }
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur);
        }
    }
}
