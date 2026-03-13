<?php include('view/header.php'); ?>

<section class="assignment-container">
    <h2>Update Assignment</h2>

    <form action="." method="post">
        <input type="hidden" name="action" value="update_assignment">
        <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">

        <label>Description</label>
        <input type="text" name="description" maxlength="120"
               value="<?= htmlspecialchars($assignment['Description']) ?>" required>

        <label>Course</label>
        <select name="course_id" required>
            <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID'] ?>"
                    <?= $course['courseID'] == $assignment['courseID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($course['courseName']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Update Assignment</button>
    </form>

    <p><a href=".?action=list_assignments">Back to Assignment List</a></p>
</section>

<?php include('view/footer.php'); ?>
