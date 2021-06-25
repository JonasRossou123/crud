<?php require 'includes/header.php' ?>
<!--input fields are empty except for the dropdown list--><section>
    <p>add a new student</p>
    <div id="wrapcreate">
        <form method="post">
            <label for="className">Name:</label>
            <input type="text" name="name" id="name" required value=""/>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required value=""/>

            <label for="classID">Class:</label>
            <select name="classID" id="classID">
                <?php foreach ($classes as $class): ?>
                    <option
                            value=<?php echo $class->getKlasID()  ?>>
                        <?php echo htmlspecialchars($class->getName()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <!--the information will be send via the post-method creating a new entity-->
            <input class="btn btn-warning btncss ml-3 mb-2" name="create" id="create" type="submit" value="Create">
        </form>
    </div>

    <p><a href="index.php">Back to homepage</a></p>
    <p>"STUDENT PAGE - CREATE"</p>
</section>
<?php require 'includes/footer.php'?>
