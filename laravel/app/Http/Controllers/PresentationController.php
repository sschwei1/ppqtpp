<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\Question;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Session as PresentationSession;

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

    public function sessionOverview(Request $request, $presentationId)
    {
        if(is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $presentation = Presentation::where('id', $presentationId)
            ->first();

        $finishedSessions = PresentationSession::where('presentationId', $presentationId)
            ->where('endTime', '>', '0000-00-00 00:00:00')
            ->get();

        $totalCount = 0;

        foreach($finishedSessions as $session) {
            $session['questionCount'] = Question::where('sessionId', $session['id'])
                ->count();

            $totalCount += $session['questionCount'];

            $startTime = new DateTime($session['startTime']);
            $endTime = new DateTime($session['endTime']);

            $session['duration'] = $startTime->diff($endTime)->format('%Hh %Imin %Ssec');
        }

        return view('session.overview', [
            'id' => $presentationId,
            'name' => $presentation['name'],
            'theme' => $presentation['theme'],
            'description' => $presentation['description'],
            'questionCount' => $totalCount,
            'finishedSessions' => $finishedSessions
        ]);
    }

    public function sessionInfo(Request $request, $presentationId, $sessionId)
    {
        if(is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $session = PresentationSession::where('id', $sessionId)
            ->where('presentationId', $presentationId)
            ->first();

        $presentation = Presentation::where('id', $presentationId)
            ->first();

        $questions = Question::where('sessionId', $sessionId)
            ->get();

        $questionCount = Question::where('sessionId', $sessionId)
            ->count();

        $startTime = new DateTime($session['startTime']);
        $endTime = new DateTime($session['endTime']);

        $duration = $startTime->diff($endTime)->format('%Hh %Imin %Ssec');

        return view('session.info', [
            'name' => $session['title'],
            'presentationName' => $presentation['name'],
            'questionCount' => $questionCount,
            'date' => $session['startTime'],
            'duration' => $duration,
            'questions' => $questions,
            'presentationId' => $presentationId
        ]);
    }

    public function presentationAddPage()
    {
        if (is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        return view('presentation.add');
    }

    public function presentationAdd(Request $request)
    {
        if (is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $data = $request->input();

        $presentation = new Presentation();
        $presentation['name'] = $data['name'];
        $presentation['theme'] = $data['theme'];
        $presentation['description'] = $data['description'];
        $presentation['userId'] = Session::get('user_id');
        $presentation['presentationCode'] = PresentationController::generateRandomString();
        $presentation->save();

        return Redirect::route('view.presentation.overview');
    }

    public function sessionAddPage($id)
    {
        if (is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $runningSession = PresentationSession::where('presentationId', $id)
            ->where('endTime', null)
            ->first();

        if(!is_null($runningSession)) {
            return Redirect::route('view.presentation.running', [
                'id' => $id
            ]);
        }


        return view('session.add', [
            'id' => $id
        ]);
    }

    public function sessionAdd(Request $request)
    {
        if (is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $data = $request->input();

        $session = new PresentationSession();
        $session['presentationId'] = $data['id'];
        $session['title'] = $data['title'];
        $session->save();

        return Redirect::route('view.presentation.running', [
            'id' => $data['id']
        ]);
    }

    public function runningSession($id)
    {
        if (is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $runningSession = PresentationSession::where('presentationId', $id)
            ->where('endTime', null)
            ->first();

        if(is_null($runningSession)) {
            return Redirect::route('view.session.add');
        }

        $questions = Question::where('sessionId', $runningSession['id'])
            ->get();

        return view('presentation.running', [
            'presentationId' => $id,
            'sessionId' => $runningSession['id'],
            'questions' => $questions
        ]);
    }

    public function sessionClose($id)
    {
        if (is_null(Session::get('user_id'))) {
            Session::flush();
            return Redirect::route('view.user.login');
        }

        $runningSession = PresentationSession::where('presentationId', $id)
            ->where('endTime', null)
            ->first();

        if(!is_null($runningSession)) {
            $runningSession['endTime'] = Carbon::now();
            $runningSession->save();
        }

        return Redirect::route('view.session.overview', ['id' => $id]);
    }

    public static function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
