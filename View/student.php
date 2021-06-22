<?php require 'includes/header.php'?>
<section>
    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="40%">Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($students AS $student):?>
            <tr>
                <td><?php echo htmlspecialchars($student->getName())?></td>
                <td>
                    <a href="?id=<?php echo $student->getStudentID()?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $student->getName()?>" />
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

    <p><a href="index.php">Back to homepage</a></p>

    <p>"Dit is de page student"</p>
</section>
<?php require 'includes/footer.php'?>



