<?php
declare(strict_types=1);

class Student
{
    private int $studentID;
    private string $name;
    private string $email;
    private int $klasID; //with clickable link

    public function __construct(int $studentID, string $name, string $email, int $klasID)
    {
        $this->studentID = $studentID;
        $this->name = $name;
        $this->email = $email;
        $this->klasID = $klasID;
    }

    /**
     * @return int
     */
    public function getStudentID(): int
    {
        return $this->studentID;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getKlasID(): int
    {
        return $this->klasID;
    }

}

class StudentDetail{
    private int $studentID;
    private string $name;
    private string $email;
    private string $klas; //with clickable link
    private string $location;
    private string $teacher;

    /**
     * StudentDetail constructor.
     * @param int $studentID
     * @param string $name
     * @param string $email
     * @param string $klas
     * @param string $location
     * @param string $teacher
     */
    public function __construct(int $studentID, string $name, string $email, string $klas, string $location, string $teacher)
    {
        $this->studentID = $studentID;
        $this->name = $name;
        $this->email = $email;
        $this->klas = $klas;
        $this->location = $location;
        $this->teacher = $teacher;
    }

    /**
     * @return int
     */
    public function getStudentID(): int
    {
        return $this->studentID;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getKlas(): string
    {
        return $this->klas;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getTeacher(): string
    {
        return $this->teacher;
    }
}

class StudentLoader{
    public function getStudents($pdo){
        $handle = $pdo->prepare('SELECT * FROM student');
        $handle->execute();
        $students = $handle->fetchAll();
        return $students;
    }

    public function createStudents($getstudents) {
        $result = [];
        foreach ($getstudents as $student) {
            $studentObj = new Student((int)$student['studentID'] ,(string)$student['name'], (string)$student['email'], (int)$student['classID']);
            $result[] = $studentObj;
        }
        return $result;
    }

    public function getStudentDetails($pdo){
        $handle = $pdo->prepare('select s.studentID as studentID, s.name as studentName, s.email as studentEmail, c.name as className, c.location as classLocation,t.name as teacherName 
                                    from student s left join class c on s.classID = c.classID left join teacher t on c.teacherID = t.teacherID where s.studentID =:id;');

        $handle->bindValue(':id', $_GET['StudentIdDetail']);
        $handle->execute();
        $studentdetail = $handle->fetch();
        var_dump($studentdetail);
        $studentObj = new StudentDetail((int)$studentdetail['studentID'],(string)$studentdetail['studentName'],(string)$studentdetail['studentEmail'],(string)$studentdetail['className'],(string)$studentdetail['classLocation'] ,(string)$studentdetail['teacherName']);
        return $studentObj;
    }

    public function studentCreator($pdo){
        $handle = $pdo->prepare('INSERT INTO student (`name`, `email`, classID) VALUES (:name, :email, :class)');
        $handle->bindValue(':name', $_POST['name']);
        $handle->bindValue(':email', $_POST['email']);
        $handle->bindValue(':class', $_POST['classID']);
        $handle->execute();
    }

}