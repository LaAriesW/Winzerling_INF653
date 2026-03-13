<?php include('view/header.php'); ?>

<section>
    <h1>Update Course</h1>
    <form action="." method="post" class="add_course_form">
        <input type="hidden" name="action" value="update_course">
        <input type="hidden" name="course_id" value="<?= $course['courseID'] ?>">

        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="course_name"
                   value="<?= htmlspecialchars($course['courseName']) ?>"
                   maxlength="30" required>
        </div>

        <div class="add__addItem">
            <button class="add-button bold" type="submit">Update Course</button>
        </div>
    </form>

    <p><a href=".?action=list_courses">Back to Course List</a></p>
</section>

<?php include('view/footer.php'); ?>
