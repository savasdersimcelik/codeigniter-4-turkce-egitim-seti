<?php


namespace App\Libraries;


class Human
{
    protected $name;
    protected $surname;

    public function __construct(string $surname)
    {
        $this->surname = $surname;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurName(): string
    {
        return $this->surname;
    }

    public function getName(): string
    {
        return  $this->name;
    }

    public function getFullName(): string
    {
        return sprintf("%s %s", $this->name, $this->surname);
    }

}