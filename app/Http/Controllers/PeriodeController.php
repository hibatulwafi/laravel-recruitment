<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class PeriodeController extends Controller
{

    public function store(Request $request)
    {
        // Cek jika ada posisi yang sama dalam 1 periode yang di input
        $check  = DB::table('batch_vacancies')->where('end_date', '>=', $request->end_date)->where('vacancy_id', $request->vacancy_id)->count();
        // Select batch sebelumnnya dan di tambah 1
        $checkBatch  = DB::table('batch_vacancies')->where('vacancy_id', $request->vacancy_id)->max('batch');

        if ($check <= 0) {
            DB::table('batch_vacancies')->insert([
                'vacancy_id' => $request->vacancy_id,
                'batch' => $checkBatch + 1,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            alert()->success('Done', 'Data Ditambahkan');
        } else {
            alert()->info('Warning', 'Loker di periode tersebut masih berlangsung');
        }

        return redirect()->route('vacancy.index');
    }

    public function history()
    {
        $collapse  = 'master-history';
        $date      = Carbon::now()->format('d/m/Y');
        $batch     = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_vacancies.end_date', '<', Carbon::now()->subMonth(1))->get();

        return view('master.vacancies.history', compact('batch', 'collapse', 'date'));
    }



    public function edit($id)
    {
        $position = DB::table('batch_vacancies')->where('batch_id', $id)->first();
        return response()->json($position);
    }

    public function update(Request $request)
    {
        if (Carbon::now() <= Carbon::parse($request->end_date)) {
            DB::table('batch_vacancies')
                ->where('batch_id', $request->id)
                ->update([
                    'vacancy_id' => $request->vacancy_id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'updated_at' => now(),
                ]);

            alert()->success('Done', 'Data berhasil diedit');
        } else {
            alert()->info('Warning', 'Tanggal deadline tidak boleh kurang dari tanggal sekarang');
        }
        return redirect()->route('vacancy.index');
    }

    public function detail($id)
    {
        $position = DB::table('batch_vacancies')->join('job_vacancies', 'job_vacancies.vacancy_id', 'batch_vacancies.vacancy_id')->where('batch_id', $id)->first();
        return response()->json($position);
    }

    public function destroy(Request $request)
    {
        DB::table('batch_vacancies')
            ->where('batch_id', $request->id)
            ->update([
                'status' => '0'
            ]);
        alert()->success('Done', 'Deleted successfully');
        return redirect()->route('vacancy.index');
    }
}
