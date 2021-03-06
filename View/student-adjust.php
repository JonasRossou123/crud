<?php require 'includes/header.php' ?>
<!--prefilled input fields and a dropdown list to adjust the information of the selected student-->
<section>
    <p>Change entries for this student</p>
    <div id="wrapcreate">
        <form method="post">
            <label for="className">Name:</label>
            <input type="text" name="name" id="name" required value="<?php echo $studentDetail->getName()?>"/>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required value="<?php echo $studentDetail->getEmail() ?>"/>

            <label for="classID">Class:</label>
            <select name="classID" id="classID">
                <?php foreach ($classes as $class): ?>
                    <option <?php echo ($studentDetail -> getKlas() == $class->getName() ? 'selected' : ''); ?>
                        value=<?php echo $class->getKlasID()  ?>>
                        <?php echo htmlspecialchars($class->getName()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="page" value="student" />
            <input class="btn btn-warning btncss ml-3 mb-2" type="submit" name="update" id="update" value="Update">
        </form>
    </div>

    <p><a href="index.php">Back to homepage</a></p>
    <p>"STUDENT PAGE - ADJUST"</p>
</section>
<?php require 'includes/footer.php'?>
