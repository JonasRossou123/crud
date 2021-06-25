<?php require 'includes/header.php' ?>
<!--display all information of the selected student coming from studentDetail-->
<section>
    <br>
    <table class="table table-striped table-wide" id="tablestudentdetail">
        <tr>
            <td class="col-sm-4">
                ID
            </td>
            <td class="col-sm-8">
                <?php echo $studentDetail->getStudentID() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Name
            </td>
            <td class="col-sm-8">
                <?php echo $studentDetail->getName() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Email
            </td>
            <td class="col-sm-8">
                <?php echo $studentDetail->getEmail() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Class
            </td>
            <td class="col-sm-8">
                <?php echo $studentDetail->getKlas() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Location
            </td>
            <td class="col-sm-8">
                <?php echo $studentDetail->getLocation() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Teacher
            </td>
            <td class="col-sm-8">
                <?php echo $studentDetail->getTeacher()?>
            </td>
        </tr>
    </table>
    <br>
    <p><a href="index.php">Back to homepage</a></p>
    <p>"STUDENT PAGE - DETAIL"</p>
</section>
<?php require 'includes/footer.php'?>

