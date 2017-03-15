@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h4>{{ $post->title }}</h4>
                <div>
                    @if($post->cover)
                        <div style="position: relative; margin-bottom: 15px;width:100%;">
                            <img class="scale-box" style="width:100%" src="{{ url( $post->cover->path ) }}"  />
                        </div>
                    @endif
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
