<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 24/01/2019
 * Time: 15:23
 */


namespace App\Http\Controllers;
use App\dao\ServiceLogin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\metier\User;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ControllerLogin extends Controller
{

    public function signIn()
    {
        try {
            // $json = file_get_contents('php://input'); // Récupération du flux JSON
            // $visiteurJson = json_decode($json);
            $login = null;
            $login = Input::get('email');
            $mdp = Input::get('password');

            if ($login != null) {
                $login_employe=$login;
                $pwd_employe=$mdp;

                $unService = new ServiceLogin();
                $uneReponse = $unService->getConnexion($login_employe,$pwd_employe);
                return json_encode($uneReponse);
            }
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur);
        }
    }
}
