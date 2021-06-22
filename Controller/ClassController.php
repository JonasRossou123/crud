<?php
declare(strict_types = 1);

class ClassController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        $handle = $pdo->prepare('SELECT classID, name FROM class');
        $handle->execute();
        $classes = $handle->fetchAll();
        var_dump($classes);
        var_dump($_GET);

        //this is just example code, you can remove the line below
        $user = new User('John Smith');

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/class.php';
    }
}
