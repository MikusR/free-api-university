<?php

namespace App;

class UniversityCollection
{
    /**
     * @var University[]
     */
    private array $collection;

    public function __construct(array $universities = [])
    {
        $this->collection = $universities;
    }

    public function add(University $university): void
    {
        $this->collection[] = $university;
    }

    public function list():array
    {
        return $this->collection;
    }
}