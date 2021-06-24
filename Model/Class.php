<?php
declare(strict_types=1);

class Klas
{
    private int $klasID;
    private string $name;
    private string $location;
    private int $teacherID;

    public function __construct(int $klasID, string $name, string $location, int $teacherID)
    {
        $this->klasID = $klasID;
        $this->name = $name;
        $this->location = $location;
        $this->teacherID = $teacherID;
    }

    /**
     * @return int
     */
    public function getKlasID(): int
    {
        return $this->klasID;
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
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getTeacherID(): int
    {
        return $this->teacherID;
    }}

class Classdetail{
    private int $classID;
    private string $className;
    private string $location;
    private string $teacherName;

    /**
     * Classdetail constructor.
     * @param int $classID
     * @param string $className
     * @param string $location
     * @param string $teacherName
     */
    public function __construct(int $classID, string $className, string $location, string $teacherName)
    {
        $this->classID = $classID;
        $this->className = $className;
        $this->location = $location;
        $this->teacherName = $teacherName;
    }

    /**
     * @return int
     */
    public function getClassID(): int
    {
        return $this->classID;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
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
    public function getTeacherName(): string
    {
        return $this->teacherName;
    }
}

class classLoader{
    public function getClasses($pdo){
        $handle = $pdo->prepare('SELECT * FROM class');
        $handle->execute();
        $classes = $handle->fetchAll();
        return $classes;
    }

    public function createClasses($getClasses) {
        $result = [];
        foreach ($getClasses as $class) {
            $classObj = new Klas((int)$class['classID'] ,(string)$class['name'], (string)$class['location'], (int)$class['teacherID']);
            $result[] = $classObj;
        }
        return $result;
    }

    public function classCreator($pdo){
        $handle = $pdo->prepare('INSERT INTO class (`name`, `location`, teacherID) VALUES (:name, :location, :teacherid)');
        $handle->bindValue(':name', $_POST['name']);
        $handle->bindValue(':location', $_POST['location']);
        $handle->bindValue(':teacherid', $_POST['teacherID']);
        $handle->execute();
    }

    public function deleteClass($pdo){
        $handle = $pdo->prepare('DELETE FROM class WHERE classID = :id;');
        $handle->bindValue(':id', $_POST['id']);
        $handle->execute();
        }

    public function getClassDetails($pdo){
        $handle = $pdo->prepare('select c.classID as classID, c.name as className, c.location as location, t.name as teacherName from class c left join teacher t on c.teacherID = t.teacherID where classID = :id');
        $handle->bindValue(':id', $_GET['ClassIdDetail']);
        $handle->execute();
        $classDetail = $handle->fetch();
        $classObj = new classDetail((int)$classDetail['classID'],(string)$classDetail['className'],(string)$classDetail['location'],(string)$classDetail['teacherName']);
        return $classObj;
    }

    public function preFillClass($pdo){
        $handle = $pdo->prepare('select c.classID as classID, c.name as className, c.location as location, t.name as teacherName from class c left join teacher t on c.teacherID = t.teacherID where classID = :id');
        $handle->bindValue(':id', $_GET['ClassIdUpdate']);
        $handle->execute();
        $classDetail = $handle->fetch();
        $classObj = new classDetail((int)$classDetail['classID'],(string)$classDetail['className'],(string)$classDetail['location'],(string)$classDetail['teacherName']);
        return $classObj;
        }

    public function updateClass($pdo){
        $handle = $pdo->prepare('UPDATE class SET name = :name, location = :location, teacherID = :teacherID WHERE classID = :classid;');
        $handle->bindValue(':classid', $_GET['ClassIdUpdate']);
        $handle->bindValue(':name', $_POST['name']);
        $handle->bindValue(':location', $_POST['location']);
        $handle->bindValue(':teacherID', $_POST['teacherID']);
        $handle->execute();
        }
    }


