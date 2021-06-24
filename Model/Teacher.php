<?php
declare(strict_types=1);

class Teacher
{
    private int $teacherID;
    private string $name;
    private string $email;
    
    public function __construct(int $teacherID, string $name, string $email)
    {
        $this->teacherID = $teacherID;
        $this->name = $name;
        $this->email = $email;
    }
    
    public function getTeacherId()
    {
        return $this->teacherID;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
}

class TeachersStudents{
    private string $teachersStudents;

    /**
     * TeachersStudents constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

class TeacherLoader{

    public function getTeachers($pdo){
        $handle = $pdo->prepare('SELECT * FROM teacher');
        $handle->execute();
        $teachers = $handle->fetchAll();
        return $teachers;
    }

    public function createTeachers($getTeachers) {
        $result = [];
        foreach ($getTeachers as $teacher) {
            $teacherObj = new Teacher((int)$teacher['teacherID'] ,(string)$teacher['name'], (string)$teacher['email']);
            $result[] = $teacherObj;
        }
        return $result;
    }

    public function getTeachersStudents($pdo){
        $handle = $pdo->prepare('select s.name as studentName from student s left join class c on s.classID = c.classID left join teacher t on c.teacherID = t.teacherID where t.teacherID =:id;');
        $handle->bindValue(':id', $_GET['TeacherIdDetail']);
        $handle->execute();
        $teachersstudents = $handle->fetchAll();
        return $teachersstudents;
    }

    public function createTeachersStudents($getTeachersStudents){
        $result = [];
        foreach ($getTeachersStudents as $teachstud){
            $teachstudObj = new TeachersStudents((string)$teachstud['studentName']);
            $result[] = $teachstudObj;
        }
        return $result;
    }

    public function magic($teachers){
        function findTeacher($teacher){
            if (isset($_GET['TeacherIdDetail'])){
                if ((int)$_GET['TeacherIdDetail'] === $teacher->getTeacherId()){return $teacher->getTeacherId();}}
            if (isset($_GET['TeacherIdUpdate'])){
                if ((int)$_GET['TeacherIdUpdate'] === $teacher->getTeacherId()){return $teacher->getTeacherId();}}
            }
        $teacher = array_filter($teachers, 'findTeacher');
        $teacher = reset($teacher);
        return $teacher;
    }

    public function teacherCreator($pdo){
        $handle = $pdo->prepare('INSERT INTO teacher (`name`, `email`) VALUES (:name, :email)');
        $handle->bindValue(':name', $_POST['name']);
        $handle->bindValue(':email', $_POST['email']);
        $handle->execute();
    }

    public function updateTeacher($pdo){
        $handle = $pdo->prepare('UPDATE teacher SET name = :name, email= :email WHERE teacherID = :teacherid;');
        $handle->bindValue(':teacherid', $_GET['TeacherIdUpdate']);
        $handle->bindValue(':name', $_POST['name']);
        $handle->bindValue(':email', $_POST['email']);
        $handle->execute();
    }

    public function deleteTeacher($pdo){
        $handle = $pdo->prepare('DELETE FROM teacher WHERE teacherID = :id;');
        $handle->bindValue(':id', $_POST['id']);
        $handle->execute();
    }


}





