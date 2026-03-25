<?php include('view/header.php'); ?>

<!-- Display Makes -->
<?php if (!empty($types)): ?>

    <section id="list" class="types-container">
        <header>
            <h1>Types List</h1>
        </header>

        <?php foreach ($types as $type): ?>
            <div class="list_row">
                <div class="list_item">

                    <p class="bold"><?= htmlspecialchars($type['Type']) ?></p>
                </div>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_type">
                    <input type="hidden" name="type_id" value="<?= $type['ID'] ?>">
                    <button class="remove-button" onclick="return confirm('Really want to delete this type?')">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </section>

    <!--Add Class-->
    <section>
        <h2>Add Class</h2>
        <form action=" ." method="post" id="add_form" class="add_type_form">
            <input type="hidden" name="action" value="add_type">
            <div class="add_inputs">
                <label>Type Name:</label>
                <input type="text" name="type_name" max_length="20" placeholder="Type Name" autofocus required>
            </div>
            <div class="add_item">
                <button class="add-button bold">Add Type</button>
            </div>
        </form>
    </section>
<?php endif; ?>

<a href=".?action=list_vehicles">View Vehicles</a>
<a href=".?action=list_classes">View Classes</a>
<a href=".?action=list_makes">View Makes</a>
<a href=".?action=list_admin_vehicles">Admin Vehicle Control</a>

<?php include('view/footer.php'); ?>