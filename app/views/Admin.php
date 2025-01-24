<!DOCTYPE html>
<html>
<head>
    <title>Insert Property</title>
</head>
<body>
    <h1>Insert New Property</h1>
    <form action="AddHabitation" method="post" enctype="multipart/form-data";>
        <label for="type">Type ID:</label>
        <input type="number" id="type" name="type" required><br><br>

        <label for="num_rooms">Number of Rooms:</label>
        <input type="number" id="num_rooms" name="num_rooms" required><br><br>

        <label for="daily_rent">Daily Rent:</label>
        <input type="number" step="0.01" id="daily_rent" name="daily_rent" required><br><br>

        <label for="location">Location ID:</label>
        <input type="number" id="location" name="location" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="description">Photo:</label>
        <input type="file" id="photo" name="photo" required><br><br>

        <input type="submit" value="Insert Property">
    </form>
    <h2>All Properties</h2>
    <?php
   

    
  

    //if (!empty($properties)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Type ID</th><th>Number of Rooms</th><th>Daily Rent</th><th>Location ID</th><th>Description</th></tr>";
        foreach ($properties as $property) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($property['id']) . "</td>";
            echo "<td>" . htmlspecialchars($property['type_id']) . "</td>";
            echo "<td>" . htmlspecialchars($property['num_rooms']) . "</td>";
            echo "<td>" . htmlspecialchars($property['daily_rent']) . "</td>";
            echo "<td>" . htmlspecialchars($property['location_id']) . "</td>";
            echo "<td>" . htmlspecialchars($property['description']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
   // } else {
    //    echo "<p>No properties found.</p>";
   // }
    ?>
</body>
</html>