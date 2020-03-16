<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        /* Validate user input: required, minimum length 5 */
        $data = $request->validate([
            'text' => ['required', 'min:5'],
        ]);
        
        /** Refactor to remove explicit 'findOrFail' call and to use route helper */
        $question->answers()->create($request->all());
        return redirect(route('questions.show', ['question' => $question]));
    }
}
