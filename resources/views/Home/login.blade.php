<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="container">
        <div class=" back">
            <!-- Columns are always 50% wide, on mobile and desktop -->
            <div class="login-register">
                <h2 class="title">登入或註冊帳戶前往選購餐點</h2>
                <div class=" col-md-5 col-12 w-100  login">
                    <h3 class="logintitle">登入</h3>
                    <div class="login-form " id="login-form">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="loginEmail">電子郵件</label>
                                <input type="email" class="form-control" id="loginEmail" name="loginEmail">
                            </div>
                            <div class="form-group">
                                <label for="loginEmail">密碼 </label>
                                <input type="password" class="form-control" id="loginEmail" name="loginPassword">
                                <a href="#resetModal" data-toggle="modal" data-target="#resetModal" >忘記密碼</a>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-lg">登入</button>
                        </form>
                    </div>

                </div>

                <div class="col-md-5 col-12 w-100 register">
                    <h3 class="registertitle">註冊</h3>
                    <div class="register-form" id="register-form">
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
                                <input type="password" class="form-control" id="registerPassword"
                                    name="registerPassword">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-lg">註冊</button>
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
                    <form method="post" action="/reset">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">請輸入電子郵件</label>
                            <input v-model="email" type="text" class="form-control" id="email" name="email">
                            <span v-if="checkemail" class="resetalert">請輸入正確的電子郵件</span>
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
        var reset = new Vue({
            el: "#resetModal",
            data: {
                email: '',
                checkemail: false
            },
            methods: {
                submit: function () {
                    let self = this;
                    this.checkemail = false;
                    axios.post('/reset', {email:this.email})
                        .then(function (response) {
                            console.log(response);
                            if (response.data['ok']) {
                                Swal.fire({
                                    type: 'success',
                                    title: '已送出更改密碼的請求',
                                    html:
                                        '請貴用戶到您的信箱查看, ' +
                                        '並執行更改密碼的後續作業<br> ' +
                                        '本畫面於6秒後回到首頁',
                                    showConfirmButton: false,
                                    timer: 6000
                                    })
                                    setTimeout(function () {
                                        window.location.href = "/"; //will redirect to your blog page (an ex: blog.html)
                                        }, 6000);
                            }else{
                                self.checkemail = true;
                                self.email= '';
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
