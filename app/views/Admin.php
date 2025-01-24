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
    <?php if (!empty($properties)): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Type ID</th>
                <th>Number of Rooms</th>
                <th>Daily Rent</th>
                <th>Location ID</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($properties as $property): ?>
                <?php foreach ($photo as $photos): ?>
                <tr>
                    <td><?= htmlspecialchars($property['id']) ?></td>
                    <td><?= htmlspecialchars($property['type_id']) ?></td>
                    <td><?= htmlspecialchars($property['num_rooms']) ?></td>
                    <td><?= htmlspecialchars($property['daily_rent']) ?></td>
                    <td><?= htmlspecialchars($property['location_id']) ?></td>
                    <td><?= htmlspecialchars($property['description']) ?></td>
                    <td><img src="<?= htmlspecialchars($photos['photo_url']) ?>" alt="" width="100" height="100"></td>
                    <td>
                        <form action="EditProperty.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($property['id']) ?>">
                            <input type="submit" value="Edit">
                        </form>
                        <form action="DeleteProperty.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($property['id']) ?>">
                            <input type="submit" value="Delete">
                        </form>
                        </td>
                </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No properties found.</p>
    <?php endif; ?>
</body>
</html>