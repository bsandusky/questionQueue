<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>{{ config('app.name', 'Laravel') }}</h1>

        <form action="/questions" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <input id="text" name="text" type="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}" autocomplete="text" autofocus required>

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row pt-3">
                        <button class="btn btn-primary">Ask a question</button>
                    </div>

                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-4">
                <ul>
                    @foreach($questions as $question)
                    <li>
                        <a href="/questions/{{ $question->id}}">{{ $question->text }}</a>
                    </li>
                    @endforeach
                </ul>
                {{ $questions->links() }}
            </div>
        </div>
    </div>
</body>

</html>