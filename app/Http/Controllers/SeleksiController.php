<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SeleksiController extends Controller
{
    public function st2()
    {
        $data = DB::table('answer_st2')->get();
        $question = DB::table('question_st2')->get();

        return view('st2.index', compact(['data','question']));
    }
}
