@extends('layouts.layout')

@section('content')
    <div class="container-fluid alignCenter" id="userProfileBgDiv">
        <div class="col-sm-6" id="blankDiv">
        </div>
        <div class="col-sm-4 col-12 displayProfileDivApp" id="userProfileOuterDiv">
        <form v-on:submit.prevent="profileChange">
            <div class="d-flex flex-column" id="userProfileInnerDiv">
                <div class="mb-3 ml-2 container">
                    <h5>基本資料</h5>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4" id="userImgDiv">
                        <img src="img/user1.png" alt="">
                    </div>
                
                    <div class="col-sm-8 col-8">
                        <div class="mt-4 mb-3" v-cloak>
                        <h6 class="userProfileDisplay">@{{profile.MemberName}}</h6>
                            <div class="input-group-sm userProfileHidden">
                                <input type="text" class="form-control" v-model="MemberName" id="userProfileName" placeholder="請輸入暱稱" required>
                            </div>
                        </div>
                        <div class="userProfileHidden">
                            <div class="bgOrange textWhite" id="passwardChangeBtn" data-toggle="modal" data-target="#passwardChangeModal">
                                更改密碼
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4">
                        <h6 class="floatRight">Tel</h6>
                    </div>
                    <div class="col-sm-8 col-8 userProfileDisplay" v-cloak>
                        <h6>@{{profile.MemberPhone}}</h6>           
                    </div>
                    <div class="input-group-sm col-sm-8 col-8 userProfileHidden">
                        <input type="text" class="form-control" v-model="MemberPhone" id="userProfilePhone" placeholder="請輸入電話" required>
                    </div>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4">
                        <h6 class="floatRight">E-mail</h6>
                    </div>
                    <div class="col-sm-8 col-8 userProfileDisplay" v-cloak>
                        <h6>@{{profile.MemberEmail}}</h6>
                    </div>
                    <div class="col-sm-8 col-8">
                        <div class="input-group-sm userProfileHidden">
                            <input type="email" class="form-control" v-model="MemberEmail" id="userProfileEmail" placeholder="請輸入E-mail" required>
                        </div>
                        <div class="form-check alignCenter userProfileHidden">
                            <small>
                                <input class="form-check-input" type="checkbox" value="" id="Check">是否訂閱電子報
                            </small>
                        </div>
                    </div>
                </div>
                <div class="container-fluid alignCenter mb-3">
                    <div class="col-sm-4 col-4">
                        <h6 class="floatRight">信用卡號</h6>
                    </div>
                    <div class="col-sm-8 col-8 userProfileDisplay">
                        <h6>1654-4654-5612-1616</h6>
                    </div>
                    <div class="input-group input-group-sm creditInputWidth userProfileHidden col-sm-8 col-8" id="creditInputGroup">
                        <input type="text" class="form-control" name="creditInput" v-on:blur="creditInputBlur" v-bind:class="{ 'is-invalid': creditInputError }" v-model="creditInput" id="creditCardInput" size="19" maxlength="19" required>
                        <div class="invalid-feedback">
                            @{{ creditCardErrMsg }}
                        </div>
                    </div>
                </div>
                {{-- 確認 Btn --}}
                <div>
                    <button type="button" class="btn btn-warning floatRight changeProfileBtn mt-3" id="changeProfileBtn" v-on:click="clickDispayProfileBtn">變更資料</button>
                </div>
                {{-- 取消和儲存 Btn --}}
                <div class="changeProfileBtnDiv mt-4">
                    <button type="submit" class="btn btn-warning floatRight changeProfileBtn" >儲存</button>
                    <button type="button" class="btn btn-secondary floatRight changeProfileBtn mr-2" v-on:click="clickHiddenChangeBtn">取消</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <!-- passwardChangeModal -->
    <div class="modal fade" id="passwardChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">更改密碼</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="/img/close1.png" alt=""></span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div>
                        <label>舊密碼</label>
                        <input type="text" class="form-control" name="oldPasswd" v-bind:class="{ 'is-invalid': oldPasswdError }" v-model="oldPasswd" required>
                        <div class="invalid-feedback">
                            @{{ oldPasswdErrMsg }}
                        </div>
                    </div>
                    <div>
                        <label>新密碼</label>
                        <input type="text" class="form-control" name="newPasswd" v-model="newPasswd" v-bind:class="{ 'is-invalid': newPasswdError }" required>
                        <div class="invalid-feedback">
                            @{{ newPasswdErrMsg }}
                        </div>
                    </div>
                    <div>
                        <label>確認新密碼</label>
                        <input type="text" class="form-control" name="newPasswdCheck" v-on:blur="newPasswdCheckBlur" v-bind:class="{ 'is-invalid': newPasswdCheckError }" v-model="newPasswdCheck" required>
                        <div class="invalid-feedback">
                            @{{ newPasswdCheckErrMsg }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:30%">取消</button>
                <button type="button" class="btn btn-warning" style="width:30%" v-on:click="passwdChangeClick">儲存</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // 顯示Profile Div btn
        var displayApp = new Vue ({
                el: '#userProfileOuterDiv',
                data:{
                    profile:[],
                    userID:'',
                    MemberName:"",
                    MemberPassword:"",
                    MemberPhone:"",
                    MemberEmail:"",
                    creditInput: '',
                    creditInputError: false,
                    creditInputCorrect: false,
                    creditCardErrMsg: '',
                },
                watch: {
                    creditInput: function () {
                        // 四字元補空格
                        this.creditInput = this.creditInput.replace(/(\d{4})(?=\d)/g, "$1-");                
                    },
                },
                methods:{
                    init: function(){
                        var _this = this;
                        
                        axios.get('/api/member/'+this.userID)
                        .then(function (response) {
                            _this.profile = response.data;
                            console.log(_this.profile);
                        })
                        .catch(function (response) {
                            console.log(response);
                        });
                    },
                    // 顯示Profile Div btn
                    clickDispayProfileBtn: function(){
                        $(".userProfileHidden").css("display", 'inline-flex');
                        $(".changeProfileBtnDiv").css("display", 'block');
                        $(".userProfileDisplay,#changeProfileBtn").css("display", "none");
                    },
                    // 隱藏Profile Div btn
                    clickHiddenChangeBtn: function(){
                        $(".userProfileHidden").css("display", 'none');
                        $(".changeProfileBtnDiv").css("display", 'none');
                        $(".userProfileDisplay,#changeProfileBtn").css("display", "block");
                    },
                    profileChange: function(){
                        let self = this;
                        axios.put('/api/member/'+this.profile.MemberID, 
                            {
                                MemberName:this.MemberName,
                                MemberEmail:this.MemberEmail,
                                MemberPhone:this.MemberPhone,
                                // MemberPassword:this.MemberPassword,
                                MemberPermission:0
                            })
                            .then(function (response) {
                                if (response.data['ok']) {
                                    Swal.fire({
                                        type: 'success',
                                        title: '修改成功',
                                    }).then((result) => {
                                        if (result.value) {
                                            self.init(); //更新目前畫面
                                            $(".userProfileHidden").css("display", 'none');
                                            $(".changeProfileBtnDiv").css("display", 'none');
                                            $(".userProfileDisplay,#changeProfileBtn").css("display", "block");
                                            self.MemberName="";
                                            self.MemberEmail="";
                                            self.MemberPhone="";
                                            // self.MemberPassword="";
                                        }
                                    })   
                                }
                            })
                    },
                    // input 失去焦點後 驗證格式
                    creditInputBlur: function () {
                        let checkCredit = this.creditInput.replace(/-/g, '');
                        let isCredit = /^\d+$/;
                        if (!isCredit.test(checkCredit)) {
                            this.creditInputError = true;
                            this.creditCardErrMsg = '請輸入數字';
                        } else if (checkCredit.length < 16) {
                            this.creditInputError = true;
                            this.creditCardErrMsg = '請完整輸入卡號';
                        } else {
                            this.creditInputError = false;
                        }  
                    },
                },
                mounted: function (){
                    
                    console.log(localStorage.getItem('memberID'));
                    this.userID = localStorage.getItem('memberID');
                    this.init();
                }
            });
        
            console.log(navBar.navlogin);

            // passwardChangeModal
        var passwardChangeModalApp = new Vue ({
            el:'#passwardChangeModal',
            data: {
                oldPasswd: '',
                newPasswd: '',
                newPasswdCheck: '',
                oldPasswdError: false,
                newPasswdError: false,
                newPasswdCheckError: false,
                oldPasswdErrMsg: '',
                newPasswdErrMsg: '',
                newPasswdCheckErrMsg: '',
            },
            methods: {
                // newPasswdCheck 失去焦點後 驗證跟上方新密碼是否相同
                newPasswdCheckBlur: function () {
                    if (this.newPasswdCheck != this.newPasswd){
                        this.newPasswdError = true;
                        this.newPasswdCheckError = true;
                        this.newPasswdErrMsg = '輸入的新密碼不相同';
                        this.newPasswdCheckErrMsg = '輸入的新密碼不相同';
                    } else {
                        this.newPasswdError = false;
                        this.newPasswdCheckError = false;
                    }
                },
                passwdChangeClick: function() {
                    $('#passwardChangeModal').modal('hide');
                    this.oldPasswd= '';
                    this.newPasswd= '';
                    this.newPasswdCheck= '';
                },
            }
        })
            </script>


@endsection
{{-- test --}}