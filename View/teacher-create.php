<?php require 'includes/header.php' ?>
    <section>
        <p>add a new teacher</p>
        <div id="wrapcreate">
            <form method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required value=""/>

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required value=""/>
                <!--the information will be send via the post-method creating a new entity-->
                <input class="btn btn-warning btncss ml-3 mb-2" name="create" id="create" type="submit" value="Create">
            </form>
        </div>

        <p><a href="index.php">Back to homepage</a></p>
        <p>"TEACHER PAGE - CREATE"</p>
    </section>
<?php require 'includes/footer.php'?>