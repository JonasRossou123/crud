<?php require 'includes/header.php' ?>
    <!--input fields are empty except for the dropdown list-->
    <section>
        <p>add a new class</p>
        <div id="wrapcreate">
            <form method="post">
                <label for="className">Name:</label>
                <input type="text" name="name" id="name" required value=""/>

                <label for="email">Location:</label>
                <input type="text" name="location" id="location" required value=""/>

                <label for="teacherID">Teacher:</label>
                <select name="teacherID" id="teacherID">
                    <!--user can only select existing teachers, displayed in a dropdown list-->
                    <?php foreach ($teachers as $teacher): ?>
                        <option
                            value=<?php echo $teacher->getTeacherId()  ?>>
                            <?php echo htmlspecialchars($teacher->getName()) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <!--the information will be send via the post-method creating a new entity-->
                <input class="btn btn-warning btncss ml-3 mb-2" name="create" id="create" type="submit" value="Create">
            </form>
        </div>

        <p><a href="index.php">Back to homepage</a></p>
        <p>"CLASS PAGE - CREATE"</p>
    </section>
<?php require 'includes/footer.php'?>