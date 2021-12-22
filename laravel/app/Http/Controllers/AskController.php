<?php

namespace App\Http\Controllers;

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
            'presentationId' => 'required|max:16|min:16'
        ]);

        $presentationId = $request->input()['presentationId'];
        return Redirect::route('view.ask.question', ['id' => $presentationId]);
    }

    public function load(string $id): Factory|View|Application
    {
        return view('ask.question', ['id' => $id]);
    }

    public function question(Request $request) : mixed {
        $request->validate([
            'nickname' => 'required',
            'question' => 'required'
        ]);

        return $request->input();
    }
}
