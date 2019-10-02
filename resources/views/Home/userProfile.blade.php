@extends('layouts.layout')

@section('content')
    <div class="container mt-5 mb-5" id="userProfileOuterDiv">
        <div class="container-fluid d-flex flex-row" id="userProfileInnerDiv">
            <div class="col-sm-2" id="userImgDiv">
                <img src="img/user1.png" alt="">
            </div>
            <div class="col-sm-3">
                <div class="mt-2 mb-3">
                    <h6>Leonardo DiCaprio</h6>
                </div>
                <div>
                    <h6>0987654321</h6>
                </div>
            </div>
            <div class="col-sm-7 textCenter">
                <div class="d-flex flex-row alignCenter mt-2 mb-4">
                    <div class="smallTitleWidth">
                        <h6>新增卡號</h6>
                    </div>
                    <div class="input-group input-group-sm smallInputWidth" id="creditInputGroup">
                        <input type=text class="form-control" name=creditInput1 size=4 value="" maxlength=4>&nbsp;-&nbsp;
                        <input type=text class="form-control" name=creditInput2 size=4 value="" maxlength=4>&nbsp;-&nbsp;
                        <input type=text class="form-control" name=creditInput3 size=4 value="" maxlength=4>&nbsp;-&nbsp;
                        <input type=text class="form-control" name=creditInput4 size=4 value="" maxlength=4>
                    </div>
                </div>
                <div class="d-flex flex-row alignCenter mb-4">
                    <div class="smallTitleWidth">
                        <h6>現有密碼</h6>
                    </div>
                    <div class="smallInputWidth input-group-sm">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="d-flex flex-row alignCenter mb-4">
                    <div class="smallTitleWidth">
                        <h6>新密碼</h6>
                    </div>
                    <div class="smallInputWidth input-group-sm">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="Check1">
                    <label class="form-check-label" for="Check1">
                        是否訂閱電子報
                    </label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="Check1">
                    <label class="form-check-label" for="Check1">
                        是否訂閱電子報
                    </label>
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