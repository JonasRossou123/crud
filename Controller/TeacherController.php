<?php
declare(strict_types = 1);

class TeacherController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        $teacherLoader = new TeacherLoader($pdo);
        //$classLoader = new classLoader($pdo);

        if(isset($_GET['page']) && $_GET['page'] === 'teacher') {
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            //if (!empty($_POST)){
                //$teacherLoader -> deleteStudent($pdo);
            //}
            require 'View/teacher.php';
        }

        if(isset($_GET['TeacherIdDetail'])){
            $getTeachersStudents = $teacherLoader->getTeachersStudents($pdo);
            $teachersStudents = $teacherLoader->createTeachersStudents($getTeachersStudents);
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            require 'View/teacher-detail.php';
        }
    }
}