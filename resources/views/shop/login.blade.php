<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/burger.ico" type="image/x-icon">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <title>CYFood</title>
    <style>
        body{
            background: center/cover no-repeat  url("../img/chairs-dining-room-dinner-460537.jpg") ;
            font-family:"Microsoft JhengHei";
        }

        .login {
            
            margin-top: 18%;
            padding: 20px 30px 30px 30px;
            /* border:1px solid rgba(255, 166, 0, 0.856) ; */
            background-color: rgba(255, 255, 255, 0.856) ;
            box-shadow: 0.5px 1px 2px 1px rgba(145, 139, 139, 0.7);
        }

        .logintitle {
            color: #333;
            font-size: 2rem;
            line-height: 1em;
            padding: 16px 0;
            text-align: center;
            border-bottom: 1px solid #c2c2c2;
        }

        .btn {
            background-color: orange;
            border-color: orange;
            font-weight: bold;
            font-family: fantasy;
        }

        .btn:hover {
            background-color: rgba(255, 166, 0, 0.856);
            border-color: rgba(255, 166, 0, 0.856);
        }

        .resetalert{
            color:red;
            font-size: 20px;
        }


    </style>
</head>

<body>
    <div class="container col-md-6">
        <div class="login">
            <h3 class=" logintitle">餐廳登入</h3>
            <div class="login-form  w-100" id="login-form">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="loginEmail">電子郵件</label>
                        <input v-model="loginEmail" type="email" class="form-control" id="loginEmail" name="loginEmail">
                    </div>
                    <div class="form-group">
                        <label for="loginEmail">密碼</label>
                        <input v-model="loginPassword" type="password" class="form-control" id="loginEmail" name="loginPassword">
                        <span v-if="space" class="resetalert">電子郵件或密碼不能為空</span>
                        <span v-if="checklogin" class="resetalert">電子郵件或密碼錯誤</span>
                    </div>

                    <button type="button" v-on:click="rlogin" class="btn btn-primary btn-block btn-lg">登入</button>
                    
                </form>
            </div>

        </div>
    </div>
    <script>
        //登入驗證
        var rloginform = new Vue({
            el: "#login-form",
            data: {
                loginEmail: '',
                loginPassword: '',
                space: false,
                checklogin: false
            },
            methods: {
                rlogin: function () {
                    let self = this;
                    if (this.loginEmail == '' || this.loginPassword == '') {
                        this.space = true;
                    } else {
                        this.space = false;
                        this.checklogin = false;
                        axios.post('/shop/login/check', {
                                loginEmail: this.loginEmail,
                                loginPassword: this.loginPassword
                            })
                            .then(function (response) {
                                console.log(response.data['ok']);
                                if (response.data['ok']) {
                                    console.log(response.data['id']);
                                    let id = response.data['id'];
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
                                            window.location = "/shop/newOrder/"+id;
                                        }
                                    })
                                } else {
                                    self.checklogin = true;
                                }

                            })
                            .catch(function (response) {
                                console.log(response)
                            });

                    }
                }
            }
        })
    </script>
</body>

</html>
