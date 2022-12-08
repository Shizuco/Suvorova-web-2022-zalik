<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'fio',
        'group',
        'course'
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return Student::class;
    }
}