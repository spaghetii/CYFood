<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CYFood</title>
    <!-- 網頁 icon -->
    <link rel="icon" href="/img/burger.ico" type="image/x-icon">
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
    <!-- 網頁 css -->
    {{-- 大於575px --}}
    <link rel="stylesheet" media="screen and (min-width: 576px)" href="/css/styleLarge.css">
    {{-- 小於575px --}}
    <link rel="stylesheet" media="screen and (max-width: 576px)" href="/css/styleSmall.css">
    @yield('login')
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <header class="header navbar bg-light navbar-light navbar-expand fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/img/logo.png" alt=""> <!-- logo -->
                </a>

                {{-- 隱藏式 header 地址搜尋 --}}
                @yield('headerSearchLarge')

                <div class="collapse navbar-collapse">
                    <div class="navbar-nav collapse navbar-collapse justify-content-end" id="navbarItem">
                        {{-- 登入後資訊欄 --}}
                        <div class="dropdown show" v-if="navshow" v-once>
                                <a v-cloak class="nav-item nav-link ml-4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="/img/user.png" alt="" >&ensp;@{{userName}}</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" :href="'/userOrderDetail/'+userID"><img src="/img/bill.png" alt="">&emsp;訂單</a>
                                    <a class="dropdown-item" :href="'/userProfile/'+userID"><img src="/img/user.png" alt="">&emsp;帳戶</a>
                                    <a class="dropdown-item" href="/QA"><img src="/img/qa.png" alt="">&emsp;Q&A</a>
                                    <a class="dropdown-item" href="javascript:void(0);" v-on:click="logout"><img src="/img/logout.png" alt="">&emsp;登出</a>
                                </div>
                            </div>
                        {{-- 登入 --}}
                        <div v-if="navlogin" v-cloak><a class="nav-item nav-link ml-4" href="/login"><img src="/img/user.png" alt="">&ensp;@{{userName}}</a></div>
                        
                        {{-- 購物袋 --}}
                        <div id="shoppingBag" v-cloak>
                            <a class="nav-item nav-link ml-4" href="#" role="button" data-toggle="modal" data-target="#shoppingBagModal" v-if="shoppingBagTotalQuantity!=0">
                                <img src="/img/shopping-bag2.png" alt="">
                                <span style="font-size:1.2rem;">@{{shoppingBagTotalQuantity}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            @yield('content')
        </main>

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row footerTop">
                    <!-- footer 上區 -->
                    <div class="col-sm-5 col-12 mt-0 mt-sm-0">
                        <img src="/img/logo.png" alt="">
                    </div>
                    <div class="col-sm-3 col-6 mt-4 mt-sm-0">
                        <p><a href="/about">關於 CY Food</a></p>
                        {{-- <a><a href="#">意見箱</a></a> --}}
                    </div>
                    <div class="col-sm-4 col-6 mt-4 mt-sm-0">
                        <p><a href="/QA">常見 Q&A</a></p>
                    </div>
                </div>
                <div class="row mt-4 footerBottom alignCenter">
                    <!-- footer 下區 -->
                    <div class="col-sm-5 col-6">
                        <small>Copyright © 2019 CY food</small>
                    </div>
                    <div class="col-sm-3 col-6 ">
                        <a href="https://www.facebook.com/groups/AI0101/"><img src="/img/facebook.png" alt="" class="mr-3"></a>
                        <a href="https://github.com/spaghetii/CYFood"><img src="/img/github.png" alt="" class="mr-3"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div> <!-- wrapper -->

    {{-- backtop --}}
    <img id="backTop" src="/img/backTop.png" alt="" v-on:click="backTopImg">

    <!-- ShoppingBagModal -->
    <div class="modal right fade" id="shoppingBagModal" tabindex="-1" role="dialog" aria-labelledby="shoppingBagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" v-cloak>
                    <h5 class="modal-title" id="shoppingBagModalLabel"><img src="/img/shopping-bag2.png" alt="">&emsp;您的訂單&nbsp;(@{{shoppingBagTotalQuantity}})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="/img/close.png" alt=""></span>
                    </button>
                </div>
                <div class="modal-body" id="shoppingBagModalBody">
                    <ul>
                        <li style="list-style-type:none" v-for="MealItem,index in shoppingBagMealName">
                            <div class="d-flex noPad">
                                <div class="shoppingBagModalItemQuantity noPad" >
                                    <div class="form-group noMarg mr-3" v-cloak style="width:80px">
                                        <select class="form-control" v-model="shoppingBagMealQuantity[index]">
                                            <option value="0">移除</option>
                                            <option v-for="item in quantitySelectLists">@{{item}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div v-cloak class="noPad" style="padding:0px 20px;" >
                                        @{{shoppingBagMealName[index]}}
                                    </div>  
                                    <div style="padding:0px 20px;margin:8px 0px 4px;font-size: 14px;line-height: 16px;"
                                            v-for="in1,dindex in shoppingBagMealDetail[0]" v-cloak >
                                        <div v-for="in2,key,i in in1" v-if="index == dindex">  
                                            <div v-if="in2[i] != null">
                                                <div v-if="in2[i].type == 1" style="font-weight:bold">加點 Add-ons</div>
                                                <div v-for="item in in2" v-if="item.type == 1">@{{item.detail}}</div>
                                                <div v-if="in2[i].type == 2" style="font-weight:bold">份量 Size</div>
                                                <div v-for="item in in2" v-if="item.type == 2">@{{item.detail}}</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>    
                                <div class="noPad ml-auto" v-for="item,sindex in shoppingBagMealTotalPrice" v-if="index == sindex" v-cloak>
                                    $@{{item}}
                                </div> 
                            </div>
                            <hr>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" v-on:click="checkOut" class="d-flex justify-content-between" id="shoppingBagModalCheckOutDiv">
                        <div id="shoppingBagModalCheckOutItem" v-cloak>@{{shoppingBagTotalQuantity}}</div>
                        <div>下一步：結帳</div>
                        <div v-cloak>$@{{shoppingBagTotalPrice}}</div>
                    </a>
                </div>
            </div> {{-- modal-content --}}
        </div> {{-- modal-dialog --}}
    </div> {{-- shoppingBagModal --}}
    
   {{-- websocket --}}
   <script src="../js/app.js" type="text/javascript"></script>
   <script>
        // local storage
        let mealNameArray = [];
        let mealPriceArray = [];
        let mealQuantityArray = [];

        var navBar = new Vue({
            el:"#navbarItem",
            data:{
                navlogin:true,
                navshow:false,
                userName:'',
                userID:-1,
                shoppingBagTotalQuantity:'',
            },
            methods:{
                init: function () {
                    let _this = this;
                    axios.get('/session')
                        .then(function (response) {
                            // console.log(response.data['name']);
                            if ( response.data['name'] != 'Guest' ){
                                _this.userName = response.data['name'];
                                _this.navlogin = false;
                                _this.navshow = true;
                                sessionStorage.setItem("memberName",_this.userName);
                            }else{
                                _this.userName = "登入";
                                _this.navlogin = true;
                                _this.navshow = false;
                            }
                            // console.log(_this.navBar);
                        })
                        .catch(function (response) {
                            console.log(response);
                    });
                },
                logout: function(){
                    axios.get('/logout')
                        .then(function (response) {
                            if (response.data['ok']) {
                                clearStorage();
                                sessionStorage.clear();
                                window.location.href="/";
                            }
                        })
                        .catch(function (response) {
                            
                    });
                }
            },
            mounted: function () {
                this.userID = localStorage.getItem('memberID');      
                this.init();            //initial
            }
        });  

        function clearStorage(){
            localStorage.removeItem('memberID');
            localStorage.removeItem('mealNameArray');
            localStorage.removeItem('mealPriceArray');
            localStorage.removeItem('mealQuantityArray');
            localStorage.removeItem('mealTotalPriceArray');
            localStorage.removeItem('restautantName');
            localStorage.removeItem('shopID');
            localStorage.removeItem('unitMealDetailTotalArray');
            localStorage.removeItem('shopImage');        
            localStorage.removeItem('shipTime');  //新增的
        }

        var shoppingBagModalApp = new Vue ({
            el:"#shoppingBagModal",
            data:{
                // 數量選擇框
                quantitySelectLists: [],

                // 購物袋 總數 總價
                shoppingBagTotalQuantity: 0,
                shoppingBagTotalPrice: 0,

                // 購物袋 各個資料
                shoppingBagMealQuantity: [],
                shoppingBagMealTotalPrice: [],
                shoppingBagMealName: [],
                shoppingBagMealPrice: [],

                // 餐點細項
                shoppingBagMealDetail: [],
                storedUnitMealDetailTotalArray: [], //儲存的資料
            },
            watch: {
                // watch 餐點數量變化
                shoppingBagMealQuantity: function (value) {
                    // console.log(value);
                    _this = this;
                    this.shoppingBagTotalQuantity = 0;
                    // 每筆 數量 和 順序
                    value.forEach((element,index) => {
                        // console.log(element);
                        // 根據數量變化 改變每筆的總價
                        _this.shoppingBagMealTotalPrice[index] = _this.shoppingBagMealPrice[index] * element;
                        // console.log(_this.shoppingBagMealTotalPrice);
                        // 餐點總數 更新
                        _this.shoppingBagTotalQuantity += parseInt(element);
                        // navbar 餐點總數 更新
                        navBar.shoppingBagTotalQuantity = _this.shoppingBagTotalQuantity;

                        // console.log(element);
                        // 移除餐點 更新data array值
                        if (element == '0'){
                            this.shoppingBagMealQuantity.splice(index, 1);
                            this.shoppingBagMealTotalPrice.splice(index, 1);
                            this.shoppingBagMealName.splice(index, 1);
                            this.shoppingBagMealPrice.splice(index, 1);
                            this.shoppingBagMealDetail[0].splice(index, 1);
                            if (this.shoppingBagMealDetail[0].length === 0){
                                this.shoppingBagMealDetail = [];
                            }
                        }  
                    });

                    // 數量變化 新增到 localstorage
                    if (value != 0) {
                        localStorage.setItem("mealQuantityArray", JSON.stringify(value));
                        localStorage.setItem("mealTotalPriceArray", JSON.stringify(this.shoppingBagMealTotalPrice));
                        localStorage.setItem("mealNameArray", JSON.stringify(this.shoppingBagMealName));
                        localStorage.setItem("mealPriceArray", JSON.stringify(this.shoppingBagMealPrice));
                    }else{
                        $('#shoppingBagModal').modal('toggle');
                        localStorage.removeItem('mealNameArray');
                        localStorage.removeItem('mealPriceArray');
                        localStorage.removeItem('mealQuantityArray');
                        localStorage.removeItem('mealTotalPriceArray');
                        localStorage.removeItem('restautantName');
                        localStorage.removeItem('shipTime');
                        localStorage.removeItem('shopID');
                        localStorage.removeItem('shopImage'); 
                        localStorage.removeItem('unitMealDetailTotalArray'); 
                    }

                    // 總價 更新
                    this.shoppingBagTotalPrice = 0;
                    this.shoppingBagMealTotalPrice.forEach(element => {
                        _this.shoppingBagTotalPrice += element;
                    });
                }
            },
            //結帳前登入判斷
            methods:{
                checkOut:function(){
                    if (sessionStorage.getItem("memberName")) {
                        window.location.href="/orderDetail";
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: '尚未登入',
                            html: '請登入後再結帳<br>' +
                                '本畫面於<strong></strong>秒跳轉至登入頁',
                            showConfirmButton: false,
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
                                window.location = "/login";
                            }
                        })

                    }
                }
            },
            mounted: function () {
                // 數量選擇框
                for(var i=1; i<=99; i++){
                    this.quantitySelectLists.push(i);
                }            
                
                // console.log(localStorage.getItem('mealPriceArray'));
                if (localStorage.getItem('mealPriceArray') != null ){
                // 取出localstorage資料
                let storedMealNameArray = JSON.parse(localStorage.getItem('mealNameArray'));
                let storedMealPriceArray = JSON.parse(localStorage.getItem('mealPriceArray'));
                let storedMealQuantityArray = JSON.parse(localStorage.getItem('mealQuantityArray'));
                let storedMealTotalPriceArray = JSON.parse(localStorage.getItem('mealTotalPriceArray'));
                // console.log(storedMealNameArray);
                // console.log(storedMealPriceArray);
                // console.log(storedMealQuantityArray);
                // console.log(storedMealTotalPriceArray);
                // localstorage如果有資料 丟到 購物袋
                this.shoppingBagMealName = storedMealNameArray;
                this.shoppingBagMealPrice = storedMealPriceArray;
                this.shoppingBagMealQuantity = storedMealQuantityArray;
                this.shoppingBagMealTotalPrice = storedMealTotalPriceArray;
                // console.log(this.shoppingBagMealQuantity);

                this.storedUnitMealDetailTotalArray = JSON.parse(localStorage.getItem('unitMealDetailTotalArray'));
                // console.log(storedUnitMealDetailTotalArray);
                this.shoppingBagMealDetail = {0:this.storedUnitMealDetailTotalArray};
                console.log(this.shoppingBagMealDetail);
                }
            },
        })

        var backTopApp = new Vue ({
            el:'#backTop',
            methods:{
                backTopImg: function () {
                    let scrollStep = - window.scrollY / (20 / 1),
                    scrollInterval = setInterval(function(){
                        if ( window.scrollY != 0 ) {
                        window.scrollBy( 0, scrollStep );
                    } 
                        else clearInterval(scrollInterval); 
                    },15);
                },
            },
        })

        // websocket
            window.Echo.channel('orders')
            .listen('OrdersEvent', (e) => {
                //取網址
                let test = (location.href).split("/");
                let selfName = test[test.length-1];
                
                if(e.header == "memberID" && e.id == navBar.userID){
                    console.log(e.type);
                    switch(e.type){
                        //店家於新訂單頁拒絕訂單
                        case "reject":
                            if(selfName == "trackingOrder"){
                                Swal.fire({
                                    title: '很抱歉，店家已取消您的訂單',
                                    text: "請重新選購您的餐點",
                                    type: 'warning',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: '點擊後返回首頁'
                                    }).then((result) => {
                                    if (result.value) {
                                        clearStorage();
                                        location.href="/";
                                    }
                                })
                            return;
                            } 
                                Swal.fire({
                                    title: '很抱歉，店家已取消您的訂單',
                                    text: "請重新選購您的餐點",
                                    type: 'warning',
                                    toast:true,
                                    position: 'top-end'
                                    }).then((result) => {
                                    if (result.value) {
                                        clearLayoutStorage();
                                    }
                                })
                            break;
                        //店家聯絡顧客
                        case "message":
                            if(selfName == "trackingOrder"){
                                Swal.fire({
                                    title: '店家向您傳訊息',
                                    text: e.message,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: '確定'
                                })
                                return;
                            }
                                Swal.fire({
                                    toast:true,
                                    position: 'top-end',
                                    title: '店家向您傳訊息:',
                                    text: e.message
                                })
                            break;
                        //店家延遲訂單
                        case "delay":
                            if(selfName == "trackingOrder"){
                                Swal.fire({
                                    title: '此訂單將延遲'+e.message+'分鐘出餐',
                                    type: 'warning',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: '確定'
                                })
                                return;
                            }
                                Swal.fire({
                                    toast:true,
                                    position: 'top-end',
                                    title: '此訂單將延遲'+e.message+'分鐘出餐',
                                    type: 'warning',
                                })
                            break;
                        //店家於處理訂單頁因故取消訂單
                        case "cancel":
                            if(selfName == "trackingOrder"){
                                Swal.fire({
                                    title: '很抱歉<br>店家因'+e.message+'已取消您的訂單',
                                    text: "請重新選購您的餐點",
                                    type: 'warning',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: '點擊後返回首頁'
                                    }).then((result) => {
                                    if (result.value) {
                                        clearStorage();
                                        location.href="/";
                                    }
                                })
                                return;
                            }
                                Swal.fire({
                                    toast:true,
                                    position: 'top-end',
                                    title: '很抱歉<br>店家因'+e.message+'已取消您的訂單',
                                    text: "請重新選購您的餐點",
                                    type: 'warning'
                                    }).then((result) => {
                                    if (result.value) {
                                        clearLayoutStorage();
                                    }
                                })
                            break;
                        //店家呼叫外送員
                        case "ok":
                            let shipTime = localStorage.getItem('shipTime');
                            console.log(shipTime);
                            let time = new Date();
                            let hour = time.getHours();
                            let min = time.getMinutes()+parseInt(shipTime);
                            if(min >= 60){
                                hour += 1;
                                min  -= 60;
                                min  += 100;
                                min = min.toString().substr(1);
                            }
                            if(selfName == "trackingOrder"){
                                timerApp.arrivalTime= hour+":"+min;
                                orderDeatil.init();
                                timerApp.progressbar();
                                return;
                            }
                                Swal.fire({
                                    toast:true,
                                    position: 'top-end',
                                    title: '您的餐點預計將在'+hour+":"+min+'抵達',
                                    type: 'warning',
                                }).then((result) => {
                                    if (result.value) {
                                        clearLayoutStorage();
                                    }
                                })
                            break;
                        //如有丟失訊息
                        default:
                            console.log(e);
                    }
                }
            });
        
        //清空localStorage
        function clearLayoutStorage(){
            localStorage.removeItem('OrdersNum');
            localStorage.removeItem('shipTime');
        }
    
   </script>
    @yield('script')
    
</body>

</html>