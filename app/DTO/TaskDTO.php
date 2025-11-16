<?php

namespace App\DTO;

class TaskDTO
{

    public function __construct(public readonly string $title, public readonly string $description)
    {
    }

    public static function fromArray(array $data)
    {
        return new self(title: $data['title'], description: $data['description']);
    }
}
