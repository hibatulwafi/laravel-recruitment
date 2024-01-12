<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SeleksiController extends Controller
{
    public function st1()
    {
        $collapse  = 'st1';
        $date      = Carbon::now()->format('d/m/Y');
        $vacancies = DB::table('job_vacancies')->get();
        $position  = DB::table('job_vacancies')->where('status', 'active')->get();
        $lp        = DB::table('landing_pages')->join('job_vacancies', 'job_vacancies.vacancy_id', 'landing_pages.vacancy_id')->get();
        $batch     = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '>=', Carbon::now()->subMonth(1))->get();
        $berakhir  = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '<', Carbon::now()->subMonth(1))->get();
        return view('selection.st1.index', compact('vacancies', 'lp', 'batch', 'collapse', 'position', 'date', 'berakhir'));
    }

    public function st1Detail($id)
    {
        $data = DB::table('candidates')
            ->select('users_profile.*', 'candidates.*')
            ->leftJoin('users', 'candidates.email', '=', 'users.email')
            ->leftJoin('users_profile', 'users.id', '=', 'users_profile.user_id')
            ->where('candidates.batch_id', $id)
            ->get();
        $question = DB::table('question_st2')->get();
        $segment = $id;

        return view('selection.st1.detail', compact(['data', 'question', 'segment']));
    }
    public function st1Good(Request $request)
    {
        if ($request->has('candidates_id')) {

            $candidatesIds = $request->input('candidates_id');
            $vacancyIds = $request->input('vacancy_id');
            $batchIds = $request->input('batch_id');

            $count = count($candidatesIds);
            for ($i = 0; $i < $count; $i++) {
                $candidateId = $candidatesIds[$i];
                $vacancyId = $vacancyIds[$i];
                $batchId = $batchIds[$i];

                DB::table('candidates')
                    ->where('candidates_id', $candidateId)
                    ->where('vacancy_id', $vacancyId)
                    ->where('batch_id', $batchId)
                    ->update([
                        'status' => 'lolos',
                        'updated_at' => now(),
                    ]);

                alert()->success('Done', 'Data berhasil diupdate');
            }
        } else {
            alert()->error('Error', 'Data tidak tersedia untuk diproses');
        }

        return redirect()->back();
    }

    public function st1NotGood(Request $request)
    {
        if ($request->has('candidates_id')) {

            $candidatesIds = $request->input('candidates_id');
            $vacancyIds = $request->input('vacancy_id');
            $batchIds = $request->input('batch_id');

            $count = count($candidatesIds);
            for ($i = 0; $i < $count; $i++) {
                $candidateId = $candidatesIds[$i];
                $vacancyId = $vacancyIds[$i];
                $batchId = $batchIds[$i];

                DB::table('candidates')
                    ->where('candidates_id', $candidateId)
                    ->where('vacancy_id', $vacancyId)
                    ->where('batch_id', $batchId)
                    ->update([
                        'status' => 'tidak',
                        'updated_at' => now(),
                    ]);

                alert()->success('Done', 'Data berhasil diupdate');
            }
        } else {
            alert()->error('Error', 'Data tidak tersedia untuk diproses');
        }

        return redirect()->back();
    }

    public function st2()
    {
        $collapse  = 'st2';
        $date      = Carbon::now()->format('d/m/Y');
        $vacancies = DB::table('job_vacancies')->get();
        $position  = DB::table('job_vacancies')->where('status', 'active')->get();
        $lp        = DB::table('landing_pages')->join('job_vacancies', 'job_vacancies.vacancy_id', 'landing_pages.vacancy_id')->get();
        $batch     = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '>=', Carbon::now()->subMonth(1))->get();
        $berakhir  = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '<', Carbon::now()->subMonth(1))->get();
        return view('selection.st2.index', compact('vacancies', 'lp', 'batch', 'collapse', 'position', 'date', 'berakhir'));

        // $data = DB::table('answer_st2')->get();
        // $question = DB::table('question_st2')->get();
        return view('selection.st2.index', compact(['data', 'question']));
    }

    public function st2Detail($id)
    {
        $data = DB::table('answer_st2')
            ->where('answer_st2.batch_id', $id)
            ->get();
        $question = DB::table('question_st2')->get();
        $segment = $id;

        return view('selection.st2.detail', compact(['data', 'question', 'segment']));
    }

    public function st2Good(Request $request)
    {
        if ($request->has('answer_id')) {

            $answerIds = $request->input('answer_id');
            $vacancyIds = $request->input('vacancy_id');
            $batchIds = $request->input('batch_id');

            $count = count($answerIds);
            for ($i = 0; $i < $count; $i++) {
                $answer_id = $answerIds[$i];
                $vacancyId = $vacancyIds[$i];
                $batchId = $batchIds[$i];

                DB::table('answer_st2')
                    ->where('answer_id', $answer_id)
                    ->where('vacancy_id', $vacancyId)
                    ->where('batch_id', $batchId)
                    ->update([
                        'status' => 'lolos',
                        'updated_at' => now(),
                    ]);

                alert()->success('Done', 'Data berhasil diupdate');
            }
        } else {
            alert()->error('Error', 'Data tidak tersedia untuk diproses');
        }

        return redirect()->back();
    }

    public function st2NotGood(Request $request)
    {
        if ($request->has('answer_id')) {

            $answerIds = $request->input('answer_id');
            $vacancyIds = $request->input('vacancy_id');
            $batchIds = $request->input('batch_id');

            $count = count($answerIds);
            for ($i = 0; $i < $count; $i++) {
                $answer_id = $answerIds[$i];
                $vacancyId = $vacancyIds[$i];
                $batchId = $batchIds[$i];

                DB::table('answer_st2')
                    ->where('answer_id', $answer_id)
                    ->where('vacancy_id', $vacancyId)
                    ->where('batch_id', $batchId)
                    ->update([
                        'status' => 'tidak',
                        'updated_at' => now(),
                    ]);

                alert()->success('Done', 'Data berhasil diupdate');
            }
        } else {
            alert()->error('Error', 'Data tidak tersedia untuk diproses');
        }

        return redirect()->back();
    }

    public function groupInterview()
    {
        // $data = DB::table('group_interview')->get();

        $data = DB::table('batch_vacancies')
            ->select('group_interview.*', 'batch_vacancies.*', 'job_vacancies.*')
            ->leftJoin('group_interview', 'batch_vacancies.batch_id', 'group_interview.batch_id')
            ->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')
            ->where('batch_vacancies.end_date', '>=', Carbon::now()->subMonth(1))->get();


        // $data = DB::table('batch_vacancies')
        //     ->select('*', 'answer_st2.created_at as tgl_daftar')
        //     ->leftJoin('job_vacancies', 'answer_st2.vacancy_id', 'job_vacancies.vacancy_id')
        //     ->leftJoin('batch_vacancies', 'answer_st2.batch_id', 'batch_vacancies.batch_id')
        //     ->leftJoin('group_interview', 'answer_st2.answer_id', 'group_interview.answer_id')
        //     ->where('batch_vacancies.status', '1')
        //     ->where('answer_st2.status', 'lolos')->get();
        return view('selection.gi.index', compact(['data']));
    }

    public function getGI($id)
    {
        $position = DB::table('group_interview')->where('gi_id', $id)->first();
        return response()->json($position);
    }

    public function storeGI(Request $request)
    {

        DB::table('group_interview')->insert([
            'batch_id' => $request->batch_id,
            'link' => $request->link,
            'description' => '-',
            'date_zoom' => $request->date_zoom,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        alert()->success('Done', 'Data Ditambahkan');
        return redirect()->back();
    }

    public function updateGI(Request $request)
    {
        DB::table('group_interview')
            ->where('gi_id', $request->gi_id)
            ->update([
                'link' => $request->link,
                'date_zoom' => $request->date_zoom,
                'updated_at' => now(),
            ]);

        alert()->success('Done', 'Data berhasil diedit');
        return redirect()->back();
    }


    public function sta()
    {
        $collapse  = 'sta';
        $date      = Carbon::now()->format('d/m/Y');
        $vacancies = DB::table('job_vacancies')->get();
        $position  = DB::table('job_vacancies')->where('status', 'active')->get();
        $lp        = DB::table('landing_pages')->join('job_vacancies', 'job_vacancies.vacancy_id', 'landing_pages.vacancy_id')->get();
        $batch     = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '>=', Carbon::now()->subMonth(1))->get();
        $berakhir  = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '<', Carbon::now()->subMonth(1))->get();
        return view('selection.sta.index', compact('vacancies', 'lp', 'batch', 'collapse', 'position', 'date', 'berakhir'));

        // $data = DB::table('answer_sta')->get();
        // $question = DB::table('question_sta')->get();
        return view('selection.sta.index', compact(['data', 'question']));
    }

    public function staDetail($id)
    {
        $data = DB::table('answer_sta')
            ->where('answer_sta.batch_id', $id)
            ->get();
        $question = DB::table('question_sta')->get();

        $segment = $id;

        return view('selection.sta.detail', compact(['data', 'question', 'segment']));
    }

    public function staGood(Request $request)
    {
        if ($request->has('answer_id')) {

            $answerIds = $request->input('answer_id');
            $vacancyIds = $request->input('vacancy_id');
            $batchIds = $request->input('batch_id');

            $count = count($answerIds);
            for ($i = 0; $i < $count; $i++) {
                $answer_id = $answerIds[$i];
                $vacancyId = $vacancyIds[$i];
                $batchId = $batchIds[$i];

                DB::table('answer_sta')
                    ->where('answer_id', $answer_id)
                    ->where('vacancy_id', $vacancyId)
                    ->where('batch_id', $batchId)
                    ->update([
                        'status' => 'lolos',
                        'updated_at' => now(),
                    ]);

                alert()->success('Done', 'Data berhasil diupdate');
            }
        } else {
            alert()->error('Error', 'Data tidak tersedia untuk diproses');
        }

        return redirect()->back();
    }

    public function staNotGood(Request $request)
    {
        if ($request->has('answer_id')) {

            $answerIds = $request->input('answer_id');
            $vacancyIds = $request->input('vacancy_id');
            $batchIds = $request->input('batch_id');

            $count = count($answerIds);
            for ($i = 0; $i < $count; $i++) {
                $answer_id = $answerIds[$i];
                $vacancyId = $vacancyIds[$i];
                $batchId = $batchIds[$i];

                DB::table('answer_sta')
                    ->where('answer_id', $answer_id)
                    ->where('vacancy_id', $vacancyId)
                    ->where('batch_id', $batchId)
                    ->update([
                        'status' => 'tidak',
                        'updated_at' => now(),
                    ]);

                alert()->success('Done', 'Data berhasil diupdate');
            }
        } else {
            alert()->error('Error', 'Data tidak tersedia untuk diproses');
        }

        return redirect()->back();
    }
}
