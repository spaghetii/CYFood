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
                        <img src="/img/user1.png" alt="">
                    </div>
                    <div class="col-sm-8 col-8">
                        <div class="mt-4 mb-3" v-cloak>
                        <h6 class="userProfileDisplay">@{{profile.MemberName}}</h6>
                            <div class="input-group-sm userProfileHidden">
                                <input type="text" class="form-control" v-model="MemberName" 
                                    v-on:blur="memberNameBlur" v-bind:class="{ 'is-invalid': memberNameError }"
                                    id="userProfileName" placeholder="中、英、數字，最大18個字" required>
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
                        <h6 class="floatRight">E-mail</h6>
                    </div>
                    <div class="col-sm-8 col-8" v-cloak>
                        <h6>@{{profile.MemberEmail}}</h6>
                    </div>
                    <div class="col-sm-8 col-8">
                        {{-- <div class="input-group-sm userProfileHidden">
                            <input type="email" class="form-control" v-model="MemberEmail" id="userProfileEmail"
                            v-on:blur="memberEmailBlur" v-bind:class="{ 'is-invalid': memberEmailError }"
                            :placeholder="profile.MemberEmail">
                        </div> --}}
                        {{-- <div class="form-check alignCenter userProfileHidden">
                            <small>
                                <input class="form-check-input" type="checkbox" value="" id="Check">是否訂閱電子報
                            </small>
                        </div> --}}
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
                        <input type="text" class="form-control" v-model="MemberPhone" 
                            v-on:blur="memberPhoneBlur" v-bind:class="{ 'is-invalid': memberPhoneError }"
                            id="userProfilePhone" placeholder="例 : 0987654321" required>
                    </div>
                </div>
                <div class="container-fluid alignCenter mb-3" v-if="profile.MemberCredit != null">
                    <div class="col-sm-4 col-4">
                        <h6 class="floatRight">信用卡</h6>
                    </div>
                    <div class="col-sm-8 col-8 userProfileDisplay">
                        <h6>@{{profile.MemberCredit}}</h6>
                    </div>
                    <div class="d-flex flex-column container-fluid col-sm-8 col-8">
                        <div class="input-group input-group-sm creditInputWidth userProfileHidden mb-1 col-12 noPad" id="creditInputGroup">
                            <input type="text" class="form-control" name="creditInput" v-on:blur="creditInputBlur" v-bind:class="{ 'is-invalid': creditInputError }" v-model="creditInput" id="creditCardInput" size="19" maxlength="19" placeholder="輸入卡號16個數字" required>
                            <div class="invalid-feedback">
                                @{{ creditCardErrMsg }}
                            </div>   
                        </div>
                        <div class="d-flex flex-row">
                            <div class="input-group input-group-sm creditInputWidth userProfileHidden mb-1 mr-1 noPad" id="creditInputGroup1">
                                <input type="text" class="form-control" name="creditInputDate" 
                                    v-on:blur="creditInputDateBlur" 
                                    v-bind:class="{ 'is-invalid': creditInputDateError }" 
                                    v-model="creditInputDate" id="creditInputDate" size="5" maxlength="5" required placeholder="MM/YY">
                                <div class="invalid-feedback">
                                    @{{ creditInputDateErrMsg }}
                                </div>   
                            </div>
                            <div class="input-group input-group-sm creditInputWidth userProfileHidden noPad" id="creditInputGroup1">
                                <input type="password" class="form-control" name="creditInputSafe" 
                                    v-on:blur="creditInputSafeBlur" 
                                    v-bind:class="{ 'is-invalid': creditInputSafeError }" 
                                    v-model="creditInputSafe" id="creditInputSafe" size="3" maxlength="3" required placeholder="安全碼">
                                <div class="invalid-feedback">
                                    @{{ creditInputSafeErrMsg }}
                                </div>   
                            </div>
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
                        <input type="password" class="form-control" name="oldPasswd" v-on:blur="oldPasswdCheckBlur" v-bind:class="{ 'is-invalid': oldPasswdError }" v-model="oldPasswd" required>
                        <div class="invalid-feedback">
                            @{{ oldPasswdErrMsg }}
                        </div>
                    </div>
                    <div>
                        <label>新密碼</label>
                        <input type="password" class="form-control" name="newPasswd" v-model="newPasswd" v-bind:class="{ 'is-invalid': newPasswdError }" required>
                        <div class="invalid-feedback">
                            @{{ newPasswdErrMsg }}
                        </div>
                    </div>
                    <div>
                        <label>確認新密碼</label>
                        <input type="password" class="form-control" name="newPasswdCheck" v-on:blur="newPasswdCheckBlur" v-bind:class="{ 'is-invalid': newPasswdCheckError }" v-model="newPasswdCheck" required>
                        <div class="invalid-feedback">
                            @{{ newPasswdCheckErrMsg }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:30%" v-on:click="passwdCancelClick">取消</button>
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
                    userID:0,
                    MemberName:"",
                    memberNameError: false,
                    MemberPassword:"",
                    MemberPhone:"",
                    memberPhoneError:false,
                    MemberEmail:"",
                    memberEmailError:false,
                    creditInput: '',
                    creditInputError: false,
                    creditCardErrMsg: '',
                    creditInputDate: '',
                    creditInputSafe: '',
                    creditInputDateError: false,
                    creditInputDateErrMsg: '',
                    creditInputSafeError: false,
                    creditInputSafeErrMsg: '',
                },
                watch: {
                    creditInput: function () {
                        // 四字元補空格
                        this.creditInput = this.creditInput.replace(/(\d{4})(?=\d)/g, "$1-");                
                    },
                    creditInputDate: function () {
                        this.creditInputDate = this.creditInputDate.replace(/(\d{2})(?=\d)/g, "$1/");
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
                        $(".userProfileDisplay,#changeProfileBtn,.emailDisplay").css("display", "none");
                    },
                    // 隱藏Profile Div btn
                    clickHiddenChangeBtn: function(){
                        $(".userProfileHidden").css("display", 'none');
                        $(".changeProfileBtnDiv").css("display", 'none');
                        $(".userProfileDisplay,#changeProfileBtn").css("display", "block");
                        $(".emailDisplay").css("display", 'inline-flex');
                    },
                    profileChange: function(){
                        let self = this;
                        axios.put('/api/member/changeprofile/'+this.profile.MemberID, 
                            {
                                MemberName:this.MemberName,
                                MemberPhone:this.MemberPhone,
                                MemberCredit:this.creditInput,
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
                                            self.creditInput="";
                                            self.creditInputDate='';
                                            self.creditInputSafe='';
                                        }
                                    })   
                                }
                            })
                    },
                    // input 失去焦點後 驗證格式
                    creditInputBlur: function () {
                        let checkCredit = this.creditInput.replace(/-/g, '');
                        let isCredit = /^\d+$/;
                        if(checkCredit == "" ) {
                            this.creditInputError = false;
                            return;
                        }
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
                    memberNameBlur:function () {
                        let reg = /^[\u4e00-\u9fa5_a-zA-Z0-9]{1,18}$/;
                        if(this.MemberName == "" ) {
                            this.memberNameError = false;
                            return;
                        }
                        if(!reg.test(this.MemberName)) {
                            this.memberNameError = true;
                            return;
                        }
                        this.memberNameError = false;
                    },
                    memberPhoneBlur:function(){
                        let reg = /^09\d{8}$/;
                        if(this.MemberPhone == "" ) {
                            this.memberPhoneError = false;
                            return;
                        }
                        if(!reg.test(this.MemberPhone)) {
                            this.memberPhoneError = true;
                            return;
                        }
                        this.memberPhoneError = false;
                    },
                    memberEmailBlur:function(){
                        let reg = /^\w+([.-]\w+)*@\w+([.-]\w+)*$/;
                        if(this.MemberEmail == "" ) {
                            this.memberEmailError = false;
                            return;
                        }
                        if(!reg.test(this.MemberEmail)) {
                            this.memberEmailError = true;
                            return;
                        }
                        this.memberEmailError = false;
                    },
                    creditInputDateBlur: function () {
                        let checkCredit = this.creditInputDate.replace(/\//g, '');
                        let isCredit =  /^[0-9\s]*$/;
                        let checkMonth = checkCredit.substring(0,2);
                        if ( checkCredit == "" ){
                            this.creditInputDateError = false;
                        } else {
                                if (!isCredit.test(checkCredit)) {
                                this.creditInputDateError = true;
                                this.creditInputDateErrMsg = '請輸入數字';
                            } else if (checkCredit.length < 4) {
                                this.creditInputDateError = true;
                                this.creditInputDateErrMsg = '請再確認有效期限';
                            } else if (parseInt(checkMonth) >= 13 ||  checkMonth == 00) {
                                this.creditInputDateError = true;
                                this.creditInputDateErrMsg = '請正確輸入月份';
                            } else {
                                this.creditInputDateError = false;
                            }
                        }
                    },
                    creditInputSafeBlur: function () {
                        let isCredit =  /^[0-9\s]*$/;
                        if ( this.creditInputSafe == "" ){
                            this.creditInputSafeError = false;
                        } else {
                                if (!isCredit.test(this.creditInputSafe)) {
                                this.creditInputSafeError = true;
                                this.creditInputSafeErrMsg = '請輸入數字';
                            } else if (this.creditInputSafe.length < 3) {
                                this.creditInputSafeError = true;
                                this.creditInputSafeErrMsg = '請完整輸入安全碼';
                            } else {
                                this.creditInputSafeError = false;
                            }
                        }
                    },
                },
                mounted: function (){
                    let test = (location.href).split("/");
                    this.userID = test[test.length-1];
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
                userID:'',
            },
            methods: {
                oldPasswdCheckBlur: function () {
                    var _this = this;
                    axios.post('/api/member/checkpwd/'+this.userID,{
                            MemberPassword: this.oldPasswd,
                    })
                    .then(function (response) {
                        console.log(response.data['passwordError']);
                        if (response.data['passwordError']){
                            _this.oldPasswdError = true;
                            _this.oldPasswdErrMsg = '請輸入正確密碼';
                            return;
                        }
                        _this.oldPasswdError = false;
                    })
                    .catch(function (response) {
                        console.log(response);
                    });
                },
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
                    let _this = this;
                    axios.put('/api/member/changepwd/'+this.userID, {
                        MemberPassword: this.newPasswdCheck,
                    })
                    .then(function (response) {
                        if (response.data['ok']) {
                            Swal.fire({
                                type: 'success',
                                title: '修改密碼成功',
                            }).then((result) => {
                                console.log(result.value);
                                if (result.value) {
                                    $('#passwardChangeModal').modal('toggle');
                                    _this.oldPasswd= '';
                                    _this.newPasswd= '';
                                    _this.newPasswdCheck= '';
                                }
                            })   
                        }               
                    })
                },
                passwdCancelClick: function(){
                    this.oldPasswd= '';
                    this.newPasswd= '';
                    this.newPasswdCheck= '';
                    this.newPasswdError = false;
                    this.newPasswdCheckError = false;
                    this.oldPasswdError = false;
                },
            },
            mounted: function (){
                this.userID = localStorage.getItem('memberID');
            }
        })
            </script>


@endsection
{{-- test123 --}}