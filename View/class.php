<?php require 'includes/header.php'?>
<!--display basic info of all classes-->
<!--buttons for delete, update, details, create an entity-->
<section>
    <br>
    <br>
    <table class="table table-striped table-wide" id="tablestudents">
        <thead>
        <tr>
            <th colspan="4">Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($classes as $class):?>
            <tr>
                <td class="col-sm-9"><?php echo htmlspecialchars($class->getName())?></td>
                <td class="col-sm-1">
                    <a href="?ClassIdDetail=<?php echo $class->getKlasID()?>" class="btn btn-info btncss">Details</a>
                </td>
                <td class="col-sm-1">
                    <a href="?ClassIdUpdate=<?php echo $class->getKlasID()?>" class="btn btn-success btncss">Update</a>
                </td>
                <td class="col-sm-1">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $class->getKlasID()?>" />
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger btncss">
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <br>
    <button type="button" class="btn btn-warning btncss" id="createbutton" onclick="window.location.href='index.php?class-create';">
        Create new
    </button>
    <br>
    <p><a href="index.php">Back to homepage</a></p>
    <p>"CLASS PAGE"</p>

</section>

<?php require 'includes/footer.php'?>
