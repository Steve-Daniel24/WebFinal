<?php

namespace app\controllers;
use app\models\User;
use Flight;
class UserController {

    public function __construct() {

	}
   

    public function depot(){
        $User = new User(Flight::db());
        $capital_actuel = $_POST['capital_actuel'];
        $User->updateCapitalActuel(1,$capital_actuel);
        Flight::render('dashboard');

    }


}

