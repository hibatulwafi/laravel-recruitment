<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class StaController extends Controller
{
    public function index()
    {
        $data = DB::table('answer_sta')->get();
        $question = DB::table('question_sta')->get();

        return view('sta.index', compact(['data','question']));
    }
}
