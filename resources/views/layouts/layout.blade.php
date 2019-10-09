<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CYfood</title>
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
    {{-- websocket --}}
    <script src="../js/app.js" type="text/javascript"></script>
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
                                <a class="nav-item nav-link ml-4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="/img/user.png" alt="" >&ensp;@{{userName}}</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="/userOrderDetail"><img src="/img/bill.png" alt="">&emsp;訂單</a>
                                        <a class="dropdown-item" href="/userProfile"><img src="/img/user.png" alt="">&emsp;帳戶</a>
                                        <a class="dropdown-item" href="#"><img src="/img/qa.png" alt="">&emsp;Q&A</a>
                                        <a class="dropdown-item" v-on:click="logout"><img src="/img/logout.png" alt="">&emsp;登出</a>
                                      </div>
                            </div>
                        {{-- 登入 --}}
                        <div v-if="navlogin"><a class="nav-item nav-link ml-4" href="/login"><img src="/img/user.png" alt="">&ensp;@{{userName}}</a></div>
                        
                        {{-- 購物袋 --}}
                        <div id="shoppingBag">
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
                        <p><a href="#">關於 CY Food</a></p>
                        <p><a href="#">意見箱</a></p>
                    </div>
                    <div class="col-sm-4 col-6 mt-4 mt-sm-0">
                        <p><a href="#">常見 Q&A</a></p>
                        <p><a href="#">關於我們</a></p>
                    </div>
                </div>
                <div class="row mt-4 footerBottom">
                    <!-- footer 下區 -->
                    <div class="col-sm-5 col-6">
                        <small>Copyright © 2019 CY food</small>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="https://www.facebook.com/groups/AI0101/"><img src="/img/facebook.png" alt="" class="mr-3"></a>
                        <a href="https://github.com/spaghetii/CYFood"><img src="/img/github.png" alt="" class="mr-3"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div> <!-- wrapper -->
    

    <!-- ShoppingBagModal -->
    <div class="modal right fade" id="shoppingBagModal" tabindex="-1" role="dialog" aria-labelledby="shoppingBagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shoppingBagModalLabel"><img src="/img/shopping-bag2.png" alt="">&emsp;您的訂單&nbsp;(@{{shoppingBagTotalQuantity}})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="/img/close.png" alt=""></span>
                    </button>
                </div>
                <div class="modal-body" id="shoppingBagModalBody">
                    <ul>
                        <li style="list-style-type:none" v-for="MealItem,index in shoppingBagMealName">
                            <div class="d-flex justify-content-between">
                                <div class="shoppingBagModalItemQuantity">
                                    <div class="form-group">
                                        <select class="form-control" v-model="shoppingBagMealQuantity[index]">
                                            <option value="0">移除</option>
                                            <option v-for="item in quantitySelectLists">@{{item}}</option>
                                        </select>
                                    </div>
                                </div>
                                <a href="" class="shoppingBagModalItemDetail">
                                    <div class="d-flex flex-column">
                                        <div>
                                            <div class="float-left">
                                                @{{shoppingBagMealName[index]}}
                                            </div>
                                            <div class="float-right" v-for="item,sindex in shoppingBagMealTotalPrice" v-if="index == sindex">
                                                $@{{item}}
                                            </div>
                                        </div>
                                        <div>
                                            <small class="colorOrange aHoverColor">編輯</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <hr>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="/orderDetail" class="d-flex justify-content-between" id="shoppingBagModalCheckOutDiv">
                        <div id="shoppingBagModalCheckOutItem">@{{shoppingBagTotalQuantity}}</div>
                        <div>下一步：結帳</div>
                        <div>$@{{shoppingBagTotalPrice}}</div>
                    </a>
                </div>
            </div> {{-- modal-content --}}
        </div> {{-- modal-dialog --}}
    </div> {{-- shoppingBagModal --}}
    
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
                                sessionStorage.setItem("name",_this.userName);
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
                                sessionStorage.clear();
                                location.reload();
                            }
                        })
                        .catch(function (response) {
                            
                    });
                }
            },
            mounted: function () {      
                this.init();            //initial
            }
        });  



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
                    }

                    // 總價 更新
                    this.shoppingBagTotalPrice = 0;
                    this.shoppingBagMealTotalPrice.forEach(element => {
                        _this.shoppingBagTotalPrice += element;
                    });
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
                }

            },
        })
    
   </script>
    @yield('script')
    
</body>

</html>