@extends('layouts.layout')

{{-- 餐廳細項頁面 header 地址搜尋 --}}
@section('headerSearchLarge')
    <div class="input-group navbar-nav col-sm-6" id="restaurantDetailHeaderSearchLarge">
        <input type="text" class="form-control" placeholder="請輸入地址" value="台中市南屯區公益路二段51號">
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
            <div class="restaurantDetail container">
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
                    <nav class="navbar navbar-expand-sm navbar-light bg-white">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav row align-items-center" id="categoryBarList">
                                <a class="nav-item nav-link":href="'#'+ type" v-for="type in types">@{{type}}</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    {{-- 分類內容 --}}
    
        <div class="container-fluid categoryListDiv" id="popularList" v-for="type in types">
            <div :id="type">
                <h4>@{{type}}</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 mt-5" v-for="meal,index in list" v-if="meal.MealType === type">
                    <a  class="categoryItem" v-on:click="selection(index)" >
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                <h5 class="categoryFoodTitle">@{{meal.MealName}}</h5>
                                    <h6 class="categoryFoodDesc">@{{meal.MealDesc}}
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $@{{meal.MealPrice}}
                                </div>
                            </div>
                            <img :src="meal.MealImage" class="categoryItemImg" v-if="meal.MealImage" alt="">
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
            <div class="orderModaloodTitle">
                <h2>@{{meals.MealName}}</h2>
            </div>
            <div class="orderModalFoodDesc">
                @{{meals.MealDesc}}
            </div>
        </div>
        <div class="modal-footer" id="orderModalCenterFooter">
            <button type="button" class="btn btn-lg" v-on:click="subButton">-</button>
            <span class="badge badge-white">@{{count}}</span>
            <button type="button" class="btn btn-lg" v-on:click="plusButton">+</button>
            <button type="button" class="btn btn-lg btn-block" v-on:click="orderBtn">
                <div class="" >
                    新增&nbsp;@{{count}}&nbsp;份餐點至訂單                    
                    <div class="floatRight">
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
                        <div>@{{restaurantAddr}}</div>
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
@endsection

@section('script')
    <script>
        //滾輪滾到navbar
        $(document).ready().scroll(function () {
            var winTop = $("#restaurantDetailHeaderSearchLarge").offset().top;
            var navTop = $("#categoryBar").offset().top;
            if (winTop > navTop) {
                $("#categoryBarDiv").addClass("sticky-top");
                $("header").css("visibility","hidden");
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

                    // 餐廳名稱、外送時間 傳入 local
                    localStorage.setItem("restautantName", JSON.stringify(this.shop.ShopName));
                    localStorage.setItem("shipTime", JSON.stringify(this.shop.ShipTime));
                    localStorage.setItem("shopID", JSON.stringify(this.shop.ShopID));
                    // console.log(this.shop);
                }
            }
        })

        var meals = new Vue({
        el: "#meallist",
        data: {
            list: [],
            shop: [],
            temp: [],
            types:[]
            
        },
        methods: {
            init: function () {
                let _this = this;
                
                axios.get("/api/meal/{{$id}}")
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
                localStorage.clear();
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
    </script>
    {{-- google map api key --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvNZ5xYMFKm3OAfZNqzAxCzgbPYuZf4D4&callback=initMap" async defer></script>
@endsection