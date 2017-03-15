@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>留言信箱</small>
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
                    <th st-sort="status" class="status st-sort">状态</th>
                    <th st-sort="name" class="name st-sort">发件人</th>
                    <th st-sort="email" class="email st-sort">邮箱</th>
                    <th st-sort="message" st-sort-default="reverse" class="message st-sort">信息</th>
                    <th st-sort="created_at" class="created_at st-sort">时间</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($messages as $message)
                        <tr ng-repeat="model in displayedModels">
                            <td><a href="{{ route('dashboard.delete-message', ['id'=> $message->id]) }}" onclick="return confirm('是否删除')"><i class="fa fa-w fa-close"></i></a></td>
                            <td>
                                {!! $message->readStatus !!}
                                @if($message->status == 'unread')
                                    <a href="{{ route('dashboard.read-message', ['id'=>$message->id]) }}">标为已读</a>
                                @endif
                            </td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $messages->links() }}
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

@section('page_css')
    <style>
        .status{ width: 10%}
        .name{ width:10%}
        .email{width:10%}
        .message{width: 50%}
        .created_at{width:20%}
    </style>
@endsection