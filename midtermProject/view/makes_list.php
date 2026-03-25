<?php include('view/header.php'); ?>

<!-- Display Makes -->
<?php if (!empty($makes)): ?>

    <section id="list" class="makes-container">
        <header>
            <h1>Makes List</h1>
        </header>

        <?php foreach ($makes as $make): ?>
            <div class="list_row">
                <div class="list_item">

                    <p class="bold"><?= htmlspecialchars($make['Make']) ?></p>
                </div>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_make">
                    <input type="hidden" name="make_id" value="<?= $make['ID'] ?>">
                    <button class="remove-button" onclick="return confirm('Really want to delete this make?')">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </section>

    <!--Add Class-->
    <section>
        <h2>Add Class</h2>
        <form action="." method="post" id="add_form" class="add_make_form">
            <input type="hidden" name="action" value="add_make">
            <div class="add_inputs">
                <label>Make Name:</label>
                <input type="text" name="make_name" max_length="20" placeholder="Make Name" autofocus required>
            </div>
            <div class="add_item">
                <button class="add-button bold">Add Make</button>
            </div>
        </form>
    </section>


<?php endif; ?>

<a href=".?action=list_vehicles">View Vehicles</a>
<a href=".?action=list_classes">View Classes</a>
<a href=".?action=list_types">View Types</a>
<a href=".?action=list_admin_vehicles">Admin Vehicle Control</a>

<?php include('view/footer.php'); ?>