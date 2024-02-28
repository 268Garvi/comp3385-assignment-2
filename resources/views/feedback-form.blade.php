@extends('layouts.app')

@section('content')
    <h2>Feedback Form</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/feedback/send') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="full_name">Full Name <span style="color: red">(Required)</span></label>
            <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email <span style="color: red">(Required)</span></label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="comment">Comments <span style="color: red">(Required)</span></label>
            <textarea id="comment" name="comment" class="form-control">{{ old('comment') }}</textarea>
        </div>
        <p>Let us know what you think of our website</p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
