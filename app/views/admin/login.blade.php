@section('content')
<div class="span4 offset3">
    <div class="padded">
        @if($errors->first())
            @include('admin.layouts.partial.notice', array('type'=>'error','notice_message'=>'<strong>Woops!!</strong> 登入資訊錯誤'))
        @endif
        <div class="login box" style="margin-top: 80px;">
            <div class="box-header">
                <span class="title">登入管理帳號</span>
            </div>
            <div class="box-content padded">
                {{ Form::open(array('url'=>'/admin/users/login', 'class'=>'separate-sections')) }}
                    <div class="input-prepend">
                        <span class="add-on" href="#">
                            <i class="icon-user"></i>
                        </span>
                        {{ Form::text('email', null, array('placeholder' => '登入帳號')) }}
                    </div>
                    <div class="input-prepend">
                        <span class="add-on" href="#">
                            <i class="icon-key"></i>
                        </span>
                        {{ Form::password('password', null, array('placeholder' => '登入密碼')) }}
                    </div>
                    <div>
                        <button class="btn btn-blue btn-block" href="../dashboard/dashboard.html">
                            Login <i class="icon-signin"></i>
                        </button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop
