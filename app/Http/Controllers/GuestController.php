<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function index($id)
    {
        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');

        $query = DB::table('job_vacancies')
            ->join('landing_pages', 'job_vacancies.vacancy_id', 'landing_pages.vacancy_id')
            ->join('batch_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('job_vacancies.segment', $id)
            ->where('batch_vacancies.start_date', '<=', $date_now)
            ->where('batch_vacancies.end_date', '>=', $date_now)
            ->orderBy('batch_vacancies.batch_id', 'DESC')
            ->first();

        $end_date = Carbon::parse($query->end_date)->format('d F Y');

        $search = ["[[position]]", "[[end_date]]", '\n'];
        $replaceUpper = [strtoupper($query->position), $end_date, '<br/>'];
        $replace = [$query->position, $end_date];

        $section_1 = str_replace($search, $replaceUpper, $query->section_1);
        $section_2 = str_replace($search, $replace, $query->section_2);
        $section_3 = str_replace($search, $replace, $query->section_3);
        $section_4 = str_replace($search, $replace, $query->section_4);
        $section_5 = str_replace($search, $replace, $query->section_5);
        $section_6 = str_replace($search, $replace, $query->section_6);

        $data = [
            'data' => $query,
            'section_1' => $section_1,
            'section_2' => $section_2,
            'section_3' => $section_3,
            'section_4' => $section_4,
            'section_5' => $section_5,
            'section_6' => $section_6,
        ];



        if ($data) {
            return view('guest.index', $data);
        } else {
            dd('Lowongan belum tersedia');
        }
    }

    public function st1($id)
    {
        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');

        $vacancy = DB::table('job_vacancies')
            ->where('segment', $id)
            ->first();

        $batch = DB::table('job_vacancies')
            ->join('batch_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('job_vacancies.segment', $id)
            ->where('batch_vacancies.start_date', '<=', $date_now)
            ->where('batch_vacancies.end_date', '>=', $date_now)
            ->orderBy('batch_vacancies.batch_id', 'DESC')
            ->first();

        if ($vacancy) {
            if ($batch) {
                return view('guest.st1', ['vacancy' => $vacancy, 'batch' => $batch]);
            } else {
                dd('Batch tidak ditemukan');
            }
        } else {
            dd('Halaman tidak ditemukan');
        }
    }


    public function storeST1(Request $request)
    {
        DB::table('candidates')->insert([
            'vacancy_id' => $request->vacancy_id,
            'batch_id' => $request->batch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'education' => $request->education,
            'university' => $request->university,
            'major' => $request->major,
            'graduation_year' => $request->graduation_year,
            'job_status' => $request->job_status,
            'referral' => $request->referral,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        alert()->success('Done', 'Added');
        return redirect()->route('loker.thankyou');
    }

    public function st2($id)
    {

        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');


        $question = DB::table('question_st2')->get();
        $answer = DB::table('question_st2_answers')->get();

        $vacancy = DB::table('job_vacancies')
            ->where('segment', $id)
            ->first();

        $batch = DB::table('job_vacancies')
            ->join('batch_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('job_vacancies.segment', $id)
            ->where('batch_vacancies.start_date', '<=', $date_now)
            ->where('batch_vacancies.end_date', '>=', $date_now)
            ->orderBy('batch_vacancies.batch_id', 'DESC')
            ->first();

        if ($vacancy) {
            if ($batch) {
                return view('guest.st2', ['vacancy' => $vacancy, 'batch' => $batch, 'question' => $question, 'answer' => $answer]);
            } else {
                dd('Batch tidak ditemukan');
            }
        } else {
            dd('Halaman tidak ditemukan');
        }
    }

    public function storeSt2(Request $request)
    {
        $data = array();
        $answers = $request->answer;
        $total_point = 0;
        foreach ($answers as $index => $answer) {
            $data['question' . $index + 1] = $answer;
            $point = DB::table('question_st2_answers')->select('point')->where('answer', $answer)->first();

            if ($point) {
                $total_point = $total_point + $point->point;
            }
        }

        $jsonData = json_encode($data);

        DB::table('answer_st2')->insert([
            'vacancy_id' => $request->vacancy_id,
            'batch_id' => $request->batch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'answer' => $jsonData,
            'point' => $total_point,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        alert()->success('Done', 'Added');
        return redirect()->route('loker.thankyou');
    }

    public function task($id)
    {

        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');

        $vacancy = DB::table('job_vacancies')
            ->where('segment', $id)
            ->first();

        $batch = DB::table('job_vacancies')
            ->join('batch_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('job_vacancies.segment', $id)
            ->where('batch_vacancies.start_date', '<=', $date_now)
            ->where('batch_vacancies.end_date', '>=', $date_now)
            ->orderBy('batch_vacancies.batch_id', 'DESC')
            ->first();

        if ($vacancy) {
            if ($batch) {
                return view('guest.task', ['vacancy' => $vacancy, 'batch' => $batch]);
            } else {
                dd('Batch tidak ditemukan');
            }
        } else {
            dd('Halaman tidak ditemukan');
        }
    }

    public function storeTask(Request $request)
    {
        DB::table('answer_task')->insert([
            'vacancy_id' => $request->vacancy_id,
            'batch_id' => $request->batch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'link' => $request->link,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        alert()->success('Done', 'Added');
        return redirect()->route('loker.thankyou');
    }


    public function sta($id)
    {

        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');

        $question = DB::table('question_sta')->get();

        $vacancy = DB::table('job_vacancies')
            ->where('segment', $id)
            ->first();

        $batch = DB::table('job_vacancies')
            ->join('batch_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('job_vacancies.segment', $id)
            ->where('batch_vacancies.start_date', '<=', $date_now)
            ->where('batch_vacancies.end_date', '>=', $date_now)
            ->orderBy('batch_vacancies.batch_id', 'DESC')
            ->first();

        if ($vacancy) {
            if ($batch) {
                return view('guest.sta', ['vacancy' => $vacancy, 'batch' => $batch, 'question' => $question]);
            } else {
                dd('Batch tidak ditemukan');
            }
        } else {
            dd('Halaman tidak ditemukan');
        }
    }

    public function storeSta(Request $request)
    {
        $data = array();
        $answers = $request->answer;
        foreach ($answers as $index => $answer) {
            $data['question' . $index + 1] = $answer;
        }
        $jsonData = json_encode($data);

        DB::table('answer_sta')->insert([
            'vacancy_id' => $request->vacancy_id,
            'batch_id' => $request->batch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'answer' => $jsonData,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        alert()->success('Done', 'Added');
        return redirect()->route('loker.thankyou');
    }


    public function thankyou()
    {
        return view('guest.thankyou');
    }
}
