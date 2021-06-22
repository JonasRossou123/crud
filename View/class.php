<?php require 'includes/header.php'?>
<section>
    <table class="table table-striped table-wide">
        <thead>
        <tr>
            <th width="40%">Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($classes AS $class):?>
            <tr>
                <td><?php echo htmlspecialchars($class['name'])?></td>
                <td>
                    <a href="?id=<?php echo $class['classID']?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $class['name']?>" />
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

    <section>
        <h4>Class page</h4>

        <p><a href="index.php">Back to homepage</a></p>

        <p>"Dit is de klasse page"</p>
    </section>


<?php require 'includes/footer.php'?>
