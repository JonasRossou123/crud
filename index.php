<?php
declare(strict_types=1);

//include all your model files here
require 'Model/User.php';
require 'Model/Class.php';
require 'Model/Student.php';
require 'Model/Teacher.php';
require 'Model/pdo.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ClassController.php';
require 'Controller/StudentController.php';
require 'Controller/TeacherController.php';
require 'Controller/InfoController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $controller = new InfoController();
}
if(isset($_GET['page']) && $_GET['page'] === 'class') {
    $controller = new ClassController();
}
if(isset($_GET['page']) && $_GET['page'] === 'student') {
    $controller = new StudentController();
}
if(isset($_GET['page']) && $_GET['page'] === 'teacher') {
    $controller = new TeacherController();
}

$controller->render($_GET, $_POST);