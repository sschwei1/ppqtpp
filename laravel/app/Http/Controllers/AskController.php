<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\Question;
use App\Models\Session;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AskController extends Controller
{
    public function join(Request $request): RedirectResponse
    {
        $request->validate([
            'presentationId' => 'required'
        ]);

        $presentationId = $request->input()['presentationId'];
        $presentation = Presentation::where('presentationCode', $presentationId)
            ->first();

        if(is_null($presentation)) {
            return Redirect::route('view.ask.join');
        }

        $session = Session::where('presentationId', $presentation['id'])
            ->whereNull('endTime')
            ->first();

        if(is_null($session)) {
            return Redirect::route('view.ask.join');
        }

        return Redirect::route('view.ask.question', [
            'id' => $presentation['id'],
            'success' => 0
        ]);
    }

    public function load($id, $success)
    {
        $presentation = Presentation::where('id', $id)
            ->first();

        if(is_null($presentation)) {
            return Redirect::route('view.ask.join');
        }

        $session = Session::where('presentationId', $presentation['id'])
            ->whereNull('endTime')
            ->first();

        if(is_null($session)) {
            return Redirect::route('view.ask.join');
        }

        return view('ask.question', [
            'id' => $id,
            'presentationTitle' => $presentation['name'],
            'sessionId' => $session['id'],
            'successMessage' => $success
        ]);
    }

    public function question(Request $request) {
        $request->validate([
            'username' => 'required',
            'question' => 'required'
        ]);

        $data = $request->input();

        $question = new Question();
        $question['sessionId'] = $data['sessionId'];
        $question['username'] = $data['username'];
        $question['participantIdentifier'] = $data['username'];
        $question['question'] = $data['question'];
        $question->save();

        return Redirect::route('view.ask.question', [
            'id' => $data['presentationId'],
            'success' => true
        ]);
    }
}
