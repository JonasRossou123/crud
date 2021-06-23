<?php require 'includes/header.php' ?>
<section>
    <div><?php echo $studentDetail->getStudentID() ?></div>
    <div><?php echo $studentDetail->getName() ?></div>
    <div><?php echo $studentDetail->getEmail() ?></div>
    <div><?php echo $studentDetail->getKlas() ?></div>
    <div><?php echo $studentDetail->getLocation() ?></div>
    <div><?php echo $studentDetail->getTeacher()?></div>

    <p><a href="index.php">Back to homepage</a></p>
    <p>"STUDENT PAGE - DETAIL"</p>
</section>
<?php require 'includes/footer.php'?>

