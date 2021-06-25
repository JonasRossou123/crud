<?php
declare(strict_types = 1);

class TeacherController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = Connection::Open();

        $teacherLoader = new TeacherLoader($pdo);

        //main page of teacher
        if(isset($_GET['page']) && $_GET['page'] === 'teacher') {
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            if (!empty($_POST)){
                $teacherLoader -> deleteTeacher($pdo);
            }
            require 'View/teacher.php';
        }

        //loading functions for detail of teacher
        if(isset($_GET['TeacherIdDetail'])){
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            //in this case I used an extra function to go to the selected Teacher (instead of an extra query)
            $teacherDetail = $teacherLoader->getSelectedTeacher($teachers);

            $getTeachersStudents = $teacherLoader->getTeachersStudents($pdo);
            $teachersStudents = $teacherLoader->createTeachersStudents($getTeachersStudents);

            require 'View/teacher-detail.php';
        }

        //loading teacher-create page once the teacher-create button is pushed
        if(isset($_GET['teacher-create'])) {
            if (!empty($_POST)) {
                $teacherLoader->teacherCreator($pdo);
            }
            require 'View/teacher-create.php';
        }

        //refreshing main page after update
        if(isset($_POST['page']) && $_POST['page'] === 'teacher') {
            $teacherLoader -> updateTeacher($pdo);
            $_GET = [];
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            require 'View/teacher.php';
        }

        //routing to teacher-adjust with the needed functions
        if(isset($_GET['TeacherIdUpdate'])) {
            $getTeachers = $teacherLoader->getTeachers($pdo);
            $teachers = $teacherLoader->createTeachers($getTeachers);
            $teacherDetail = $teacherLoader->getSelectedTeacher($teachers);
            require 'View/teacher-adjust.php';
        }



    }

}