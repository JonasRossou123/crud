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