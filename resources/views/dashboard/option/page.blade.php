@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>网页设置</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-8 col-md-8">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">首页展示相册</label>
                    <div class="col-sm-10">
                        @if($albums->count())
                            <select name="home-gallery-option" id="home-gallery-option" class="form-control changeable" data-key="home-gallery" data-cate="home">
                                @foreach($albums as $album)
                                    <option @if($albumOption['option_value'] == $album->id) selected @endif value="{{ $album->id }}">{{ $album->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <a class="btn btn-default" href="{{ route('dashboard.create-album') }}" role="button">您还没相册,创建一个相册吧</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

@endsection

@section('page_js')
    <script>
        $(document).ready(function(){
            $('.changeable').on('change', function(){
                var option_name = $(this).data('key');
                var option_value = $(this).val();
                var option_cate = $(this).data('cate');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('dashboard.set-option') }}",
                    method: 'POST',
                    data: {
                        option_name: option_name,
                        option_value: option_value,
                        option_cate: option_cate
                    }
                })
                .done(function(data){
                    console.log(data);
                })
                .fail(function( jqXHR, textStatus ) {
                    console.log('error:'+textStatus);
                });
            })
        });
    </script>
@endsection