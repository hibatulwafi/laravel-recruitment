<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class LandingpageController extends Controller
{
    public function update(Request $request)
    {
        DB::table('landing_pages')
            ->where('lp_id', $request->id)
            ->update([
                'section_head' => $request->section_head,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'updated_at' => now(),
            ]);

        alert()->success('Done', 'Data berhasil diedit');

        return redirect()->route('vacancy.index');
    }

    public function detail($id)
    {
        $position = DB::table('landing_pages')->where('lp_id', $id)->first();
        return response()->json($position);
    }
}
