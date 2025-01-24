<?php $title = "Admin - Properties"; ?>

<?php ob_start(); ?>
    <h1>Admin - Manage Properties</h1>

    <h2>Insert Property</h2>
    <!-- Vertical Form -->
    <form class="row g-3" action="AddHabitation" method="post" enctype="multipart/form-data";>
        <div class="col-12">
          <label class="form-label" for="type">Type ID</label>
          <input class="form-control" type="number" id="type" name="type" required>
        </div>
        <div class="col-12">
          <label class="form-label" for="num_rooms">Number of Rooms</label>
          <input class="form-control" type="number" id="num_rooms" name="num_rooms" required>
        </div>
        <div class="col-12">
          <label class="form-label" for="daily_rent">Daily Rent</label>
          <input class="form-control" step="0.01" id="daily_rent" name="daily_rent" required>
        </div>
        <div class="col-12">
          <label class="form-label" for="location">Location ID</label>
          <input class="form-control" type="number" id="location" name="location" required>
        </div>
        <div class="col-12">
                  <div class="form-floating">
                  <label for="description">Description</label>
                    <textarea class="form-control" placeholder="Description" style="height: 100px;" id="description" name="description" required></textarea>
                  </div>
                </div>
        <div class="col-12">
          <label class="form-label" for="description">Photo</label> 
          <input class="form-control" type="file" id="photo" name="photo" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="add">Insert Property</button>
        </div>
    </form><!-- Vertical Form -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Existing Properties</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Type ID</th>
                    <th>Number of Rooms</th>
                    <th>Daily Rent</th>
                    <th>Location ID</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($properties as $property): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($property['id']); ?></td>
                            <td><?php echo htmlspecialchars($property['type_id']); ?></td>
                            <td><?php echo htmlspecialchars($property['num_rooms']); ?></td>
                            <td><?php echo htmlspecialchars($property['daily_rent']); ?></td>
                            <td><?php echo htmlspecialchars($property['location_id']); ?></td>
                            <td><?php echo htmlspecialchars($property['description']); ?></td>
                            <td>
                                <form action="admin.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($property['id']); ?>">
                                    <input type="hidden" name="nom" value="<?php echo htmlspecialchars($property['type_id']); ?>">
                                    <input type="hidden" name="categorie" value="<?php echo htmlspecialchars($property['num_rooms']); ?>">
                                    <input type="hidden" name="photo" value="<?php echo htmlspecialchars($property['daily_rent']); ?>">
                                    <input type="hidden" name="prix" value="<?php echo htmlspecialchars($property['location_id']); ?>">
                                    <input type="hidden" name="prix" value="<?php echo htmlspecialchars($property['description']); ?>">
                                    <button type="submit" name="update"><span class="badge rounded-pill bg-primary">Edit</span></button>
                                </form>
                                <form action="admin.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($property['id']); ?>">
                                    <button type="submit" name="delete"><span class="badge rounded-pill bg-danger">Delete</span></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


    <?php $content = ob_get_clean(); ?>

<?php require('base.php') ?>