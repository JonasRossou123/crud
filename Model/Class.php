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
}
