@extends('layouts.layout')

@section('content')
    <div class="container-fluid alignCenter" id="userProfileBgDiv">
        <div class="col-sm-6" id="blankDiv">
        </div>
        <div class="col-sm-4 col-12" id="userProfileOuterDiv">
            <div class="d-flex flex-column" id="userProfileInnerDiv">
                <div class="mb-3 ml-2 container">
                    <h5>基本資料</h5>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4" id="userImgDiv">
                        <img src="img/user1.png" alt="">
                    </div>
                    <div class="col-sm-8 col-8">
                        <div class="mt-4">
                            <h6>Leonardo DiCaprio</h6>
                            <div class="input-group-sm">
                                <input type="text" class="form-control" id="userProfileName" placeholder="Leonardo DiCaprio">
                            </div>
                        </div>
                        <div>
                            <h5>·········</h5>
                            <div class="input-group-sm">
                                <input type="password" class="form-control" id="userProfilePassword" placeholder="Password" value="123456789">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4">
                        <h6 class="floatRight">Tel</h6>
                    </div>
                    <div class="col-sm-8 col-8">
                        <h6>0987654321</h6>
                        <div class="input-group-sm">
                            <input type="text" class="form-control" id="userProfilePhone" placeholder="0987654321">
                        </div>
                    </div>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4">
                        <h6 class="floatRight">E-mail</h6>
                    </div>
                    <div class="col-sm-8 col-8">
                        <h6>a123456789@gmail.com</h6>
                        <div class="input-group-sm">
                            <input type="email" class="form-control" id="userProfileEmail" placeholder="a123456789@gmail.com">
                        </div>
                        <div class="form-check alignCenter">
                            <small>
                                <input class="form-check-input" type="checkbox" value="" id="Check1">
                                <label class="form-check-label" for="Check1">
                                    是否訂閱電子報
                                </label>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4">
                        <h6 class="floatRight">信用卡號</h6>
                    </div>
                    <div class="col-sm-8 col-8">
                        <h6>1654 - 4654 - 5612 - 1616</h6>
                        <div class="input-group input-group-sm creditInputWidth" id="creditInputGroup">
                            <input type=text class="form-control" name=creditInput1 size=4 value="" placeholder="1654" maxlength=4>&nbsp;-&nbsp;
                            <input type=text class="form-control" name=creditInput2 size=4 value="" placeholder="4654" maxlength=4>&nbsp;-&nbsp;
                            <input type=text class="form-control" name=creditInput3 size=4 value="" placeholder="5612" maxlength=4>&nbsp;-&nbsp;
                            <input type=text class="form-control" name=creditInput4 size=4 value="" placeholder="1616" maxlength=4>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-warning floatRight" id="changeBtn">變更資料</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // 卡號判斷
        $(document).ready(function(){
            $('#creditInputGroup').children('input').keyup(function(e){
                // 限制只能輸入數字
                if(!/^\d+$/.test(this.value)){
                    var newValue = /^\d+/.exec(this.value); 
                    newValue != null ? $(this).val(newValue) : $(this).val('');
                }
                // 自動跳行
                this.value.length == this.getAttribute('maxlength') && $(this).next().focus();
            });
        });
            </script>
@endsection