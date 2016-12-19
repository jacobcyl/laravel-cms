@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>文章列表</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <table st-persist="newsTable" st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-condensed table-main">
                <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="status" class="status st-sort">状态</th>
                    <th st-sort="image" class="image st-sort">封面</th>
                    <th st-sort="date" st-sort-default="reverse" class="date st-sort">发布时间</th>
                    <th st-sort="title" class="title st-sort">标题</th>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>
                        <input st-search="title" class="form-control input-sm" placeholder="@lang('global.Search')…" type="text">
                    </td>
                </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                        <tr ng-repeat="model in displayedModels">
                            <td><a href="{{ route('dashboard.delete-post', ['id'=> $post->id]) }}" onclick="return confirm('是否删除')"><i class="fa fa-w fa-close"></i></a></td>
                            <td><a href="{{ route('dashboard.edit-post', ['id'=> $post->id]) }}"><i class="fa fa-w fa-edit"></i></a></td>
                            <td>{{ $post->published }}</td>
                            <td>{!! $post->cover?'<img src="'.url($post->cover->path).'" height=40 />':'' !!}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
    <!-- /.row -->

@endsection

@section('page_js')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection