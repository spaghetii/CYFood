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
    <style>
        body {font-family:"Microsoft JhengHei";}
        .resetPassword {
            
            margin-top: 18%;
            padding: 20px 30px 30px 30px;
            /* border:1px solid rgba(255, 166, 0, 0.856) ; */
            background-color: rgba(255, 255, 255, 0.856) ;
            box-shadow: 0.5px 1px 2px 1px rgba(145, 139, 139, 0.7);
        }

        .title {
            color: #333;
            font-size: 2rem;
            line-height: 1em;
            padding: 16px 0;
            text-align: center;
            border-bottom: 1px solid #c2c2c2;
            margin-bottom: 20px;
        }

        .btn {
            background-color: orange;
            border-color: orange;
            font-weight: bold;
            font-family: fantasy;
            margin-top: 15px;
        }

        .btn:hover {
            background-color: rgba(255, 166, 0, 0.856);
            border-color: rgba(255, 166, 0, 0.856);
        }
        .wrongcheck{
            color:red;
            font-size: 25px;
            
        }

    </style>
</head>

<body>
    <div class="container col-md-5">
        <div class="resetPassword">
            <h3 class="title">重置密碼</h3>
            <div class="reset-form  w-100  " id="reset-form">
                <form method="post" action="/reset/resetpassword/">
                    @csrf
                    
                    <div class="form-group">
                        <label for="newPassword">輸入新密碼</label>
                        <input v-model="newPassword" type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="form-group">
                        <label for="repeatPassword">再輸入一次新密碼</label>
                        <input v-model="repeatPassword" type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                    </div>
                    <span v-if="wrongcheck" class="wrongcheck">您兩次輸入的密碼不一致</span> <br>
                    <button type="button" v-on:click="checkpassword" class="btn btn-primary btn-block btn-lg">送出</button>
                    
                </form>
            </div>

        </div>
    </div>

<script>
// alert('location.pathname: '+location.pathname);
var resetform = new Vue({
    el:"#reset-form",
    data:{
        newPassword:'',
        repeatPassword:'',
        token:"",
        wrongcheck:false
    },
    methods:{
        checkpassword:function(){
            console.log(this.token);
            let self = this;
            if(this.newPassword !== this.repeatPassword){
                this.wrongcheck = true;
            }else{
                this.wrongcheck = false;
                axios.post('/reset/resetpassword', {newPassword:this.newPassword,token:this.token})
                        .then(function (response) {
                            console.log(response);
                            if (response.data['ok']) {
                                Swal.fire({
                                    type: 'success',
                                    title: '密碼修改成功',
                                    html: '本畫面於<strong></strong>秒後回到登入頁',
                                    timer: 3000,
                                    onBeforeOpen: () => {
                                        Swal.showLoading()
                                        timerInterval = setInterval(() => {
                                        Swal.getContent().querySelector('strong')
                                            .textContent = parseInt(Math.ceil(Swal.getTimerLeft()/1000))
                                        }, 100)
                                    },
                                    onClose: () => {
                                        clearInterval(timerInterval)
                                        window.location.href = "/login"; 
                                    }     
                                    })       
                            }
                            
                        })
                        .catch(function (response) {
                            console.log(response)
                        });
            }
        }
    },
    mounted:function(){
        let newtoken = location.pathname.substr(17);
        this.token = newtoken;
        
    }
    

})


</script>

</body>

</html>
