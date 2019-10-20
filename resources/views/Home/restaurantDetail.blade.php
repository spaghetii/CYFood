@extends('layouts.layout')

{{-- 餐廳細項頁面 header 地址搜尋 --}}
@section('headerSearchLarge')
    <div class="input-group navbar-nav col-sm-6" id="restaurantDetailHeaderSearchLarge">
        <input type="text" class="form-control" placeholder="請輸入地址" value="台中市南屯區公益路二段51號" disabled>
        <div class="input-group-append">
            <button class="btn btn-warning" type="submit" id="headerSearchAddressButton">Go</button>
        </div>
    </div>
@endsection

{{-- 網頁內容 --}}
@section('content')
<div id="restaurant">
    {{-- 餐廳title資訊 --}}
    <div class="restaurantImgDiv" id="topshop" :style="{backgroundImage: 'url('+ shop.ShopImage +')'}">
        <div class="restaurantDetailDiv d-flex align-items-center">
            <div class="restaurantDetail container" v-cloak>
                <h2>@{{shop.ShopName}}</h2>
                <p class="mt-3 mb-0">$.@{{shop.ShopType}}</p>
                <div class="restaurantDetailList d-flex flex-row">
                    <div class="mt-4 mr-2">@{{shop.ShipTime-5}} – @{{shop.ShipTime+5}} 分鐘</div>
                    <div class="mt-4 mr-2"><img src="/img/star1.png" class="mr-1">4.8/5</div>
                    <div class="mt-4 mr-2">15TWD 費用</div>
                </div> 
                <div class="restaurantDetailAddress">
                    <span>@{{shop.ShopAddress}}&nbsp;
                    <a v-on:click="restaurantAddressBtn" id="restaurantAddressDesc">詳細資訊</a></span>
                </div>
            </div>      
        </div>
    </div>

    {{-- 分類排 --}}
    <div id="meallist">

        <div id="categoryBarDiv">
            <div class="container-fluid" id="categoryBar">
                <div class="row no-gutters">
                    <nav class="navbar navbar-expand-sm navbar-light bg-white" style="width: 100%">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav row alignCenter" id="categoryBarList" v-cloak>
                                <a class="nav-item nav-link":href="'#'+ type" v-for="type in types">@{{type}}</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div> 
    {{-- 分類內容 --}}
    
        <div class="container-fluid categoryListDiv" id="popularList" v-for="type in types">
            <div :id="type" v-cloak>
                <h4>@{{type}}</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 mt-5" v-for="meal,index in list" v-if="meal.MealType === type">
                    <a href="javascript:void(0);" class="categoryItem" v-on:click="selection(index)" >
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10" v-cloak>
                                    <h5 class="categoryFoodTitle">@{{meal.MealName}}</h5>
                                    <h6 class="categoryFoodDesc">@{{meal.MealDesc}}</h6>
                                </div>
                                <div class="col-2 align-items-end" v-cloak>
                                    $@{{meal.MealPrice}}
                                </div>
                            </div>
                            <img :src="meal.MealImage" class="categoryItemImg"  alt="">
                        </div>
                    </a>
                </div>                       
            </div>
        </div>
    </div> <!-- mealList -->



