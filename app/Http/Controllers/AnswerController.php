<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, $question_id)
    {
        /* Validate user input: required, minimum length 5 */
        $data = $request->validate([
            'text' => ['required', 'min:5'],
        ]);

        $question = Question::findOrFail($question_id);
        $question->answers()->create($request->all());

        return redirect('/questions/' . $question_id);
    }
}
