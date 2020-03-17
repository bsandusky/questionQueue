@extends('layouts.app')

@section('content')

<div class="container">

    <!-- New question input form -->
    <form action="{{ route('questions.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <div class="form-group">
                    <div class="input-group">
                        <input id="text" name="text" type="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}" autocomplete="text" autofocus required placeholder="{{$placeholder}}">
                        <span class="input-group-btn ml-2">
                            <button class="btn btn-secondary">Ask a question</button>
                        </span>
                    </div>
                    @error('text')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
    </form>

    <!-- Display existing questions and number of answers -->
    <div class="row">
        <div class="col-8 offset-2">
            @if($questions->count() == 0)
                <p>There are no questions yet. Be the first to ask a question.</p>
            @else
                <div class="list-group pt-3">
                    @foreach($questions as $question)
                    <a href="{{ route('questions.show', ['question' => $question]) }}" class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $question->text }}
                        <span class="badge badge-secondary badge-pill">{{ $question->answers->count() }} answers </span>
                    </a>
                    @endforeach
                </div>
                <div class="col-4 offset-4 mt-2">
                    {{ $questions->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
</body>

</html>

@endsection