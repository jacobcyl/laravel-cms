@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>发布文章</small>
                <div style="float: right" class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                        <span class="selected-lang">选择语言</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li><a role="menuitem" class="set-lang" tabindex="-1" data-lang="zh" href="#zh">中文</a></li>
                        <li><a role="menuitem" class="set-lang" tabindex="-1" data-lang="en" href="#en">英文</a></li>
                    </ul>
                </div>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        {!! TranslatableBootForm::open()->action(route('dashboard.store-post'))->multipart()->role('form') !!}
            <div class="col-xs-12 col-md-8 col-lg-8">
                {!! TranslatableBootForm::text(trans('validation.attributes.postTitle'), 'title')
                ->placeholder('输入文章标题') !!}
                {!! TranslatableBootForm::textarea(trans('validation.attributes.postContent'), 'content')
                ->addClass('content') !!}
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
                <div class="panel panel-default">
                    <input type="hidden" name="cover_id">
                    <div class="panel-heading">文章封面图片</div>
                    <div class="panel-body">
                        <div class="scale w-5-3-h" style="" data-uploaded="0">
                            {{--<input type="file" id="upload-field" value="上传封面图片">--}}
                            <div class="fill-box picker upload-box upload-flag"></div>
                            <div class="delete-cover">删除</div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">选择文章分类</div>
                    <div class="panel-body">
                        <div class="form-group">
                            @foreach($categories as $category)
                            <div class="checkbox level-{{ $category->depth }}">
                                <label>
                                    <input class="level-{{ $category->depth }}" data-level="{{ $category->depth }}" data-parent="{{ $category->parent_id }}" type="checkbox" name="categories[]" value="{{ $category->id }}"> {!! $category->name !!}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">发布</button>
                    </div>
                </div>
            </div>
        {!! TranslatableBootForm::close() !!}

    </div>
    <!-- /.row -->

@endsection

@section('page_css')
    <link rel="stylesheet" type="text/css" href="/css/wangEditor/wangEditor.min.css">
    <style>

        .level-1{
            margin-left: 1rem;
        }
        .level-2{
            margin-left: 2rem;
        }
        .level-3{
            margin-left: 3rem;
        }
        .level-4{
            margin-left: 4rem;
        }
        .level-5{
            margin-left: 5rem;
        }

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
                    $('input[name="cover_id"]').val(id[0]);
                    coverDelete.show();
                }
            });

            //删除封面图片
            var coverDelete = $('.delete-cover');
            coverDelete.on('click', function (e) {
                $('input[name="cover_id"]').val('');
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
