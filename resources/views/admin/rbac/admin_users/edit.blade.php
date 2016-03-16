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

        {!! Breadcrumbs::render('admin-user-edit') !!}
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
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{URL::to('admin/admin_user')}}" class="btn btn-default">返回列表</a>
                </header>
                <div class="panel-body">
                    <form role="form" method="post" action="{{route('admin.admin_user.update',['id'=>$user->id])}}">
                        <input type="hidden" name="_method" value="PUT">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="">所属角色组</label>
                            <div>
                                @inject('rolePresenter','App\Presenters\RolePresenter')
                                {!! $rolePresenter->rolesCheckbox($hasRoles) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">用户名</label>
                            <input class="form-control tooltips" name="name" id="name" value="{{$user->name or '用户名'}}" placeholder="用户名"
                                   type="text"  data-toggle="tooltip" data-trigger="hover" data-original-title="不可重复">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">邮箱</label>
                            <input type="email" name="email" id="email" value="{{$user->email or '邮箱'}}"
                                   data-toggle="tooltip"
                                   data-trigger="hover"
                                   class="form-control tooltips"
                                   data-original-title="不可重复">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password"  data-toggle="tooltip" name="password"
                                   data-trigger="hover" class="form-control tooltips"
                                   placeholder="不修改密码请留空"
                                   data-original-title="请输入密码" id="password">
                        </div>
                        <div class="form-group">
                            <label for="is_super">超级管理员</label>
                            <select class="form-control input-sm" name="is_super">
                                <option value="1" {{ $user->is_super == 1 ? 'selected':'' }}>是</option>
                                <option value="0" {{ $user->is_super == 0 ? 'selected':'' }}>否</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">修改</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
@stop
@section('javascript')
@parent

@stop
@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop

