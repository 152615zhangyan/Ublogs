﻿@extends('admin.public.parent')

@section('content')

<!-- 内容区域 -->
<!-- <form action="#" method="post"> -->
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">文章列表</div>
                    </div>
                    <div class="widget-body  am-fr">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs" >
                                       <a href="{{ url('admin/article/create') }}"><input type="submit" class="am-btn am-btn-default am-btn-success" value="新增"> </a>                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                            <div class="am-form-group tpl-table-list-select">
                                <select data-am-selected="{btnSize: 'sm'}">
                                  <option value="option1">所有类别</option>
                                  <option value="option2">IT业界</option>
                                  <option value="option3">数码产品</option>
                                  <option value="option3">笔记本电脑</option>
                                  <option value="option3">平板电脑</option>
                                  <option value="option3">只能手机</option>
                                  <option value="option3">超极本</option>
                                </select>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                            <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                <input type="text" class="am-form-field ">
                                <span class="am-input-group-btn">
                                    <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
                                </span>
                            </div>
                        </div>
                        <form action="#" method='post'>
                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>文章标题</th>
                                            <th>作者</th>
                                            <th>时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($title as $a)
                                        <tr class="gradeX">
                                            <td>{{ $a->id }}</td>
                                            <td>{{ $a->title }}</td>
                                            <td>{{ $a->user_id }}</td>
                                            <td>{{ $a->add_time }}</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="{{ url('admin/article/'.$a->id) }}">
                                                        <i class="am-icon-eye"></i> 查看
                                                    </a>
                                                    <a href="javascript:" onclick="doDel({{ $a->id }})" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                    <a href="javascript:;" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-asterisk"></i> 审核
                                                    </a>                                                        
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                            <!-- more data -->
                                    </tbody>
                                </table>
                            </div>
                        </form>
                         {!! $title->render() !!}
                        <div class="am-u-lg-12 am-cf">
                            <div class="am-fr">
                                <ul class="am-pagination tpl-pagination">
                                    <li class="am-disabled"><a href="#">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- </form> -->

@endsection
<script>

function doDel(id){

    //询问框
    layer.confirm('确认删除？', {
        btn: ['确认','取消'] //按钮
    }, function(){
//                通过ajax 向服务器发送一个删除请求
    
//                $.post('请求的路径'，携带的数据参数，执行后返回的数据)
//                {'key':'value','key1':'value1'}
        $.post("{{url('admin/article/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
//                    需要将json字符串变成json对象
            //var data = JSON.parse(data);

//                    JSON.parse(jsonstr); //可以将json字符串转换成json对象
//                    JSON.stringify(jsonobj); //可以将json对象转换成json对符串

            if(data.status == 0){
                location.href = location.href;
                layer.msg(data.msg, {icon: 6});
            }else{
                location.href = location.href;
                layer.msg(data.msg, {icon: 5});
            }


        })
//

    });
}
</script>

