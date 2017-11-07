@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>文章分类管理</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" data-level="-1" data-parent="0" data-id="0">
                        <i class="fa fa-w fa-plus-square-o action-btn add-node" ></i>
                        文章分类
                    </h3>
                </div>
                <!-- List group -->
                <ul class="list-group category-list">
                    @if(count($categories) == 0)
                        <li class="list-group-item no-content">请点击上面的<i class="fa fa-w fa-plus-square-o"></i>添加分类</li>
                    @else
                        @foreach($categories as $category)
                        <li class="list-group-item level-{{ $category->depth }} parent-{{ $category->parent_id }}"
                            data-id="{{ $category->id }}"
                            data-parent="{{ $category->parent_id }}"
                            data-level="{{ $category->depth }}">
                            <i class="fa fa-w fa-trash action-btn delete-node"></i>
                            <i class="fa fa-w fa-edit action-btn edit-node"></i>
                            <i class="fa fa-w fa-plus-square-o action-btn add-node"></i>
                            <span>{!! $category->name !!}</span>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection

@section('page_js')
   <script>
       $(document).ready(function(){
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

           $(document).on('click', '.action-btn', function(){
               var item = $(this).parents('li').eq(0);

               var itemId = item.data('id') != undefined?item.data('id'):0;
               var parent = item.data('parent') != undefined?item.data('parent'):0;
               var level = item.data('level') != undefined?item.data('level'):-1;

               if($(this).hasClass('add-node')){
                   if(level >= 4){
                       alert('最多添加4层');
                       return;
                   }

                   var target = $(this).parent();
                   if($(this).parent('.panel-title').length){
                       target = $('.category-list li').last();
                   }

                   $(`<li class="list-group-item level-${level+1}"
                        data-parent="${itemId}"
                        data-level="${level+1}">
                        <div class="input-group">
                            <input class="form-control" data-trigger="focus" data-toggle="popover" data-placement="top"  data-content="请输入分类名称" type="text" placeholder="输入分类名称">
                            <div class="input-group-addon btn btn-add-category">提交</div>
                        </div>
                    </li>`).insertAfter(target);
                   $('li.no-content').hide();
               }

               if($(this).hasClass('delete-node')){
                   if(item.siblings(`.parent-${itemId}`).length > 0){
                       alert('该分类有子类,请先删除子类');
                       return;
                   }
                   if(!confirm("确定要删除吗？")) return;
                   $.ajax({
                       type: 'delete',
                       url: "{{ url('dashboard/category/delete') }}/"+itemId,
                       success: function(data){
                           if(data.error){
                               alert(data.message);
                           }else{
                               item.remove();
                               if($("li:not('.no-content')").length == 0){
                                   $('li.no-content').show();
                               }
                           }
                       },
                       error: function(){

                       }
                   })
               }
           });

           $(document).on('click', '.btn-add-category', function(){
               var item = $(this).parents('li').eq(0);

               var parent = item.data('parent');
               var name = item.find('input').val();
               var level = item.data('level');

               if(name == ''){
                   $(this).prev().popover('show')
                   return;
               }

               $.ajax({
                   type: 'post',
                   url: "{{ route('dashboard.store-category') }}",
                   data: {
                       cate_type: 'post',
                       parent_id: parent,
                       name: name
                   },
                   success: function(data){
                       if(data.error){
                           alert(data.message);
                       }else{
                           item.replaceWith(
                                   `<li class="list-group-item level-${level} parent-${data.parent_id}"
                                        data-id="${data.id}"
                                        data-parent="${data.parent_id}"
                                        data-level="${level}">
                                        <i class="fa fa-w fa-trash action-btn delete-node"></i>
                                        <i class="fa fa-w fa-edit action-btn edit-node"></i>
                                        <i class="fa fa-w fa-plus-square-o action-btn add-node"></i>
                                        <span>${data.name}</span>
                                   </li>`
                           );
                       }
                   },
                   error: function(){
                        alert('请求错误');
                   }
                })
           })
       });
   </script>
@endsection

@section('page_css')
    <style>
        .level-1{
            padding-left: 2rem;
        }
        .level-2{
            padding-left: 4rem;
        }
        .level-3{
            padding-left: 6rem;
        }
        .level-4{
            padding-left: 8rem;
        }
        .level-5{
            padding-left: 10rem;
        }

        .action-btn{
            float: right;
            font-size: 1.5rem;
            cursor: pointer;
            padding: .1rem .3rem;
            margin: 0 .2rem;
        }
        li>span::before{
            content: "├┈  "
        }
        li.level-0>span::before{
            content: '';
        }
        .action-btn:hover{
            color: green;
        }
    </style>
@endsection