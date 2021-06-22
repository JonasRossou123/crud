<?php
declare(strict_types = 1);

class TeacherController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        function getTeachers($pdo){
            $handle = $pdo->prepare('SELECT * FROM teacher');
            $handle->execute();
            $teachers = $handle->fetchAll();
            return $teachers;
        }

        function createTeachers($pdo) {
            $teachers = getTeachers($pdo);
            $result = [];
            foreach ($teachers as $teacher) {
                $teacherObj = new Teacher((int)$teacher['teacherID'] ,(string)$teacher['name'], (string)$teacher['email']);
                $result[] = $teacherObj;
            }
            return $result;
        }

        $teachers = createTeachers($pdo);

        //this is just example code, you can remove the line below
        $user = new User('John Smith');

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/teacher.php';
    }
}