<?php require 'includes/header.php' ?>
<!--display all information of the selected class coming from classDetail-->
<section>
    <br>
    <table class="table table-striped table-wide" id="tablestudentdetail">
        <tr>
            <td class="col-sm-4">
                ID
            </td>
            <td class="col-sm-8">
                <?php echo $classDetail->getClassID() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Name
            </td>
            <td class="col-sm-8">
                <?php echo $classDetail->getClassName() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Location
            </td>
            <td class="col-sm-8">
                <?php echo $classDetail->getLocation() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Teacher
            </td>
            <td class="col-sm-8">
                <?php echo $classDetail->getTeacherName() ?>
            </td>
        </tr>
    </table>
    <br>
    <p><a href="index.php">Back to homepage</a></p>
    <p>"CLASS PAGE - DETAIL"</p>
</section>
<?php require 'includes/footer.php'?>

