<?php require 'includes/header.php' ?>
<section>
    <br>
    <table class="table table-striped table-wide" id="tablestudentdetail">
        <tr>
            <td class="col-sm-4">
                ID
            </td>
            <td class="col-sm-8">
                <?php echo $teacherDetail-> getTeacherId() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Name
            </td>
            <td class="col-sm-8">
                <?php echo $teacherDetail->getName() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                Email
            </td>
            <td class="col-sm-8">
                <?php echo $teacherDetail->getEmail() ?>
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                List of students
            </td>
            <td class="col-sm-8">
                <?php foreach ($teachersStudents as $teachersStudent){
                    echo $teachersStudent->getName();
                    echo '<br>';
                }?>
            </td>
        </tr>
    </table>
    <br>
    <p><a href="index.php">Back to homepage</a></p>
    <p>"TEACHER PAGE - DETAIL"</p>
</section>
<?php require 'includes/footer.php'?>