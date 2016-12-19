@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h4>{{ $post->title }}</h4>
                <div>
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
