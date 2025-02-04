<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul du Gain de Poids</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            envoyerFormulaire();
        });

        function envoyerFormulaire() {
            let date = document.getElementById("date").value;

            if (!date) {
                alert("Veuillez sélectionner une date.");
                return;
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo Flight::get('flight.base_url') ?>Animals/gainPoids", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    let data = JSON.parse(xhr.responseText);
                    let tableBody = document.getElementById("resultatsTable");
                    tableBody.innerHTML = "";

                    Object.keys(data.resultats).forEach(animal_id => {
                        let animal = data.resultats[animal_id];

                        let row = `<tr>
                    <td><strong>${animal.nom}</strong></td>
                    <td><strong>${animal.gain_poids_total.toFixed(2)} kg</strong></td>
                    <td colspan="3"></td>
                </tr>`;
                        tableBody.innerHTML += row;

                        animal.aliments.forEach(aliment => {
                            let subRow = `<tr>
                        <td></td>
                        <td></td>
                        <td>${aliment.nom}</td>
                        <td>${aliment.quantite} kg</td>
                        <td>${aliment.pourcentage_gain_poids} %</td>
                        <td>${aliment.gain_poids.toFixed(2)} kg</td>
                    </tr>`;
                            tableBody.innerHTML += subRow;
                        });
                    });
                } else {
                    console.error("Erreur de la requête:", xhr.statusText);
                }
            };

            xhr.onerror = function() {
                console.error("Erreur de connexion ou de serveur");
            };

            xhr.send(JSON.stringify({
                date: date
            }));
        }
    </script>

</head>

<body>
    <h1>Calcul du Gain de Poids pour Tous les Animaux</h1>

    <form onsubmit="event.preventDefault(); envoyerFormulaire();">
        <label for="date">Date (format YYYY-MM-DD):</label>
        <input type="date" id="date" name="date" required>
        <br><br>
        <button type="submit">Calculer le gain de poids</button>
    </form>

    <h2>Résultats:</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nom de l'Animal</th>
                <th>Gain Total (kg)</th>
                <th>Aliment</th>
                <th>Quantité (kg)</th>
                <th>Gain (%)</th>
                <th>Poids gagné (kg)</th>
            </tr>
        </thead>
        <tbody id="resultatsTable"></tbody>
    </table>

</body>

</html>
