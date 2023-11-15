<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    public function index()
    {
        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');

        $collapse  = 'master-loker';
        $position  = DB::table('job_vacancies')
            ->join('batch_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('batch_vacancies.status', '1')
            ->where('batch_vacancies.start_date', '<=', $date_now)
            ->where('batch_vacancies.end_date', '>=', $date_now)->get();

        $placement = DB::table('placement')->get();
        return view('frontend.index', compact('collapse', ['position', 'placement']));
    }

    public function about()
    {
        return view('frontend.about');
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $location = $request->location;

        $placement = DB::table('placement')->get();

        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');
        $data = [
            'keyword' => $keyword,
            'location' => $location
        ];
        $query = DB::table('batch_vacancies')
            ->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('batch_vacancies.status', '1')
            ->where('batch_vacancies.start_date', '<=', $date_now)
            ->where('batch_vacancies.end_date', '>=', $date_now);
        if (!is_null($keyword)) {
            $query->where('job_vacancies.position', 'like', '%' . $keyword . '%');
        }
        if (!is_null($location)) {
            $query->where('batch_vacancies.city', 'like', '%' . $location . '%');
        }
        // $query->where('batch_vacancies.end_date', '>=', Carbon::now()->subMonth(1));
        $query->where('batch_vacancies.status', '1');
        $result = $query->get();

        return view('frontend.page-search', compact('result', 'data', 'placement'));
    }


    public function detail($id)
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


        if ($query) {
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
                dd('Tidak dapat menampilkan Halaman');
            }
        } else {
            $data = [
                'message' => 'Lowongan belum tersedia',
            ];
            return view('frontend.empty', compact('data'));
        }
    }
}
