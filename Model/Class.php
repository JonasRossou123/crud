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
    }



}
