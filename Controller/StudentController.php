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

        if(isset($_GET['page']) && $_GET['page'] === 'student') {
            $getStudents = $studentLoader->getStudents($pdo);
            $students = $studentLoader->createStudents($getStudents);
            require 'View/student.php';
        }

        if(isset($_GET['StudentIdDetail'])){
            $studentDetail = $studentLoader->getStudentDetails($pdo);
            require 'View/student-detail.php';
        }

        if(isset($_GET['student-create'])){
            if (!empty($_POST)){
                $handle = $pdo->prepare('INSERT INTO student (`name`, `email`, classID) VALUES (:name, :email, :class)');
                $handle->bindValue(':name', $_POST['name']);
                $handle->bindValue(':email', $_POST['email']);
                $handle->bindValue(':class', (int)$_POST['classID']);
                $handle->execute();
            }
            $getClasses = $classLoader->getClasses($pdo);
            $classes = $classLoader->createClasses($getClasses);
            require 'View/student-create.php';
        }



        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.




    }
}

