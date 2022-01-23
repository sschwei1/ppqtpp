<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PresentationController extends Controller
{
    public function overview(Request $request) {
        if(is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $userId = Session::get('user_id');
        $presentations = Presentation::where('userId', $userId)
            ->get();

        foreach($presentations as $presentation) {
            $result = Db::select('select count(*) as questionCount from presentations as pr
                join sessions as se on pr.id = se.presentationId
                join questions as qe on se.id = qe.sessionId
                where pr.id = :id
                AND se.endTime > \'0000-00-00 00:00:00\'
                ',
                ['id' => $presentation['id']]
            );
            $presentation['questionCnt'] = $result[0]->questionCount;
        }

        return view('presentation.overview', [
            'presentations' => $presentations
        ]);
    }
}
