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
        });
        //var editor = new wangEditor($('.content'));
        //editor.create();

        $('.lang-select').on('change', function(){
            var locale = $(this).val();
            $('.form-group-translation').hide().has('[data-language="'+locale+'"]').show();
        })

        $('.form-group-translation').hide().has('[data-language="'+$('.lang-select').val()+'"]').show();
    </script>
@endsection