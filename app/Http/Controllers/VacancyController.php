<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class VacancyController extends Controller
{
    public function index()
    {
        $collapse  = 'master-loker';
        $date      = Carbon::now()->format('d/m/Y');
        $vacancies = DB::table('job_vacancies')->get();
        $position  = DB::table('job_vacancies')->where('status', 'active')->get();
        $lp        = DB::table('landing_pages')->join('job_vacancies', 'job_vacancies.vacancy_id', 'landing_pages.vacancy_id')->get();
        $batch     = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '>=', Carbon::now()->subMonth(1))->where('batch_vacancies.status', '1')->get();

        return view('master.vacancies.index', compact('vacancies', 'lp', 'batch', 'collapse', 'position', 'date'));
    }
    public function lokerAktif()
    {
        $collapse  = 'loker-aktif';
        $date      = Carbon::now()->format('d/m/Y');
        $vacancies = DB::table('job_vacancies')->get();
        $position  = DB::table('job_vacancies')->where('status', 'active')->get();
        $lp        = DB::table('landing_pages')->join('job_vacancies', 'job_vacancies.vacancy_id', 'landing_pages.vacancy_id')->get();
        $batch     = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '>=', Carbon::now()->subMonth(1))->where('batch_vacancies.status', '1')->get();
        $berakhir  = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '<', Carbon::now()->subMonth(1))->where('batch_vacancies.status', '1')->get();

        return view('selection.loker-aktif.index', compact('vacancies', 'lp', 'batch', 'collapse', 'position', 'date', 'berakhir'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'position' => [
                'required',
                Rule::unique('job_vacancies', 'position'),
            ],
            'status' => 'required',
            'link' => 'required',
        ]);

        $insertedId = DB::table('job_vacancies')->insertGetId([
            'position' => $request->position,
            'status' => $request->status,
            'segment' => $request->link,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->generateLP($insertedId, $request->position);

        alert()->success('Done', $request->position . ' Added');
        return redirect()->route('vacancy.index');
    }

    public function edit($position)
    {
        $position = DB::table('positions')->where('id', $position)->first();
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, $vacancy_id)
    {


        $request->validate([
            'position' => 'required',
            'status' => 'required',
            'link' => 'required',
        ]);

        DB::table('job_vacancies')
            ->where('vacancy_id', $vacancy_id)
            ->update([
                'position' => $request->position,
                'status' => $request->status,
                'segment' => $request->link,
                'updated_at' => now(),
            ]);

        alert()->success('Done', $request->position . ' Updated');
        return redirect()->route('vacancy.index');
    }

    public function destroy(Request $request, $vacancy_id)
    {
        DB::table('job_vacancies')->where('vacancy_id', $vacancy_id)->delete();
        alert()->success('Done', 'Deleted successfully');
        return redirect()->route('vacancy.index');
    }

    public function generateLP($insertedId, $position)
    {
        $section_head = "Kamu Memiliki Passion di Bidang " . $position;
        $section_1 = "BERGABUNGLAH SEBAGAI
[[position]]";
        $section_2 = "Apakah kamu memiliki passion di bidang Public Speaking?

Apakah kamu ingin berkarir dan dimentori langsung oleh Miss Merry Riana?
        
Apakah kamu mau berdampak positif bagi Indonesia melalui pekerjaan kamu?";
        $section_3 = "Apabila kamu ingin bekerja sesuai passion, kamu juga merupakan seseorang yang haus akan belajar, dan ingin berkontribusi lebih di Indonesia dengan pekerjaan kamu, itu artinya kamu harus bergabung dengan MRG (Merry Riana Group) sebagai [[position]].";
        $section_4 = "Sebagai [[position]], kamu bertugas untuk ..... ";
        $section_5 = "1) Full Time
2) Usia Maks. 30 tahun
3) Pendidikan Minimal S1
4) Bersedia bertugas di luar jam kerja (malam, akhir pekan, dsb)
5) Tidak merokok";
        $section_6 = "Kalau ada teman kamu yang mungkin berminat dengan Lowongan Kerja ini, silakan memberitahukan tentang hal ini padanya.

        Terima kasih :)
        Kami akan tunggu data kamu paling lambat tanggal [[end_date]].
        
        PS. Segeralah bergabung di Merry Riana Group sebagai [[position]], dan berikan inspirasi ke jutaan orang di Indonesia.";

        DB::table('landing_pages')->insert([
            'vacancy_id' => $insertedId,
            'section_head' => $section_head,
            'section_1' => $section_1,
            'section_2' => $section_2,
            'section_3' => $section_3,
            'section_4' => $section_4,
            'section_5' => $section_5,
            'section_6' => $section_6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
