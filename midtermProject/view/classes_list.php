<?php include('view/header.php'); ?>

<!-- Display Classes -->
<?php if (!empty($classes)): ?>

    <section id="list" class="class-container">
        <header>
            <h1>Class List</h1>
        </header>

        <?php foreach ($classes as $class): ?>
            <div class="list_row">
                <div class="list_item">

                    <p class="bold"><?= htmlspecialchars($class['Class']) ?></p>
                </div>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_class">
                    <input type="hidden" name="class_id" value="<?= $class['ID'] ?>">
                    <button class="remove-button" onclick="return confirm('Really want to delete this class?')">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </section>

    <!--Add Class-->
    <section>
        <h2>Add Class</h2>
        <form action=" ." method="post" id="add_form" class="add_class_form">
            <input type="hidden" name="action" value="add_class">
            <div class="add_inputs">
                <label>Class Name:</label>
                <input type="text" name="class_name" max_length="20" placeholder="Class Name" autofocus required>
            </div>
            <div class="add_item">
                <button class="add-button bold">Add Class</button>
            </div>
        </form>
    </section>
<?php endif; ?>

<a href=".?action=list_vehicles">View Vehicles</a>
<a href=".?action=list_makes">View Makes</a>
<a href=".?action=list_types">View Types</a>
<a href=".?action=list_admin_vehicles">Admin Vehicle Control</a>

<?php include('view/footer.php'); ?>