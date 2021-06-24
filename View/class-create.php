<?php require 'includes/header.php' ?>
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
                    <?php foreach ($teachers as $teacher): ?>
                        <option
                            value=<?php echo $teacher->getTeacherId()  ?>>
                            <?php echo htmlspecialchars($teacher->getName()) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input class="btn btn-warning btncss ml-3 mb-2" name="create" id="create" type="submit" value="Create">
            </form>
        </div>



        <?php /*foreach ($classes as $class):
                 var_dump($class-> getName());
                var_dump($_POST);
                endforeach;
 if(count($_POST)>0){var_dump($_POST);
 php if(isset($_POST)){var_dump($_POST);

 */?>



        <p><a href="index.php">Back to homepage</a></p>
        <p>"CLASS PAGE - CREATE"</p>
    </section>
<?php require 'includes/footer.php'?>