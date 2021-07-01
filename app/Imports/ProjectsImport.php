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
        $data = $this->data;

        // computer science
         $courses_grades[]=[
            'com101'=>$row['com101'],
            'com111'=>$row['com111'],
            'com112'=>$row['com112'],
            'com113'=>$row['com113'],
            'com114'=>$row['com114'],
            'com115'=>$row['com115'],
            'com116'=>$row['com116'],
            'gns101'=>$row['gns101'],
            'otm101'=>$row['otm101'],
            'sta111'=>$row['sta111'],
            'sta112'=>$row['sta112'],
         ];
        //  dd($row);
         return new Result([
            'regNo'=> $row['reg_no'],
            'name'=> $row['name'],
            'courses_grades'=> $courses_grades,
            'department'=> $data['department'],
            'school' => $data['school'],
            'gpa' => $row['gpa'],
            'cgpa'=> $row['cgpa'],
            'credit_point'=> $data['credit_point'],
            'credit_unit'=> $data['credit_unit'],
            'result'=> $row['result'],
            'session'=> $data['session'],
            'semester'=> $data['semester'],
            'program' => $data['program']
        ]);
    }
}
