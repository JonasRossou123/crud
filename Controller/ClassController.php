<?php
declare(strict_types = 1);

class ClassController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        //you also need the the teacherLoader as each class needs at least one teacher
        $classLoader = new classLoader($pdo);
        $teacherLoader = new TeacherLoader($pdo);

        //main page of class
        if(isset($_GET['page']) && $_GET['page'] === 'class') {
            $getClasses = $classLoader->getClasses($pdo);
            $classes = $classLoader->createClasses($getClasses);
            if (!empty($_POST)){
                $classLoader -> deleteClass($pdo);
            }
            require 'View/class.php';
        }

        //run the function getClassDetails when you go to page ClassIdDetail
        if(isset($_GET['ClassIdDetail'])){
            $classDetail = $classLoader->getClassDetails($pdo);
            require 'View/class-detail.php';
        }

        //teachers needs to be loaded to prefill the dropdown (users are limited to the selection of teachers, displayed with their name)
        if(isset($_GET['class-create'])) {
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            //once the submit button is pushed it will create an actual entity in the database using the $_POST info
            if (!empty($_POST)) {
                $classLoader->classCreator($pdo);
            }
            require 'View/class-create.php';
        }

        //needed to 'refresh' the main class page once the updatebutton is pushed
        if(isset($_POST['page']) && $_POST['page'] === 'class') {
            $classLoader -> updateClass($pdo);
            $_GET = [];
            $getClasses = $classLoader->getClasses($pdo);
            $classes = $classLoader->createClasses($getClasses);
            require 'View/class.php';
        }

        //prefill the input fields when you want to update class information
        if(isset($_GET['ClassIdUpdate'])){
            $classDetail = $classLoader->preFillClass($pdo);
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            require 'View/class-adjust.php';
        }


    }
}
