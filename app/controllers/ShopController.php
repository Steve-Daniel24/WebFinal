<?php

namespace app\controllers;

use Flight;
use app\models\Animal;
use app\models\User;

class ShopController
{
    public function index()
    {
        $animals = Animal::getAllForSale();
        Flight::render('Animal_shop', ['animals' => $animals]);
    }

    public function viewAnimal($id)
    {
        $animal = Animal::getById($id);
        Flight::render('shop/animal-details', ['animal' => $animal]);
    }

    public function buyAnimal($id)
    {
        $animal = Animal::getById($id);
        $user = User::getById($_SESSION['user']->id);

        if ($user && $user->getCapitalActuel() >= $animal->price) {
            if (Animal::purchase($id, $user->getId())) {
                $user->deductBalance($animal->price);
                Flight::redirect('/Animals');
            }
        } else {
            Flight::redirect('/depot-argent');
        }
    }
}
