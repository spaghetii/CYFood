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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <title>CYFood</title>
    <style>
        body {
            background: center/cover no-repeat url("../img/buffet-counter-cozy-776538.jpg");
            font-family:"Microsoft JhengHei";
        }

        .register {

            margin-top: 9%;
            padding: 20px 30px 30px 30px;
            /* border:1px solid rgba(255, 166, 0, 0.856) ; */
            background-color: rgba(255, 255, 255, 0.856);
            box-shadow: 0.5px 1px 2px 1px rgba(145, 139, 139, 0.7);
        }

        .registertitle {
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

    </style>
</head>

<body>
    <div class="container col-md-6" id="shopRegister">
        <div class="register">
            <h3 class=" registertitle">餐廳註冊</h3>
            <div class="register-form  w-100  ">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="ShopName">餐廳名稱</label>
                        <input type="text" v-model="ShopName" class="form-control" id="ShopName" name="ShopName">
                    </div>
                    <div class="form-group">
                        <label for="ShopAddress">餐廳地址</label>
                        <input type="text" v-model="ShopAddress" class="form-control" id="ShopAddress" name="ShopAddress">
                    </div>
                    <div class="form-group">
                        <label for="ShopType">餐廳種類</label>
                        <select class="form-control" v-model="ShopType" id="ShopType" name="ShopType">
                            <option value="中式美食">中式美食</option>
                            <option value="台灣美食">台灣美食</option>
                            <option value="日式美食">日式美食</option>
                            <option value="美式美食">美式美食</option>
                            <option value="飲品">飲品</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ShopEmail">電子郵件</label>
                        <input type="email" class="form-control" v-model="ShopEmail" id="ShopEmail" name="ShopEmail">
                    </div>
                    <div class="form-group">
                        <label for="ShopPhone">手機號碼</label>
                        <input type="text" class="form-control" v-model="ShopPhone" id="ShopPhone" name="ShopPhone">
                    </div>
                    <div class="form-group">
                        <label for="ShopPassword">密碼</label>
                        <input type="password" class="form-control" v-model="ShopPassword" id="ShopPassword" name="ShopPassword">
                    </div>
                    <div class="form-group">
                        <label for="ShopImage">餐廳照片</label>
                        <input type="file" ref="clearFile" class="form-control-file"  v-on:change="getImage">
                    </div>

                    <button type="button" v-on:click="register" class="btn btn-primary btn-block btn-lg">註冊</button>
                    <button type="button" onclick="location.href='./login'"
                        class="btn btn-primary btn-block btn-lg">已有帳號? 前往登入</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        
        var shopRegister = new Vue({
            el:"#shopRegister",
            data:{
                ShopName:"",
                ShopAddress:"",
                ShopType:"",
                ShopEmail:"",
                ShopPhone:"",
                ShopPassword:"",
                ShopImage:""
            },
            methods:{
                getImage:function(e){
                    this.ShopImage = e.target.files[0];
                    console.log(this.ShopImage);
                },
                register:function(){
                    let formData = new FormData();
                    var self = this;
                    formData.append("ShopName",this.ShopName);
                    formData.append("ShopAddress",this.ShopAddress);
                    formData.append("ShopType",this.ShopType);
                    formData.append("ShopEmail",this.ShopEmail);
                    formData.append("ShopPhone",this.ShopPhone);
                    formData.append("ShopPassword",this.ShopPassword);
                    formData.append("ShopImage",this.ShopImage);
                    
                    let config={
                        header:{
                            'Content-Type': 'multipart/form-data'
                        }
                    }

                    axios.post('/api/shop', formData,config)
                            .then(function (response) {
                                
                                // 成功回傳時就會顯示true
                                if (response.data['ok']){
                                    Swal.fire({
                                        title: '感謝您加入CYFood',
                                        text: "我們將盡快與您聯絡",
                                        type: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: '確定!'
                                        }).then((result) => {
                                            console.log(result.value);
                                            if (result.value) {
                                                self.ShopName="";
                                                self.ShopAddress="";
                                                self.ShopType="";
                                                self.ShopEmail="";
                                                self.ShopPhone="";
                                                self.ShopPassword="";
                                                self.$refs.clearFile.value = "";
                                                
                                            }
                                        })
                                }  
                            })
                }
            }

        })
    
    
    
    </script>

</body>

</html>
