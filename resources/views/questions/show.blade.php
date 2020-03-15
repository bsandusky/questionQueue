<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>

         <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div class="container">
            <h1>{{ config('app.name', 'Laravel') }}</h1>
            <h2>{{ $question->text }}</h2>

            <form action="/questions/{{$question->id}}/answers" method="post">
                @csrf

                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="form-group row">
                            <input id="text" name="text" type="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}" autocomplete="text" autofocus required placeholder="Answer me!">

                            @error('text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <button class="btn btn-primary">Answer question</button>
                </div>
            </form>

        <div class="row">
            <div class="col-4">
                <ul>
                    @foreach($question->answers as $answer)
                    <li>
                        {{ $answer->text }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        </div>
    </body>
</html>
