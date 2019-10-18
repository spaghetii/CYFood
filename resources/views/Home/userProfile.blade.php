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
                                    <input type="text" class="form-control" v-model="MemberName" id="userProfileName" :placeholder="profile.MemberName" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5 class="userProfileDisplay">·········</h5>
                                <div class="input-group-sm userProfileHidden">
                                    <input type="password" class="form-control" v-model="MemberPassword" id="userProfilePassword" placeholder="Password" value="123456789" required>
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
                            <input type="text" class="form-control" v-model="MemberPhone" id="userProfilePhone" :placeholder="profile.MemberPhone" required>
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
                                <input type="email" class="form-control" v-model="MemberEmail" id="userProfileEmail" :placeholder="profile.MemberEmail" required>
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
                            <h6>1654 - 4654 - 5612 - 1616</h6>
                        </div>
                        <div class="input-group input-group-sm creditInputWidth userProfileHidden col-sm-8 col-8" id="creditInputGroup">
                            <input type=text class="form-control" name=creditInput1 size=4 value="" placeholder="1654" maxlength=4>&nbsp;-&nbsp;
                            <input type=text class="form-control" name=creditInput2 size=4 value="" placeholder="4654" maxlength=4>&nbsp;-&nbsp;
                            <input type=text class="form-control" name=creditInput3 size=4 value="" placeholder="5612" maxlength=4>&nbsp;-&nbsp;
                            <input type=text class="form-control" name=creditInput4 size=4 value="" placeholder="1616" maxlength=4>
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


        // 顯示Profile Div btn
        var displayApp = new Vue ({
                el: '#userProfileOuterDiv',
                data:{
                    profile:[],
                    userID:'',
                    MemberName:"",
                    MemberPassword:"",
                    MemberPhone:"",
                    MemberEmail:""
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
                                MemberPassword:this.MemberPassword,
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
                                            self.MemberPassword="";
                                        }
                                    })   
                                }
                            })
                    }
                },
                mounted: function (){
                    
                    console.log(localStorage.getItem('memberID'));
                    this.userID = localStorage.getItem('memberID');
                    this.init();
                }
            });
        
            console.log(navBar.navlogin);
            </script>
@endsection