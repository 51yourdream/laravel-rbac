@extends('_layout.admin-app')
@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop
@section('pageHeading')
    <h3>
        Dashboard
    </h3>
    <ul class="breadcrumb">

        {!! Breadcrumbs::render('admin-user-index') !!}
    </ul>
    <div class="state-info">
        <section class="panel">
            <div class="panel-body">
                <div class="summary">
                    <span>yearly expense</span>
                    <h3 class="red-txt">$ 45,600</h3>
                </div>
                <div id="income" class="chart-bar"></div>
            </div>
        </section>
        <section class="panel">
            <div class="panel-body">
                <div class="summary">
                    <span>yearly  income</span>
                    <h3 class="green-txt">$ 45,600</h3>
                </div>
                <div id="expense" class="chart-bar"></div>
            </div>
        </section>
    </div>
@stop
@section('wrapper')


    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{route('admin.admin_user.create')}}" class="btn btn-info">添加会员</a>
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>选择</th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>超级管理员</th>
                                <th>所属角色</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td><input type="checkbox" name=""></td>
                                    <td>{{$user->id}}</td>
                                    <td class="">{{$user->name}}</td>
                                    <td class="">{{$user->email}}</td>
                                    <td>{!! $user->is_super ? '<span class="label label-danger">是</span>':'<span class="label label-default">否</span>' !!}</td>
                                    <td>
                                        @if($user->roles()->count())
                                            @foreach($user->roles()->get() as $role)
                                                <span class="badge badge-info">{{ $role->display_name }}</span>
                                            @endforeach
                                        @else
                                            <span class="badge">无</span>
                                        @endif
                                    </td>
                                    <td class="">{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.admin_user.edit',['id'=>$user->id])}}" class="btn btn-sm btn-success margin-top-5">修改信息</a>
                                        <div type="2" title="查看权限" shadeClose=0 shade="0.5" with="600px" height="400px" content="{{URL::to('admin/giveRole/index?id=').$user->id}}" class="btn btn-sm btn-warning margin-top-5" role="layer">配置权限</div>
                                        {{--<a href="" class="btn btn-sm btn-danger margin-top-5">禁用</a>--}}
                                        <a class="btn btn-sm btn-danger margin-top-5" role="ajax-delete"
                                           data-href="{{ route('admin.admin_user.destroy',['id'=>$user->id]) }}">
                                            <i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>

    {!! $users->render() !!}
@endsection

@section('javascript')
    @parent


@stop
@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop