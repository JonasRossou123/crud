<?php
declare(strict_types = 1);

class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        $studentLoader = new StudentLoader($pdo);
        $classLoader = new classLoader($pdo);

        //main page of student will return basic info
        if(isset($_GET['page']) && $_GET['page'] === 'student') {
            $getStudents = $studentLoader->getStudents($pdo);
            $students = $studentLoader->createStudents($getStudents);
            if (!empty($_POST)){
                $studentLoader -> deleteStudent($pdo);
            }
            require 'View/student.php';
        }

        //detail page of student will return all details of student
        if(isset($_GET['StudentIdDetail'])){
            $studentDetail = $studentLoader->getStudentDetails($pdo);
            require 'View/student-detail.php';
        }

        //needed in more then one case but could also be in an if(isset)
        $getClasses = $classLoader->getClasses($pdo);
        $classes = $classLoader->createClasses($getClasses);

        //loader student-create page
        if(isset($_GET['student-create'])) {
            if (!empty($_POST)) {
                $studentLoader->studentCreator($pdo);
            }
            require 'View/student-create.php';
        }

        //refresh after an update
        if(isset($_POST['page']) && $_POST['page'] === 'student') {
            $studentLoader -> updateStudent($pdo);
            $_GET = [];
            $getStudents = $studentLoader->getStudents($pdo);
            $students = $studentLoader->createStudents($getStudents);
            require 'View/student.php';
        }

        //prefill info of student
        if(isset($_GET['StudentIdUpdate'])){
            $studentDetail = $studentLoader->preFillStudent($pdo);
            require 'View/student-adjust.php';
        }






        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.




    }
}

