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

class TeacherLoader{

    function getTeachers($pdo){
        $handle = $pdo->prepare('SELECT * FROM teacher');
        $handle->execute();
        $teachers = $handle->fetchAll();
        return $teachers;
    }

    function createTeachers($getTeachers) {
        $result = [];
        foreach ($getTeachers as $teacher) {
            $teacherObj = new Teacher((int)$teacher['teacherID'] ,(string)$teacher['name'], (string)$teacher['email']);
            $result[] = $teacherObj;
        }
        return $result;
    }
  }