<!-- OrderModal -->
<div class="modal fade" id="orderModalCenter" abindex="-1" role="dialog" aria-labelledby="orderModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="orderModalCenterContent">
        <div class="modal-header" id="orderModalCenterHeader" v-if="meals.MealImage" :style="{backgroundImage: 'url('+ meals.MealImage +')'}">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><img src="/img/close1.png" alt=""></span>
          </button>
        </div>
        <div class="modal-body" id="orderModalCenterBody">
            <div class="orderModaloodTitle" v-cloak>
                <h2>@{{meals.MealName}}</h2>
            </div>
            <div class="orderModalFoodDesc" v-cloak>
                @{{meals.MealDesc}}
            </div>
        </div>
        {{-- 餐點細項 --}}
        <div>
            <ul style="list-style: none;" class="noPad noMarg ">
                <li>
                    {{-- 細項抬頭 --}}
                    <div id="orderDetailTitleDiv">
                        <div>
                            <h6 class="noMarg">份量 Size</h6>
                        </div>
                        <div>
                            <small>必填</small>
                        </div>
                    </div>
                    {{-- 細項選項 --}}
                    <div>
                        <p class="noMarg">
                            <input type="radio" id="test1" name="radio-group" class="orangeRad">
                            <label for="test1" class="d-flex flex-row" id="orederDetailDescDiv">
                                中 Medium 
                                <span class="ml-auto mr-4"></span>
                            </label>
                        </p>
                        <p class="noMarg">
                            <input type="radio" id="test2" name="radio-group" class="orangeRad">
                            <label for="test2" class="d-flex flex-row" id="orederDetailDescDiv">
                                大 Large
                                <span class="ml-auto mr-4">+$10</span>
                            </label>  
                        </p>
                    </div>
                </li>
                <li>
                    {{-- 細項抬頭 --}}
                    <div id="orderDetailTitleDiv">
                        <div>
                            <h6 class="noMarg">飲品溫度 Beverage Temperature</h6>
                        </div>
                        <div>
                            <small>必填</small>
                        </div>
                    </div>
                    {{-- 細項選項 --}}
                    <div>
                        <p class="noMarg">
                            <input type="radio" id="test3" name="radio-group1" class="orangeRad">
                            <label for="test3" class="d-flex flex-row" id="orederDetailDescDiv">
                                正常冰 Regular Ice 
                                <span class="ml-auto mr-4"></span>
                            </label>
                        </p>
                        <p class="noMarg">
                            <input type="radio" id="test4" name="radio-group1" class="orangeRad">
                            <label for="test4" class="d-flex flex-row" id="orederDetailDescDiv">
                                常溫 Room Temperature
                                <span class="ml-auto mr-4"></span>
                            </label>  
                        </p>
                        <p class="noMarg">
                            <input type="radio" id="test5" name="radio-group1" class="orangeRad">
                            <label for="test5" class="d-flex flex-row" id="orederDetailDescDiv">
                                熱 Hot
                                <span class="ml-auto mr-4"></span>
                            </label>  
                        </p>
                    </div>
                </li>
                <li>
                    {{-- 細項抬頭 --}}
                    <div id="orderDetailTitleDiv">
                        <div>
                            <h6 class="noMarg">甜度 Sweetness Level</h6>
                        </div>
                        <div>
                            <small>必填</small>
                        </div>
                    </div>
                    {{-- 細項選項 --}}
                    <div>
                        <p class="noMarg">
                            <input type="radio" id="test6" name="radio-group2" class="orangeRad">
                            <label for="test6" class="d-flex flex-row" id="orederDetailDescDiv">
                                正常糖 Regular Sugar
                                <span class="ml-auto mr-4"></span>
                            </label>
                        </p>
                        <p class="noMarg">
                            <input type="radio" id="test7" name="radio-group2" class="orangeRad">
                            <label for="test7" class="d-flex flex-row" id="orederDetailDescDiv">
                                半糖 Half Sugar
                                <span class="ml-auto mr-4"></span>
                            </label>  
                        </p>
                        <p class="noMarg">
                            <input type="radio" id="test8" name="radio-group2" class="orangeRad">
                            <label for="test8" class="d-flex flex-row" id="orederDetailDescDiv">
                                無糖 Sugar-Free
                                <span class="ml-auto mr-4"></span>
                            </label>  
                        </p>
                    </div>
                </li>
                <li>
                    {{-- 細項抬頭 --}}
                    <div id="orderDetailTitleDiv">
                        <div>
                            <h6 class="noMarg">加點 Add-ons</h6>
                        </div>
                        <div>
                            <small>最多可選擇 1 個項目</small>
                        </div>
                    </div>
                    {{-- 細項選項 --}}
                    <div>
                        <p class="noMarg">
                            <input type="checkbox" id="test9" name="radio-group3" class="orangeRad">
                            <label for="test9" class="d-flex flex-row" id="orederDetailDescDiv">
                                珍珠 Tapioca
                                <span class="ml-auto mr-4">+$10</span>
                            </label>
                        </p>
                        <p class="noMarg">
                            <input type="checkbox" id="test10" name="radio-group3" class="orangeRad">
                            <label for="test10" class="d-flex flex-row" id="orederDetailDescDiv">
                                仙草凍 Herb Jelly
                                <span class="ml-auto mr-4">+$10</span>
                            </label>  
                        </p>
                        <p class="noMarg">
                            <input type="checkbox" id="test11" name="radio-group3" class="orangeRad">
                            <label for="test11" class="d-flex flex-row" id="orederDetailDescDiv">
                                紅豆 Red Bean
                                <span class="ml-auto mr-4">+$10</span>
                            </label>  
                        </p>
                    </div>
                </li>
                <li>
                    {{-- 細項抬頭 --}}
                    <div id="orderDetailTitleDiv">
                        <div>
                            <h6 class="noMarg">特殊指示</h6>
                        </div>
                    </div>
                    {{-- 細項選項 --}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="noMarg"></label>
                        <textarea class="form-control" style="border-style:none;" id="exampleFormControlTextarea1" rows="3" placeholder="留下備註給店家"></textarea>
                    </div>
                </li>
            </ul>
        </div>
        <div class="modal-footer" id="orderModalCenterFooter" v-cloak>
            <button type="button" class="btn btn-lg" v-on:click="subButton">-</button>
            <span class="badge badge-white">@{{count}}</span>
            <button type="button" class="btn btn-lg" v-on:click="plusButton">+</button>
            <button type="button" class="btn btn-lg btn-block" v-on:click="orderBtn">
                <div class="" v-cloak>
                    新增&nbsp;@{{count}}&nbsp;份餐點至訂單                    
                    <div class="floatRight" v-cloak>
                        $@{{totalPrice}}
                    </div>
                </div>
            </button>
        </div>
      </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- orderModalCenter -->

<!-- RestaurantAddressModal -->
<div class="modal fade" id="RestaurantAddressModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="RestaurantAddressModalContent" style="width: 674px;">
                <div id="map">
                    {{-- 嵌入式 google api --}}
                    {{-- <iframe width="674" height="337" frameborder="0" style="border:0" 
                        v-bind:src="'https://www.google.com/maps/embed/v1/place?key=AIzaSyAvNZ5xYMFKm3OAfZNqzAxCzgbPYuZf4D4&q='  + restaurantAddr " 
                        allowfullscreen>
                    </iframe> --}}
                </div>
                <div style="margin: 24px 24px 8px;">
                    <div class="container-fluid d-flex flex-row">
                         <h5 class="mb-4">地點和營業時間</h5>
                    </div>
                    <div class="container-fluid d-flex flex-row">
                        <div><img class="mr-3" src="/img/address.png" alt=""></div>
                        <div v-cloak>@{{restaurantAddr}}</div>
                    </div>
                    <hr>
                    <div class="container-fluid d-flex flex-rowr">
                        <div><img class="mr-3" src="/img/clock.png" alt=""></div>
                        <div><h6 class="mt-1">24hr</h6></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- 新餐廳覆蓋訂單Modal -->
<div class="modal fade" id="newOrderMadal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content d-flex flex-column">
            <div class="d-flex justify-content-between" style="padding:16px" v-cloak>
                <h4 class="modal-title" id="exampleModalLabel">您比較想吃&nbsp;@{{secondRestaurant}}&nbsp;嗎？</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><img src="/img/close1.png" alt=""></span>
                </button>
            </div>
            <div style="padding:16px" v-cloak>
               <h6>
                   您的訂單含有&nbsp;@{{firstRestaurant}}&nbsp;提供的餐點。建立新訂單，即可新增&nbsp;@{{secondRestaurant}}&nbsp;提供的餐點。
               </h6>
            </div>
            <div style="padding:16px">
                <button type="button" id="newOrderMadalButton" class="btn bgOrange textWhite" data-dismiss="modal" v-on:click="newOrderMadalBtn" style="width:100%">
                    新訂單
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        // checkbox select one at a time 20191020
        $(document).on('click', 'input[type="checkbox"]', function() {      
            $('input[type="checkbox"]').not(this).prop('checked', false);      
        });

        //滾輪滾到navbar
        $(document).ready().scroll(function () {
            var winTop = $("#restaurantDetailHeaderSearchLarge").offset().top;
            var navTop = $("#categoryBar").offset().top;
            if (winTop > navTop) {
                $("#categoryBarDiv").addClass("sticky-top");   
                $("header").css("visibility","hidden");
                $("#shoppingBag").css("visibility","visible");
            }else{
                $("#categoryBarDiv").removeClass("sticky-top");
                $("header").css("visibility","visible");
            }
        })


        var orderModal = new Vue({
            el: "#orderModalCenter",
            data: {
                meals:[],
                count: 1,
                totalPrice: null,
                shop:[],
            },
            methods: {
                subButton: function () {
                    if (this.count > 1) {
                        this.count--;
                        this.totalPrice -= parseInt(this.meals.MealPrice);
                    }
                },  
                plusButton: function () {
                    this.count++;
                    this.totalPrice += parseInt(this.meals.MealPrice);
                },
                orderBtn: function () {
                    // 跳出 model
                    $('#orderModalCenter').modal('toggle');

                    // 判斷餐廳是否相同
                    let firstShopID = localStorage.getItem('shopID');
                    if ( firstShopID == null || firstShopID == this.shop.ShopID ) {
                         // 餐點資料 存入 localStorage 
                        mealNameArray.push(this.meals.MealName);
                        mealPriceArray.push(this.meals.MealPrice);
                        mealQuantityArray.push(this.count);
                        localStorage.setItem("mealNameArray", JSON.stringify(mealNameArray));
                        localStorage.setItem("mealPriceArray", JSON.stringify(mealPriceArray));
                        localStorage.setItem("mealQuantityArray", JSON.stringify(mealQuantityArray));

                        // 資料傳入到 shoppingBagModalApp-Vue
                        shoppingBagModalApp.shoppingBagMealName.push(this.meals.MealName);
                        shoppingBagModalApp.shoppingBagMealPrice.push(this.meals.MealPrice);
                        shoppingBagModalApp.shoppingBagMealQuantity.push(this.count);  
                        shoppingBagModalApp.shoppingBagMealTotalPrice.push(this.meals.MealPrice * this.count);  
                        // 餐點總金額 傳入 local
                        localStorage.setItem("mealTotalPriceArray", JSON.stringify(shoppingBagModalApp.shoppingBagMealTotalPrice));

                        // 餐廳名稱、外送時間、圖片 傳入 local
                        localStorage.setItem("restautantName", JSON.stringify(this.shop.ShopName));
                        localStorage.setItem("shopID", JSON.stringify(this.shop.ShopID));
                        localStorage.setItem("shipTime", JSON.stringify(this.shop.ShipTime));
                        localStorage.setItem("shopImage", JSON.stringify(this.shop.ShopImage));     //多塞一個餐廳圖片  歷史訂單要用 by 林培誠
                        // console.log(this.shop);
                        
                    }else if ( firstShopID != this.shop.ShopID) {
                        $('#newOrderMadal').modal('toggle');
                        let restautantName = JSON.parse(localStorage.getItem('restautantName'));
                        newOrderMadalApp.firstRestaurant = restautantName;
                        newOrderMadalApp.secondRestaurant = this.shop.ShopName;
                        newOrderMadalApp.shopID = this.shop.ShopID;
                        newOrderMadalApp.shipTime = this.shop.ShipTime;
                        newOrderMadalApp.shopImage = this.shop.ShopImage;
                        newOrderMadalApp.mealName = this.meals.MealName;
                        newOrderMadalApp.mealPrice = this.meals.MealPrice;
                        newOrderMadalApp.count = this.count;
                    }
                }
            },
        })

        var meals = new Vue({
        el: "#meallist",
        data: {
            list: [],
            shop: [],
            temp: [],
            types:[],
            shopID:-1
            
        },
        methods: {
            init: function () {
                let _this = this;
                
                axios.get("/api/meal/"+this.shopID)
                    .then(function (response) {
                        _this.list = response.data;
                        // console.log(_this.list);
                        //取出餐點種類
                        for(i= 0;i<_this.list.length;i++){
                            _this.temp[i] = _this.list[i].MealType;
                        }
                        _this.types = _this.temp.filter(function(element, index ,arr){
                            return arr.indexOf(element) === index;
                        })
                        
                    })
                    .catch(function (response) {
                        console.log(response);
                    });
                
            },
            selection: function(e){
                orderModal.count = 1;
                orderModal.meals = this.list[e];
                orderModal.totalPrice = this.list[e].MealPrice;
                $("#orderModalCenter").modal( { show: true } );
                // console.log(orderModal.meals);
            }
        },
        mounted: function () {
            let test = (location.href).split("/");
            this.shopID = test[test.length-1];
            this.init();
        }
    });
    
    var topshop = new Vue({
        el: "#topshop",
        data: {
            shop: [],
        },
        methods: {
            init: function () {
                let _this = this;

                axios.get("/api/shop/{{$id}}")
                .then(function (response) {
                    _this.shop= response.data;
                    // 店家地址傳給地址modal的vue
                    RestaurantAddressModal.restaurantAddr = _this.shop.ShopAddress;  

                    orderModal.shop = _this.shop;
                    // console.log(_this.shop.ShopName);
                })
                .catch(function (response) {
                    console.log(response);
                });
            },
            restaurantAddressBtn: function() {
                // 將地址給localStorge
                localStorage.setItem('restaurantAddress', this.shop.ShopAddress);
                // 呼叫 maps js api
                initMap();
                $("#RestaurantAddressModal").modal( { show: true } );
                // 清除localStorge
                localStorage.removeItem('restaurantAddress');
            },
        },
        mounted: function () {
            this.init();
        }
    });
    
    // 地址model vue
    var RestaurantAddressModal = new Vue ({
        el: "#RestaurantAddressModal",
        data: {
            restaurantAddr : '',
        },
    });

    // google maps js api
    var map, geocoder, address;
    function initMap() {
        // google 經緯度轉換
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map'), {
            // 地圖遠近
            zoom: 17
        });
        // localStorage 地址傳入給 Geocoder
        let restaurantAddress = localStorage.getItem('restaurantAddress');
        address = restaurantAddress;
        // 地址經緯度轉換給maker
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location    
                });
            } else {
                // console.log(status);
            }
        });
    }  

    // 確認是否為新餐廳餐點 modal
    var newOrderMadalApp = new Vue ({
        el: "#newOrderMadal",
        data: {
            firstRestaurant:'',
            secondRestaurant:'',
            shopID:'',
            shipTime:'',
            shopImage:'',
            mealName:'',
            mealPrice:'',
            count:'',
        },
        methods: {
            newOrderMadalBtn: function () {
                //清空上一筆餐廳餐點
                mealNameArray = [];
                mealPriceArray = [];
                mealQuantityArray = [];
                mealNameArray.push(this.mealName);
                mealPriceArray.push(this.mealPrice);
                mealQuantityArray.push(this.count);
                localStorage.setItem("mealNameArray", JSON.stringify(mealNameArray));
                localStorage.setItem("mealPriceArray", JSON.stringify(mealPriceArray));
                localStorage.setItem("mealQuantityArray", JSON.stringify(mealQuantityArray))
                //清空上一筆餐廳餐點
                shoppingBagModalApp.shoppingBagMealName = [];
                shoppingBagModalApp.shoppingBagMealPrice = [];
                shoppingBagModalApp.shoppingBagMealQuantity = [];
                shoppingBagModalApp.shoppingBagMealTotalPrice = [];
                shoppingBagModalApp.shoppingBagMealName.push(this.mealName);
                shoppingBagModalApp.shoppingBagMealPrice.push(this.mealPrice);
                shoppingBagModalApp.shoppingBagMealQuantity.push(this.count);  
                shoppingBagModalApp.shoppingBagMealTotalPrice.push(this.mealPrice * this.count); 

                localStorage.setItem("mealTotalPriceArray", JSON.stringify(shoppingBagModalApp.shoppingBagMealTotalPrice))
                localStorage.setItem("restautantName", JSON.stringify(this.secondRestaurant));
                localStorage.setItem("shopID", JSON.stringify(this.shopID));
                localStorage.setItem("shipTime", JSON.stringify(this.shipTime)); 
                localStorage.setItem("shopImage", JSON.stringify(this.shopImage));     //多塞一個餐廳圖片  歷史訂單要用 by 林培誠
            },
        },
    })
    </script>
    {{-- google map api key --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvNZ5xYMFKm3OAfZNqzAxCzgbPYuZf4D4&callback=initMap" async defer></script>
@endsection