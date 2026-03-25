<!-- Display vehicles -->
<?php include('view/header.php'); ?>

<?php if (!empty($vehicles)): ?>

    <section id="list" class="vehicles-container">
        <header>
            <h1>vehicles List</h1>
        </header>

        <?php foreach ($vehicles as $vehicle): ?>
            <div class="list_row">
                <div class="list_item">

                    <p class="bold"><?= htmlspecialchars($vehicle['year']) ?></p>
                    <p class="bold"><?= htmlspecialchars($vehicle['model']) ?></p>
                    <p class="bold"><?= htmlspecialchars($vehicle['price']) ?></p>
                    <p class="bold"><?= htmlspecialchars($vehicle['Type']) ?></p>
                    <p class="bold"><?= htmlspecialchars($vehicle['Class']) ?></p>
                    <p class="bold"><?= htmlspecialchars($vehicle['Make']) ?></p>

                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

<!--Add Vehicle-->
<section>
    <h2>Add Vehicle</h2>
    <form action="." method="post" id="add_form" class="add_vehicle_form">
        <input type="hidden" name="action" value="add_vehicle">
        <div class="add_inputs">
            <label>vehicle Year:</label>
            <input type="text" name="vehicle_year" max_length="20" placeholder="Vehicle Year" autofocus required>
            <label>vehicle Model:</label>
            <input type="text" name="vehicle_model" max_length="20" placeholder="Vehicle Model" required>
            <label>vehicle Price:</label>
            <input type="text" name="vehicle_price" max_length="20" placeholder="Vehicle Price" required>
            <label>vehicle Type:</label>
            <select name="vehicle_type_id" required>
                <option value="" disabled selected>Select Type</option>
                <?php foreach ($types as $type): ?>
                    <option value="<?= $type['ID'] ?>"><?= htmlspecialchars($type['Type']) ?></option>
                <?php endforeach; ?>
            </select>
            <label>vehicle Class:</label>
            <select name="vehicle_class_id" required>
                <option value="" disabled selected>Select Class</option>
                <?php foreach ($classes as $class): ?>
                    <option value="<?= $class['ID'] ?>"><?= htmlspecialchars($class['Class']) ?></option>
                <?php endforeach; ?>
            </select>
            <label>vehicle Make:</label>
            <select name="vehicle_make_id" required>
                <option value="" disabled selected>Select Make</option>
                <?php foreach ($makes as $make): ?>
                    <option value="<?= $make['ID'] ?>">
                        <?= htmlspecialchars($make['Make']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

        </div>
        <div class="add_item">
            <button class="add-button" type="submit">Add Vehicle</button>
        </div>
    </form>


    <a href=".?action=list_classes">View Classes</a>
    <a href=".?action=list_makes">View Makes</a>
    <a href=".?action=list_types">View Types</a>
    <a href=".?action=list_admin_vehicles">Admin Vehicle Control</a>


</section>

<?php include('view/footer.php'); ?>