<?php require 'includes/header.php' ?>

<section>
    <p>Change entries for this teacher</p>
    <div id="wrapcreate">
        <form method="post">
            <label for="className">Name:</label>
            <input type="text" name="name" id="name" required value="<?php echo $teacherDetail->getName()?>"/>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required value="<?php echo $teacherDetail->getEmail() ?>"/>

            <input type="hidden" name="page" value="teacher" />
            <input class="btn btn-warning btncss ml-3 mb-2" type="submit" name="update" id="update" value="Update">
        </form>
    </div>

    <p><a href="index.php">Back to homepage</a></p>
    <p>"TEACHER PAGE - ADJUST"</p>
</section>
<?php require 'includes/footer.php'?>
