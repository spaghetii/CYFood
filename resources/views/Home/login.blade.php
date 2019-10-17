<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        if (localStorage.getItem("memberID")) {
            window.location.href="/loginHomepage";
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CYFood</title>
    <!-- 網頁 icon -->
    <link rel="icon" href="img/burger.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- Vue --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    {{-- axios --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    {{-- 網頁CSS --}}
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    {{-- 登入註冊 --}}
    <div class="container ">
        <div class=" back">
            <!-- Columns are always 50% wide, on mobile and desktop -->
            <div class="login-register d-flex justify-content-center flex-wrap">
                <h2 class="title">登入或註冊帳戶前往選購餐點</h2>
                <div class=" col-md-5 col-12 w-100  login">
                    <h3 class="logintitle">登入</h3>
                    <div class="login-form " id="login-form">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="loginEmail">電子郵件</label>
                                <input v-model="loginEmail" type="email" class="form-control" id="loginEmail"
                                    name="loginEmail">
                            </div>
                            <div class="form-group">
                                <label for="loginEmail">密碼 </label>
                                <input v-model="loginPassword" type="password" class="form-control" id="loginPassword"
                                    name="loginPassword">
                                <a href="javascript:void(0);" v-on:click="resetModal">忘記密碼</a><br>
                                <span v-cloak v-if="space" class="resetalert">電子郵件或密碼不能為空</span>
                                <span v-cloak v-if="checklogin" class="resetalert">電子郵件或密碼錯誤</span>
                                <span v-cloak v-if="suspended" class="resetalert">此帳號已停權，請聯絡本公司</span>
                            </div>

                            <button v-on:click="login" type="button"
                                class="btn btn-primary btn-block btn-lg btn-login">登入</button>
                        </form>
                    </div>
                </div>

                {{-- 註冊form --}}
                <div class="col-md-5 col-12 w-100 register">
                    <h3 class="registertitle">註冊</h3>
                    <div class="register-form" id="register-form">
                        <form action="/member" method="POST">
                            @csrf
                            <div class="form-group ">
                                <label for="registerName">暱稱</label>
                                <input type="text" class="form-control" v-model="registerName" id="registerName"
                                    name="registerName">
                            </div>
                            <div class="form-group ">
                                <label for="registerEmail">電子郵件</label>
                                <span v-cloak v-if="checkEmail" class="resetalert ">@{{errorEmail}}</span>
                                <span v-cloak v-if="okEmail" class="okalert ">@{{okMsg}}</span>
                                <input type="email" class="form-control" v-model.lazy="registerEmail" id="registerEmail"
                                    name="registerEmail">
                            </div>
                            <div class="form-group ">
                                <label for="registerPhone">手機號碼</label>
                                <input type="text" class="form-control" v-model="registerPhone" id="registerPhone"
                                    name="registerPhone">
                            </div>
                            <div class="form-group">
                                <label for="registerPassword">密碼</label>
                                <input type="password" class="form-control" v-model="registerPassword"
                                    id="registerPassword" name="registerPassword">
                            </div>
                            <span v-cloak v-if="checkRegister" class="resetalert ">@{{errorMsg}}</span>
                            <button type="button" v-on:click="register"
                                class="btn btn-primary btn-block btn-lg">註冊</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 忘記密碼Modal --}}
    <div id="resetModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">忘記密碼</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">請輸入電子郵件</label>
                            <input v-model="email" type="text" class="form-control" id="email" name="email">
                            <span v-if="repeatEmail" class="resetalert">請輸入正確的電子郵件</span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" v-on:click="submit" class="btn btn-primary">送出</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        //防止登入後還能進來登入頁 待改進
        // $(document).ready(function(){
        //     
        // })
        //登入相關
        var loginform = new Vue({
            el: "#login-form",
            data: {
                loginEmail: '',
                loginPassword: '',
                space: false,
                checklogin: false,
                suspended:false
            },
            methods: {
                login: function () {
                    let self = this;
                    if (this.loginEmail == '' || this.loginPassword == '') {
                        this.space = true;
                    } else {
                        this.space = false;
                        this.checklogin = false;
                        this.suspended = false;
                        axios.post('/login/check', {
                                loginEmail: this.loginEmail,
                                loginPassword: this.loginPassword
                            })
                            .then(function (response) {
                                console.log(response.data['ok']);
                                if (response.data['ok']) {
                                    
                                    localStorage.setItem("memberID",response.data['id']);
                                    
                                    // console.log(response.data['id']);
                                    
                                    Swal.fire({
                                        type: 'success',
                                        title: '登入成功',
                                        html: '本畫面於<strong></strong>秒後跳轉頁面',
                                        timer: 3000,
                                        onBeforeOpen: () => {
                                            Swal.showLoading()
                                            timerInterval = setInterval(() => {
                                                Swal.getContent().querySelector(
                                                        'strong')
                                                    .textContent = parseInt(Math
                                                        .ceil(Swal.getTimerLeft() /
                                                            1000))
                                            }, 100)
                                        },
                                        onClose: () => {
                                            clearInterval(timerInterval);
                                            window.self.location=window.document.referrer;  
                                            
                                        }
                                    })
                                } else {
                                    if(response.data['Permission']){
                                        self.suspended = true;
                                    }else{
                                        self.checklogin = true;
                                    }
                                }

                            })
                            .catch(function (response) {
                                console.log(response)
                            });

                    }
                },
                resetModal:function(){
                    reset.repeatEmail = false;
                    $("#resetModal").modal( { backdrop: "static" } );
                }
            }
        })

        //註冊相關
        var registerform = new Vue({
            el: "#register-form",
            data: {
                registerName: '',
                registerEmail: '',
                registerPhone: '',
                registerPassword: '',
                checkEmail: false,
                errorEmail: '',
                checkRegister: false,
                errorMsg: '',
                okEmail:false,
                okMsg:''
            },
            watch:{
                registerEmail:function(){
                    this.errorEmail = "";
                    this.okMsg="";
                    let reg = /^\w+([.-]\w+)*@\w+([.-]\w+)*$/;
                    if(this.registerEmail == ""){
                        this.checkEmail = false;
                    }
                    else if (!reg.test(this.registerEmail)) {
                        this.checkEmail = true;
                        this.errorEmail = "請輸入正確的格式";
                    }else{
                        this.checkEmail = false;
                        let self = this;
                        axios.post('/login/checkReID', {
                                registerEmail: this.registerEmail,
                            })
                            .then(function (response) {
                                console.log(response.data['ok']);
                                if (response.data['ok']) {
                                    self.okEmail = true;
                                    self.okMsg = "電子郵件無重複";
                                } else {
                                    self.checkEmail = true;
                                    self.errorEmail = "電子郵件重複，請更換別的電子郵件";
                                }

                            })
                            .catch(function (response) {
                                console.log(response)
                            });
                    }
                }
            },
            methods: {
                register: function () {
                    this.checkRegister = false;
                    this.errorMsg = "";
                    var self = this;
                    if (this.registerName == "" || this.registerEmail == "" ||
                        this.registerPhone == "" || this.registerPassword == "") {
                        this.checkRegister = true;
                        this.errorMsg = "欄位不能為空"
                    } else {
                        axios.post('/login/checkRe', {
                                    registerName: this.registerName,
                                    registerEmail: this.registerEmail,
                                    registerPhone: this.registerPhone,
                                    registerPassword: this.registerPassword
                            })
                            .then(function (response) {
                                console.log(response.data['ok']);
                                if (response.data['ok']) {
                                    Swal.fire({
                                        type: 'success',
                                        title: '<strong>註冊成功</strong>',
                                        html: '為了慶祝CYFood開幕<br>'+
                                              '目前每位新用戶註冊都贈送免運費優惠券<br>'+
                                              '請妥善保存<br>'+
                                              '代碼:'+response.data['coupon'],
                                        confirmButtonText:
                                            '我知道了!'
                                    }).then((result) => {
                                        console.log(result.value);
                                        if (result.value) {
                                            self.registerName = "";
                                            self.registerEmail = "";
                                            self.registerPhone = "";
                                            self.registerPassword = "";
                                            self.checkRegister = false;
                                            self.okEmail = false;
                                        }
                                        })
                                } else {
                                    self.checkEmail = true;
                                    self.errorEmail = "電子郵件重複，請更換別的電子郵件";
                                }

                            })
                            .catch(function (response) {
                                console.log(response)
                            });
                    }

                }
            }

        })
        //忘記密碼相關
        var reset = new Vue({
            el: "#resetModal",
            data: {
                email: '',
                repeatEmail: false
            },
            methods: {
                submit: function () {
                    let self = this;
                    this.checkemail = false;
                    axios.post('/reset', {
                            email: this.email
                        })
                        .then(function (response) {
                            console.log(response);
                            if (response.data['ok']) {
                                Swal.fire({
                                    type: 'success',
                                    title: '已送出更改密碼的請求',
                                    html: '請貴用戶到您的信箱查看, ' +
                                        '並執行更改密碼的後續作業<br> ' +
                                        '本畫面於5秒後回到首頁',
                                    showConfirmButton: false,
                                    timer: 5000
                                })
                                setTimeout(function () {
                                    window.location.href ="/"; 
                                        
                                }, 5000);
                            } else {
                                self.repeatEmail = true;
                                self.email = '';
                            }
                        })
                        .catch(function (response) {
                            console.log(response)
                        });
                }
            }
        })

    </script>
</body>



</html>
