@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>发布文章</small>
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
                    <div class="panel-heading">文章封面图片11</div>
                    <div class="panel-body">
                        <div class="scale w-5-3-h post-cover without-image">
                            <div class="fill-box"><img class="preview-image" /></div>
                            <div class="fill-box box-del"><i class="fa fa-w fa-trash btn-remove-file"></i></div>
                            <div class="fill-box box-add"><i class="fa fa-w fa-folder-open"></i></div>
                            <input class="fill-box" type="file" name="image" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">发布</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="" for="content">选择文章语言</label>
                            <select class="form-control lang-select">
                                <option value="zh">中文</option>
                                <option value="en">英文</option>
                            </select>
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
                editor.create();
            });

            $('.lang-select').on('change', function(){
                var locale = $(this).val();
                $('.form-group-translation').hide().has('[data-language="'+locale+'"]').show();
            })

            $('.form-group-translation').hide().has('[data-language="'+$('.lang-select').val()+'"]').show();

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
        });
        //var editor = new wangEditor($('.content'));
        //editor.create();


    </script>
@endsection