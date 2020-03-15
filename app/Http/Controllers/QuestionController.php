<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() 
    {
        return view('questions.index');
    }

    public function show(Question $question) 
    {
        return view('question.show', compact('question'));
    }

    public function store()
    {
        dd('implement this');
    }
}
