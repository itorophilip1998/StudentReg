<?php

namespace App\Imports;
 
use App\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProjectsImport implements ToModel, WithHeadingRow
{
   protected $data;
   public function __construct($data) {
         $this->data=$data;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {  
        $data=$row['courses_grades'];
        dd( $data[0]);
         return new Result([
            'regNo'=> $row['reg_no'],
            'name'=> $row['name'],
            'courses_grades'=> $row['courses_grades'],
            'department'=> $row['department'],
            'school' => $row['school'],
            'gpa' => $row['gpa'],
            'cgpa'=> $row['cgpa'],
            'creadit_point'=> $row['creadit_point'],
            'creadit_unit'=> $row['creadit_unit'],
            'session'=> $row['session'],
            'semester'=> $row['semester'],
            'program' => $row['program'] 
        ]);
    }
}