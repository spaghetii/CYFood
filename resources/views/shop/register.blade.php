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
    {{-- 網頁CSS --}}
    <link rel="stylesheet" href="/css/shopRegister.css">
    <title>CYFood</title>
</head>

<body>
    <div class="container col-md-6" id="shopRegister">
        <div class="register">
            <h3 class=" registertitle">餐廳註冊</h3>
            <div class="register-form  w-100  ">
                <form v-on:submit.prevent="register">
                    @csrf
                    <div class="form-group">
                        <label for="ShopName">餐廳名稱</label>
                        <small v-cloak v-if="checkShop" class="resetalert ">@{{errorShop}}</small>
                        <input type="text" v-model.lazy="ShopName" class="form-control" id="ShopName" 
                        v-bind:class="{ 'is-valid': okShop }" placeholder="如店名重複，將無法註冊" name="ShopName" required>
                    </div>
                    <div class="form-group">
                        <label for="ShopAddress">餐廳地址</label>
                        <small v-cloak v-if="checkAddress" class="resetalert ">@{{errorAddress}}</small>
                        <input type="text" v-model.lazy="ShopAddress" class="form-control" id="ShopAddress" 
                        v-bind:class="{ 'is-valid': okAddress }" placeholder="如地址重複，將無法註冊" name="ShopAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="ShopType">餐廳種類</label>
                        <select class="form-control" v-model="ShopType" id="ShopType" name="ShopType" required>
                            <option value="default" selected disabled hidden>請選擇餐廳種類</option>
                            <option value="中式美食">中式美食</option>
                            <option value="台灣美食">台灣美食</option>
                            <option value="日式美食">日式美食</option>
                            <option value="美式美食">美式美食</option>
                            <option value="飲品">飲品</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ShopEmail">電子郵件</label>
                        <small v-cloak v-if="checkEmail" class="resetalert ">@{{errorEmail}}</small>
                        <input type="email" class="form-control" v-model.lazy="ShopEmail" id="ShopEmail" 
                        v-bind:class="{ 'is-valid': okEmail }" placeholder="如電子郵件重複，將無法註冊" name="ShopEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="ShopPhone">手機號碼</label>
                        <small v-cloak v-if="checkPhone" class="resetalert ">@{{errorPhone}}</small>
                        <input type="text" class="form-control" v-model.lazy="ShopPhone" id="ShopPhone" 
                        v-bind:class="{ 'is-valid': okPhone }" placeholder="例 : 0918654321" name="ShopPhone" required>
                    </div>
                    <div class="form-group">
                        <label for="ShopPassword">密碼</label>
                        <small v-cloak v-if="checkPwd" class="resetalert ">@{{errorPwd}}</small>
                        <input type="password" class="form-control" v-model.lazy="ShopPassword" id="ShopPassword" 
                        v-bind:class="{ 'is-valid': okPwd }"  placeholder="英、數字皆可，6-20碼" name="ShopPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="ShopImage">餐廳照片</label>
                        <input type="file" ref="clearFile" class="form-control-file"  v-on:change="getImage" required>
                    </div>

                    <button type="submit" :disabled="isDisabled" class="btn btn-primary btn-block btn-lg">註冊</button>
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
                checkShop:false,
                errorShop:"",
                okShop:false,
                ShopAddress:"",
                checkAddress:false,
                errorAddress:"",
                okAddress:false,
                ShopType:"default",
                ShopEmail:"",
                checkEmail:false,
                errorEmail:"",
                okEmail:false,
                ShopPhone:"",
                checkPhone:false,
                errorPhone:"",
                okPhone:false,
                ShopPassword:"",
                checkPwd:false,
                errorPwd:"",
                okPwd:false,
                ShopImage:""
            },
            watch:{
                ShopName:function(){
                    let reg = /^[\u4e00-\u9fa5_a-zA-Z0-9\s]{1,18}$/;
                    if(this.ShopName == ""){
                        this.checkShop = false;
                        this.okShop = false;
                        return;
                    }

                    if(!reg.test(this.ShopName)){
                        this.okShop = false;
                        this.checkShop = true;
                        this.errorShop = "只可輸入中、英、數字及空白";
                        return;
                    }

                    let self = this;
                    axios.post('/shop/register/check', {
                        ShopName: this.ShopName,
                    })
                    .then(function (response) {
                        console.log(response.data['ok']);
                        if (response.data['ok']) {
                            self.checkShop = false;
                            self.okShop = true;
                            return;
                        } 
                            
                        self.okShop = false;
                        self.checkShop = true;
                        self.errorShop = "餐廳名稱重複，請更換別的餐廳名稱";
                        
                    })
                    .catch(function (response) {
                        console.log(response)
                    });

                },
                ShopAddress:function(){
                    let reg = /^[\u4e00-\u9fa5_a-zA-Z0-9\s.,]{1,}$/;
                    if(this.ShopAddress == ""){
                        this.checkAddress = false;
                        this.okAddress = false;
                        return;
                    }

                    if(!reg.test(this.ShopAddress)){
                        this.okAddress = false;
                        this.checkAddress = true;
                        this.errorAddress = "只可輸入中、英、數字、空白及句點與逗號";
                        return;
                    }

                    let self = this;
                    axios.post('/shop/register/check', {
                        ShopAddress: this.ShopAddress,
                    })
                    .then(function (response) {
                        console.log(response.data['ok']);
                        if (response.data['ok']) {
                            self.checkAddress = false;
                            self.okAddress = true;
                            return;
                        } 
                            
                        self.okAddress = false;
                        self.checkAddress = true;
                        self.errorAddress = "餐廳住址重複，請更換別的餐廳住址";
                        
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
                },
                ShopEmail:function(){
                    let reg = /^\w+([.-]\w+)*@\w+([.-]\w+)*$/;
                    if(this.ShopEmail == ""){
                        this.checkEmail = false;
                        this.okEmail = false;
                        return;
                    }

                    if(!reg.test(this.ShopEmail)){
                        this.okEmail = false;
                        this.checkEmail = true;
                        this.errorEmail = "請輸入正確的格式";
                        return;
                    }

                    let self = this;
                    axios.post('/shop/register/check', {
                        ShopEmail: this.ShopEmail,
                    })
                    .then(function (response) {
                        console.log(response.data['ok']);
                        if (response.data['ok']) {
                            self.checkEmail = false;
                            self.okEmail = true;
                            return;
                        } 
                            
                        self.okEmail = false;
                        self.checkEmail = true;
                        self.errorEmail = "電子郵件重複，請更換別的電子郵件";
                        
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
                },
                ShopPhone:function(){
                    let reg = /^09\d{8}$/;
                    if(this.ShopPhone == ""){
                        this.checkPhone = false;
                        this.okPhone = false;
                        return;
                    }

                    if(!reg.test(this.ShopPhone)){
                        this.okPhone = false;
                        this.checkPhone= true;
                        this.errorPhone = "請輸入正確的格式";
                        return;
                    }
                    this.checkPhone = false;
                    this.okPhone = true;
                },
                ShopPassword:function(){
                    let reg = /^[a-zA-Z0-9]{6,20}$/;
                    if(this.ShopPassword == ""){
                        this.checkPwd = false;
                        this.okPwd = false;
                        return;
                    }

                    if(!reg.test(this.ShopPassword)){
                        this.okPwd = false;
                        this.checkPwd= true;
                        this.errorPwd = "密碼至少6碼，且應是英數字";
                        return;
                    }
                    this.checkPwd = false;
                    this.okPwd = true;
                }
            },
            computed:{
                isDisabled(){
                    if(this.okShop && this.okAddress && this.okEmail && this.okPhone && this.okPwd){
                        return false;
                    }
                    return true;
                }
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
