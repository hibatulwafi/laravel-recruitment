<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AjaxController extends Controller
{
    public function candidateByBatch($id)
    {
        try {
            $query = DB::table('candidates')
                ->select('users_profile.*', 'candidates.*')
                ->leftJoin('users', 'candidates.email', '=', 'users.email')
                ->leftJoin('users_profile', 'users.id', '=', 'users_profile.user_id')
                ->where('candidates.batch_id', $id)
                ->get();

            return response()->json($query);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
