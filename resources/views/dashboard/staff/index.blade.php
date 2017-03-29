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
                    <th st-sort="image" class="image st-sort">头像</th>
                    <th st-sort="title" class="title st-sort">标题</th>
                    <th st-sort="date" st-sort-default="reverse" class="date st-sort">描述</th>
                    <th st-sort="status" class="status st-sort">状态</th>
                    <th st-sort="action" class="action st-sort">操作</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($staffs as $key => $staff)
                        <tr ng-repeat="model in displayedModels">
                            <td><a href="{{ route('dashboard.delete-staff', ['id'=> $staff->id]) }}" onclick="return confirm('是否删除')"><i class="fa fa-w fa-close"></i></a></td>
                            <td><a href="{{ route('dashboard.edit-staff', ['id'=> $staff->id]) }}"><i class="fa fa-w fa-edit"></i></a></td>
                            <td>{!! $staff->avatar?'<img src="'.url($staff->avatar->path).'" height=40 />':'' !!}</td>
                            <td>{{ $staff->title }}</td>
                            <td>{!! $staff->description !!}</td>
                            <td>{{ $staff->status }}</td>
                            <td>
                                @if($key !== 0)
                                    <a title="上移" class="btn btn-primary" href="{{ route('dashboard.move-staff', ['id'=> $staff->id, 'direct' => 'up']) }}">
                                        <i class="fa fa-w fa-upload"></i>
                                    </a>
                                @endif
                                @if($key !== (count($staffs) - 1))
                                    <a title="下移" class="btn btn-success" href="{{ route('dashboard.move-staff', ['id'=> $staff->id, 'direct' => 'down']) }}">
                                        <i class="fa fa-w fa-download"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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