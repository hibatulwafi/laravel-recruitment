<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class QuestionController extends Controller
{
    public function index()
    {
        $qst2 = DB::table('question_st2')->get();
        $qsta = DB::table('question_sta')->get();

        return view('question.index', compact(['qst2', 'qsta']));
    }

    public function store(Request $request)
    {

        if ($request->type == 'st2') {

            $request->validate([
                'question' => 'required',
            ]);

            DB::table('question_st2')->insert([
                'vacancy_id' => 0,
                'question' => $request->question,
                'order_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            alert()->success('Done','Added');
            return redirect()->route('question.index');

        } else if ($request->type == 'sta') {
            $request->validate([
                'question' => 'required',
            ]);

            DB::table('question_sta')->insert([
                'question' => $request->question,
                'order_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            alert()->success('Done','Added');
            return redirect()->route('question.index');
        } else {
            alert()->danger('Error', 'Error data unavailable');
            return redirect()->route('question.index');
        }
    }

    public function update(Request $request, $question_id, $type)
    {


        $request->validate([
            'position' => 'required',
            'status' => 'required',
            'link' => 'required',
        ]);

        DB::table('question_st2')
            ->where('question_id', $question_id)
            ->update([
                'position' => $request->position,
                'status' => $request->status,
                'segment' => $request->link,
                'updated_at' => now(),
            ]);

        alert()->success('Done', $request->position . ' Updated');
        return redirect()->route('question.index');
    }

    public function destroy(Request $request, $question_id, $type)
    {
        DB::table('question_st2')->where('question_id', $question_id)->delete();
        alert()->success('Done', 'Deleted successfully');
        return redirect()->route('question.index');
    }
}
