<?php
declare(strict_types = 1);

class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        function getStudents($pdo){
            $handle = $pdo->prepare('SELECT * FROM student');
            $handle->execute();
            $students = $handle->fetchAll();
            return $students;
        }

        function createStudents($pdo) {
            $students = getStudents($pdo);
            $result = [];
            foreach ($students as $student) {
                $studentObj = new Student((int)$student['studentID'] ,(string)$student['name'], (string)$student['email'], (int)$student['classID']);
                $result[] = $studentObj;
            }
            return $result;
        }

        $students = createStudents($pdo);


            //this is just example code, you can remove the line below
        $user = new User('John Smith');

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/student.php';
    }
}