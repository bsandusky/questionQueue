<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = DB::table('questions')->orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('questions.index', compact('questions'));
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => ['required', 'min:5', 'ends_with:?'],
        ]);

        $question = new Question;
        $question->text = $request->text;
        $question->save();

        return redirect('/questions');
    }
}
