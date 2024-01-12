<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class KandidatExport implements FromQuery, WithHeadings
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return DB::table('candidates')
        ->select(
            'candidates.name',
            'candidates.phone',
            'candidates.email',
            'candidates.gender',
            'candidates.birthdate',
            'candidates.education',
            'candidates.university',
            'candidates.major',
            'candidates.graduation_year',
            'candidates.job_status',
            'candidates.referral',
            'candidates.status'
        )
        ->leftJoin('users', 'candidates.email', '=', 'users.email')
        ->leftJoin('users_profile', 'users.id', '=', 'users_profile.user_id')
        ->where('candidates.batch_id',  $this->id)
        ->orderBy('candidates.candidates_id', 'asc')
        ->from('candidates');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Email',
            'Gender',
            'Birthdate',
            'education',
            'university',
            'major',
            'graduation_year',
            'job_status',
            'referral',
            'status',
        ];
    }
}