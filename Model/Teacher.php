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
