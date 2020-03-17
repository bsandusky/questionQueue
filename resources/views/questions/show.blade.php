@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Display question text -->
    <div class="row">
        <div class="col-8 offset-2 mt-5">
            <h1>{{ $question->text }}</h1>
        </div>
    </div>

    <!-- New answer input form -->
    <form action="{{ route('questions.answers.store', ['question' => $question]) }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-8 offset-2 mt-3">
                <div class="form-group">
                    <div class="input-group">
                        <input name="text" type="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}" autocomplete="text" autofocus required placeholder="Answer me!">
                        <span class="input-group-btn ml-2">
                            <button type="submit" class="btn btn-secondary">Answer question</button>
                        </span>
                    </div>
                    @error('text')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
    </form>

    <!-- Display existing answers -->
    <div class="row">
        <div class="col-8 offset-2">
            @if($question->answers->count() == 0)
                <p>There are no responses to this question yet. Be the first to respond.</p>
            @else
                <ul class="list-group mt-3">
                    @foreach($question->answers as $answer)
                    <li class="list-group-item">
                        {{ $answer->text }}</a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    @endsection