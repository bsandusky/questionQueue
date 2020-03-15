<?php

namespace App\Http\Controllers;

use App\Question;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
        /* Use Guzzle client to call Open Trivia DB API 
        for random question to use as field placeholder text */
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://opentdb.com/api.php?amount=1&type=multiple');
        $data = json_decode($res->getBody(), true);
        $placeholder = htmlspecialchars_decode($data['results'][0]['question'],  ENT_QUOTES);

        /* Retrive data from database, with paginated records from newest to oldest */
        $questions = Question::orderBy('created_at', 'DESC')->simplePaginate(10);

        /* Return view with injected data */
        return view('questions.index', ['questions' => $questions, 'placeholder' => $placeholder]);
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function store(Request $request)
    {
        /* Validate user input: required, minimum length 5, ends with '?' */
        $data = $request->validate([
            'text' => ['required', 'min:5', 'ends_with:?'],
        ]);

        $question = new Question;
        $question->text = $request->text;
        $question->save();

        return redirect('/questions');
    }
}
