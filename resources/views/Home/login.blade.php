@extends('layouts.layout')


@section('login')
<link rel="stylesheet"  href="css/login.css">
@endsection

@section('content')

<div class="container container-fluid">
    
    <!-- Columns are always 50% wide, on mobile and desktop -->
    <div class="login-register">
        <h2 class="title">登入或註冊帳戶前往選購餐點</h2>
        <div class=" col-md-5 login">
            <h3 class="logintitle">登入</h3>
            <div class="login-form tab-pane fade show active" id="#login-form">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="loginEmail">電子郵件</label>
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail">
                    </div>
                    <div class="form-group">
                        <label for="loginEmail">密碼</label>
                        <input type="password" class="form-control" id="loginEmail" name="loginPassword">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">登入</button>
                </form>
            </div>

        </div>

        <div class="col-md-5 register">
            <h3 class="registertitle">註冊</h3>
            <div class="register-form" id="#register-form">
                <form action="/member" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="registerName">暱稱</label>
                        <input type="text" class="form-control" id="registerName" name="registerName">
                    </div>
                    <div class="form-group ">
                        <label for="registerEmail">電子郵件</label>
                        <input type="email" class="form-control" id="registerEmail" name="registerEmail">
                    </div>
                    <div class="form-group ">
                        <label for="registerPhone">手機號碼</label>
                        <input type="text" class="form-control" id="registerPhone" name="registerPhone">
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">密碼</label>
                        <input type="password" class="form-control" id="registerPassword" name="registerPassword">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">註冊</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
