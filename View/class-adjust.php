<?php require 'includes/header.php' ?>
<!--prefilled input fields and a dropdown list to adjust the information of the selected student-->
<section>
    <p>Change entries for this class</p>
    <div id="wrapcreate">
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required value="<?php echo $classDetail->getClassName()?>"/>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required value="<?php echo $classDetail->getLocation() ?>"/>

            <label for="teacherID">Class:</label>
            <select name="teacherID" id="teacherID">
                <?php foreach ($teachers as $teacher): ?>
                <!--make sure that the selected class gets the wright pre-selection-->
                    <option <?php echo ($classDetail->getTeacherName() == $teacher->getName() ? 'selected' : ''); ?>
                        value=<?php echo $teacher->getTeacherId()  ?>>
                        <?php echo htmlspecialchars($teacher->getName()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="page" value="class" />
            <input class="btn btn-warning btncss ml-3 mb-2" type="submit" name="update" id="update" value="Update">
        </form>
    </div>
    <p><a href="index.php">Back to homepage</a></p>
    <p>"CLASS PAGE - ADJUST"</p>
</section>
<?php require 'includes/footer.php'?>
