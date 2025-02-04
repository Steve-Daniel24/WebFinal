<?php

namespace app\models;

use Flight;

class AnimalModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //Type
    public function createTypeAnimal($nom)
    {
        $sql = "INSERT INTO type_animal (nom) VALUES ('$nom')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getTypeAnimal($id)
    {
        $sql = "SELECT * FROM type_animal WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllTypeAnimals()
    {
        $sql = "SELECT * FROM type_animal";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    public function updateTypeAnimal($id, $nom)
    {
        $sql = "UPDATE type_animal SET nom = '$nom' WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteTypeAnimal($id)
    {
        $sql = "DELETE FROM type_animal WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function createAnimal($utilisateur_id, $type_id, $poids_actuel, $poids_min_vente, $poids_max, $prix_vente_kg, $jours_sans_manger, $perte_poids_par_jour)
    {
        $sql = "INSERT INTO animal (utilisateur_id, type_id, poids_actuel, poids_min_vente, poids_max, prix_vente_kg, jours_sans_manger, perte_poids_par_jour) VALUES ($utilisateur_id, $type_id, $poids_actuel, $poids_min_vente, $poids_max, $prix_vente_kg, $jours_sans_manger, $perte_poids_par_jour)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAnimal($id)
    {
        $sql = "SELECT * FROM animal WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllAnimals()
    {
        $sql = "SELECT 
                    animal.id, 
                    utilisateur.nom AS eleveur_nom, 
                    type_animal.nom AS type_nom, 
                    animal.poids_actuel, 
                    animal.poids_min_vente, 
                    animal.poids_max, 
                    animal.prix_vente_kg, 
                    animal.jours_sans_manger, 
                    animal.perte_poids_par_jour
                FROM animal
                JOIN utilisateur ON animal.utilisateur_id = utilisateur.id
                JOIN type_animal ON animal.type_id = type_animal.id;
            ";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function updateAnimal($id, $utilisateur_id, $type_id, $poids_actuel, $poids_min_vente, $poids_max, $prix_vente_kg, $jours_sans_manger, $perte_poids_par_jour)
    {
        $sql = "UPDATE animal SET";
        if ($utilisateur_id != null) {
            $sql += " utilisateur_id = $utilisateur_id,";
        }
        if ($type_id != null) {
            $sql += " type_id = $type_id,";
        }
        if ($poids_actuel != null) {
            $sql += " poids_actuel = $poids_actuel,";
        }
        if ($poids_min_vente != null) {
            $sql += " poids_min_vente = $poids_min_vente,";
        }
        if ($poids_max != null) {
            $sql += " poids_max = $poids_max,";
        }
        if ($prix_vente_kg != null) {
            $sql += " prix_vente_kg = $prix_vente_kg,";
        }
        if ($jours_sans_manger != null) {
            $sql += " jours_sans_manger = $jours_sans_manger,";
        }
        if ($perte_poids_par_jour != null) {
            $sql += " perte_poids_par_jour = $perte_poids_par_jour";
        }
        $sql += " WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteAnimal($id)
    {
        $sql = "DELETE  FROM animal WHERE id = $id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function createHistorique_animal_alimentation($animal_id, $alimentation_id, $jour)
    {
        $sql = "INSERT INTO historique_animal_alimentation (animal_id, alimentation_id, jour) VALUES ($animal_id, $alimentation_id, $jour)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getHistorique_animal_alimentation($id)
    {
        $sql = "SELECT * FROM historique_animal_alimentation WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllHistoriques_animal_alimentation()
    {
        $sql = "SELECT * FROM historique_animal_alimentation";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function deleteHistorique_animal_alimentation($id)
    {
        $sql = "DELETE FROM historique_animal_alimentation WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function calculerGainPoidsAnimal($date)
    {
        $sql = "SELECT 
                    ha.animal_id, 
                    a.nom AS aliment_nom,
                    ta.nom AS animal_nom, 
                    a.pourcentage_gain_poids, 
                    ha.quantite, 
                    an.poids_actuel AS poidsanimal_actuel
                FROM historique_animal_alimentation ha
                JOIN alimentation a ON ha.alimentation_id = a.id
                JOIN animal an ON ha.animal_id = an.id
                JOIN type_animal ta ON an.type_id = ta.id
                WHERE ha.date_consommation <= '$date';
                ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $resultats = [];
        while ($row = $stmt->fetch()) {
            $animal_id = $row['animal_id'];

            if (!isset($resultats[$animal_id])) {
                $resultats[$animal_id] = [
                    'nom' => $row['animal_nom'],
                    'gain_poids_total' => 0,
                    'aliments' => []
                ];
            }

            $gain_poids = $row['quantite'] * ($row['pourcentage_gain_poids'] / 100);
            $resultats[$animal_id]['gain_poids_total'] += $gain_poids;

            $resultats[$animal_id]['aliments'][] = [
                'nom' => $row['aliment_nom'],
                'quantite' => $row['quantite'],
                'pourcentage_gain_poids' => $row['pourcentage_gain_poids'],
                'gain_poids' => $gain_poids
            ];
        }

        return $resultats;
    }

    //Animal shop
    public function createAnimalShop($type_id, $poids_actuel, $poids_min_vente, $poids_max, $prix_vente_kg, $jours_sans_manger, $perte_poids_par_jour)
    {
        $sql = "INSERT INTO animal_shop (type_id, poids_actuel, poids_min_vente, poids_max, prix_vente_kg, jours_sans_manger, perte_poids_par_jour) 
            VALUES ($type_id, $poids_actuel, $poids_min_vente, $poids_max, $prix_vente_kg, $jours_sans_manger, $perte_poids_par_jour)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAnimalShops()
    {
        $sql = "SELECT * FROM animal_shop";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAnimalShopById($id)
    {
        $sql = "SELECT * FROM animal_shop WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateAnimalShop($id, $type_id, $poids_actuel, $poids_min_vente, $poids_max, $prix_vente_kg, $jours_sans_manger, $perte_poids_par_jour)
    {
        $sql = "UPDATE animal_shop SET type_id = $type_id, poids_actuel = $poids_actuel, poids_min_vente = $poids_min_vente, poids_max = $poids_max, 
            prix_vente_kg = $prix_vente_kg, jours_sans_manger = $jours_sans_manger, perte_poids_par_jour = $perte_poids_par_jour WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteAnimalShop($id)
    {
        $sql = "DELETE FROM animal_shop WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function simulerFerme($date)
    {
        $dateActuelle = date('Y-m-d');
        $dateCible = $date; 
        $joursAActiver = (strtotime($dateCible) - strtotime($dateActuelle)) / (60 * 60 * 24);

        $sql = "SELECT id, type_id, poids_actuel, jours_sans_manger, perte_poids_par_jour, etat 
                FROM animal WHERE etat != 'Mort'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $animaux = $stmt->fetchAll();

        $sqlStock = "SELECT alimentation_id, quantite_stock FROM stock_aliments";
        $stmtStock = $this->db->prepare($sqlStock);
        $stmtStock->execute();
        $stocks = [];
        foreach ($stmtStock->fetchAll() as $stock) {
            $stocks[$stock['alimentation_id']] = $stock['quantite_stock'];
        }

        for ($jour = 0; $jour < $joursAActiver; $jour++) {
            foreach ($animaux as &$animal) {
                $sqlAliments = "SELECT id, pourcentage_gain_poids FROM alimentation 
                            WHERE type_id = (SELECT nom FROM type_animal WHERE id = :type_id)";
                $stmtAliments = $this->db->prepare($sqlAliments);
                $stmtAliments->execute(['type_id' => $animal['type_id']]);
                $aliments = $stmtAliments->fetchAll();

                $nourri = false;

                foreach ($aliments as $aliment) {
                    if (isset($stocks[$aliment['id']]) && $stocks[$aliment['id']] > 0) {
                        $gain_poids = ($aliment['pourcentage_gain_poids'] / 100) * $animal['poids_actuel'];
                        $animal['poids_actuel'] += $gain_poids;
                        $stocks[$aliment['id']]--;
                        $animal['jours_sans_manger'] = 0;
                        $nourri = true;
                        break;
                    }
                }

                if (!$nourri) {
                    $animal['poids_actuel'] += ($animal['perte_poids_par_jour'] / 100) * $animal['poids_actuel'];
                    $animal['jours_sans_manger']++;

                    $sqlJoursMax = "SELECT jours_sans_manger FROM animal WHERE id = :id";
                    $stmtJoursMax = $this->db->prepare($sqlJoursMax);
                    $stmtJoursMax->execute(['id' => $animal['id']]);
                    $joursMax = $stmtJoursMax->fetchColumn();

                    if ($animal['jours_sans_manger'] >= $joursMax) {
                        $animal['etat'] = 'Mort';
                    } else {
                        $animal['etat'] = ($animal['jours_sans_manger'] > 3) ? 'Malade' : 'Vivant';
                    }
                } else {
                    $animal['etat'] = 'Vivant';
                }
            }

            return [
                'animaux' => $animaux,
                'aliments' => $stocks
            ];
        }
    }
}
