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
     * @param string $teachersStudents
     */
    public function __construct(string $teachersStudents)
    {
        $this->teachersStudents = $teachersStudents;
    }

    /**
     * @return string
     */
    public function getTeachersStudents(): string
    {
        return $this->teachersStudents;
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

}





