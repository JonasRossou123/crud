<?php
declare(strict_types = 1);

class ClassController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        $classLoader = new classLoader($pdo);
        $teacherLoader = new TeacherLoader($pdo);

        if(isset($_GET['page']) && $_GET['page'] === 'class') {
            $getClasses = $classLoader->getClasses($pdo);
            $classes = $classLoader->createClasses($getClasses);
            if (!empty($_POST)){
                $classLoader -> deleteClass($pdo);
            }
            require 'View/class.php';
        }

        if(isset($_GET['ClassIdDetail'])){
            $classDetail = $classLoader->getClassDetails($pdo);
            require 'View/class-detail.php';
        }

        if(isset($_GET['class-create'])) {
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            if (!empty($_POST)) {
                $classLoader->classCreator($pdo);
            }
            require 'View/class-create.php';
        }

        if(isset($_POST['page']) && $_POST['page'] === 'class') {
            $classLoader -> updateClass($pdo);
            $_GET = [];
            $getClasses = $classLoader->getClasses($pdo);
            $classes = $classLoader->createClasses($getClasses);
            require 'View/class.php';
        }

        if(isset($_GET['ClassIdUpdate'])){
            $classDetail = $classLoader->preFillClass($pdo);
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            require 'View/class-adjust.php';
        }


    }
}
