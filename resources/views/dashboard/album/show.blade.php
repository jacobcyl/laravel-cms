@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>相册:{{ $album->name }}</small>
            </h1>

        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 well" style="margin: 0 0 20px 0">
            <span>{!! $album->description !!}</span>
        </div>
        <div class="col-lg-3 col-md-3">
            <form action="{{ route('dashboard.add-photo', ['album_id'=>$album->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <input type="hidden" name="photo_id">
                    <div class="panel-heading">添加图片</div>
                    <div class="panel-body">
                        <div class="scale w-5-3-h form-group" style="" data-uploaded="0">
                            {{--<input type="file" id="upload-field" value="上传封面图片">--}}
                            <div class="fill-box picker upload-box upload-flag"></div>
                            <div class="delete-cover">删除</div>
                        </div>
                        <div class="form-group">
                            <label for="description">图片描述</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="图片描述">
                        </div>
                        <button type="submit" class="btn btn-default">添加</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-9 col-md-9">
            @foreach($album->photos as $photo)
                <div class="col-xs-6 col-md-3 img-item" data-id="" data-url="">
                    <div class="thumbnail img-item-bd" style="position: relative;" title="" data-id="1" data-src="{{ $photo->thumb }}">
                        <div class="scale w-5-3-h">
                            <img class="scale-box" src="{{ $photo->thumb }}" alt="{{ $photo->origin_name }}" style="object-fit: cover">
                        </div>
                        <div class="caption item-label">
                            <span class="lbl-content">{{ $photo->pivot->description }}</span>
                        </div>
                        <a href="{{ route('dashboard.delete-photo', ['album_id'=>$album->id,'id'=>$photo->id]) }}" onclick="return confirm('是否删除')" class="delete-photo" style="">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('page_css')
    <link rel="stylesheet" type="text/css" href="/css/wangEditor/wangEditor.min.css">
    <style>

        .content{
            height:400px !important;
        }
        .w-5-3-h{
            padding-bottom: 60%;
        }
        .scale {
            height: 0;
            position: relative;
        }
        .with-image img, .with-image:hover .box-del, .without-image .box-add, .without-image input{
            display: block;
        }
        .without-image img, .box-del, .with-image .box-add, .with-image input{
            display: none;
        }
        .fill-box{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        input.fill-box{
            opacity: 0;
        }
        .box-del > i{
            font-size: 2rem;
            background: gray;
            cursor: pointer;
            color: white;
            padding: .1rem .5rem;
            position: absolute;
            bottom: .5rem;
            left: 50%;
            transform: translate(-50%, 0);
        }
        .box-add > i{
            font-size: 5rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .post-cover img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail:hover .delete-photo{
            display: block;
        }
        .delete-photo{
            font-size: 18px;
            display: none;
            background: rgba(165, 166, 166, 0.63);
            position: absolute; right: 0; padding: 9px; left:-2px; bottom: 0;
            text-align: center;
        }
    </style>
@endsection


@section('page_js')
    <script type="text/javascript" src="/js/wangEditor/wangEditor.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.content').each(function(index, pitem){
                var editor = new wangEditor(pitem);
                editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
                    if (item === 'location') {
                        return null;
                    }
                    return item;
                });
                
                // 上传图片
                editor.config.uploadImgFileName = 'file'
                editor.config.uploadImgUrl = '/dashboard/media/upload/image/assets';
                editor.config.uploadParams = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    from: 'editor'
                };
    
                editor.create();
            });

            $('.set-lang').on('click', function(){
                var locale = $(this).data('lang');
                $('span.selected-lang').html($(this).html());
                $('.form-group-translation').hide().has('[data-language="'+locale+'"]').show();
            })

            $('.form-group-translation').hide().has('[data-language="zh"]').show();

            /*
            $('input[name="image"]').on('change', function(e){
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.preview-image').attr('src', e.target.result);
                        $('.post-cover').removeClass('without-image').addClass('with-image');
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
            $('.btn-remove-file').on('click', function(){
                $('input[name="image"]').val('');
                $('.post-cover').removeClass('with-image').addClass('without-image');
            });
            */
            //上传封面图片
            $('.picker').imagepicker({
                url: '{{ route('dashboard.media-list') }}',
                callback: function(obj, id, src){
                    $(obj).removeClass('upload-flag');
                    $(obj).html('<img class="media-object object-fit contain" src="'+src[0]+'">');
                    $('input[name="photo_id"]').val(id[0]);
                    coverDelete.show();
                }
            });

            //删除封面图片
            var coverDelete = $('.delete-cover');
            coverDelete.on('click', function (e) {
                $('input[name="photo_id"]').val('');
                $('.picker').empty().removeClass('upload-flag').addClass('upload-flag');
                $(this).hide();
            });

            $('input[type=checkbox]').on('click', function(){
                var level = $(this).data('level');
                var parent = $(this).data('parent');

                var check = $(this).prop("checked");

                $('input[type=checkbox]').each(function(index, item){
                    if($(item).val() == parent){
                        if(check) $(item).prop('checked', true);
                        else{

                        }
                    }
                });
            });
        });
        //var editor = new wangEditor($('.content'));
        //editor.create();


    </script>
@endsection
