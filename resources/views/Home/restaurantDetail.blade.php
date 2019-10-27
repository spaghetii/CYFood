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
            <ul style="list-style: none;" class="noPad noMarg">
                <li v-if="mealtype2">
                    {{-- 細項抬頭 --}}
                    <div id="orderDetailTitleDiv" >
                        <div>
                            <h6 class="noMarg">份量 Size</h6>
                        </div>
                        <div>
                            <small>必填</small>
                        </div>
                    </div>
                    {{-- 細項選項 --}}
                    <div v-for="meal,index in mealDetail" v-if="meal.type==2" v-cloak>
                        <p class="noMarg">
                            <input type="radio" :id="meal.detailName" v-model="Size" name="Size" class="orangeRad" :value="index">
                            <label :for="meal.detailName" class="d-flex flex-row" id="orederDetailDescDiv">
                                @{{meal.detailName}} 
                                <span class="ml-auto mr-4" v-if="meal.price != 0">+$@{{meal.price}}</span>
                            </label>
                        </p>
                    </div>
                </li>
                <li v-if="mealtype1">
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
                    <div v-for="meal,index in mealDetail" v-if="meal.type==1" v-cloak>
                        <p class="noMarg">
                            <input type="checkbox" :id="meal.detailName" v-model="addOns" name="addOns[]" class="orangeRad" :value="index">
                            <label :for="meal.detailName" class="d-flex flex-row" id="orederDetailDescDiv">
                                @{{meal.detailName}} 
                                <span class="ml-auto mr-4" v-if="meal.price != 0">+$@{{meal.price}}</span>
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
            <button type="button" class="btn btn-lg btn-block" v-on:click="orderBtn" :disabled="isDisabled">
                <div class="">
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
                totalPrice: 0,
                shop:[],
                // 餐廳細項
                mealDetail:[],
                mealtype1:false,
                mealtype2:false,
                getHref: true,
                addOns:[],
                Size:-1,

                sizePrice:0,
                addPrice:0,
                unitMealDetailSize:[],
                unitMealDetailAdd:[],
                unitMealDetailTotal:[],
                mealPriceArray2:[],

                isDisabled:false,
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
                        //  console.log(this.totalPrice);
                        mealNameArray.push(this.meals.MealName);
                        mealPriceArray.push(this.totalPrice);
                        mealQuantityArray.push(this.count);
                        localStorage.setItem("mealNameArray", JSON.stringify(mealNameArray));
                        localStorage.setItem("mealPriceArray", JSON.stringify(mealPriceArray));
                        localStorage.setItem("mealQuantityArray", JSON.stringify(mealQuantityArray));

                        // 資料傳入到 shoppingBagModalApp-Vue
                        shoppingBagModalApp.shoppingBagMealName.push(this.meals.MealName);
                        shoppingBagModalApp.shoppingBagMealPrice.push(this.totalPrice);
                        shoppingBagModalApp.shoppingBagMealQuantity.push(this.count);  
                        shoppingBagModalApp.shoppingBagMealTotalPrice.push(this.totalPrice * this.count);  
                        // 餐點總金額 傳入 local
                        localStorage.setItem("mealTotalPriceArray", JSON.stringify(shoppingBagModalApp.shoppingBagMealTotalPrice));

                        // 餐廳名稱、外送時間、圖片 傳入 local
                        localStorage.setItem("restautantName", JSON.stringify(this.shop.ShopName));
                        localStorage.setItem("shopID", JSON.stringify(this.shop.ShopID));
                        localStorage.setItem("shipTime", JSON.stringify(this.shop.ShipTime));
                        localStorage.setItem("shopImage", JSON.stringify(this.shop.ShopImage));     //多塞一個餐廳圖片  歷史訂單要用 by 林培誠
                        // console.log(this.shop);
                        
                        // 餐點細項 20191025
                        this.unitMealDetailTotal.push({Size:this.unitMealDetailSize,Add:this.unitMealDetailAdd});
                        // console.log(typeof shoppingBagModalApp.shoppingBagMealDetail);
                        // console.log(shoppingBagModalApp.shoppingBagMealDetail);
                        shoppingBagModalApp.storedUnitMealDetailTotalArray.push(this.unitMealDetailTotal);
                        shoppingBagModalApp.shoppingBagMealDetail = shoppingBagModalApp.storedUnitMealDetailTotalArray;
                        // console.log(shoppingBagModalApp.shoppingBagMealDetail);
                        // console.log(this.unitMealDetailTotal);
                        localStorage.setItem("unitMealDetailTotalArray", JSON.stringify(this.unitMealDetailTotal));
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
                        this.unitMealDetailTotal.push({Size:this.unitMealDetailSize,Add:this.unitMealDetailAdd});
                        newOrderMadalApp.shoppingBagMealDetail = this.unitMealDetailTotal;
                        console.log(this.unitMealDetailTotal);
                    }
                }
            },
            watch:{
                Size:function(index){
                    // console.log(index);
                    // console.log(this.mealDetail[index].price);
                    this.totalPrice = this.count * parseInt(this.meals.MealPrice);
                    if(index !== -1){
                        this.sizePrice = parseInt(this.mealDetail[index].price);

                        let mealDetaillist = this.mealDetail[index];
                        // console.log(this.meals);
                        this.unitMealDetailSize= [{type:mealDetaillist.type, mealNum:"meal"+this.meals.MealID, detail:mealDetaillist.detailName, price:mealDetaillist.price}];
                        // console.log(this.unitMealDetailSize);
                        this.isDisabled = false;
                    }
                    this.totalPrice += this.sizePrice + this.addPrice;

                    // console.log(this.totalPrice);
                },
                addOns:function(index){
                    // console.log(index);
                    this.totalPrice = this.count * parseInt(this.meals.MealPrice);
                    let _this = this;
                    this.addPrice = 0;
                    this.unitMealDetailAdd = [];
                    index.forEach(element => {
                        _this.addPrice = _this.addPrice + parseInt(_this.mealDetail[element].price);
                        // console.log(_this.mealDetail[element]);
                        let mealDetaillist = _this.mealDetail[element];
                        _this.unitMealDetailAdd.push({type:mealDetaillist.type, mealNum:"meal"+this.meals.MealID, detail:mealDetaillist.detailName, price:mealDetaillist.price});
                        // console.log(_this.unitMealDetailAdd);
                    });
                    this.totalPrice += this.sizePrice + this.addPrice;
                }
            }
        })

    var meals = new Vue({
        el: "#meallist",
        data: {
            list: [],
            shop: [],
            temp: [],
            types:[],
            shopID:-1,
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
                        // console.log(response);
                    });
                
            },
            selection: function(e){
                orderModal.mealtype1 = false;
                orderModal.mealtype2 = false;
                orderModal.isDisabled = false; //20191027 order Btn disabled ---
                orderModal.addOns = [];
                orderModal.Size = -1;
                orderModal.count = 1;
                orderModal.meals = this.list[e];
                orderModal.totalPrice = this.list[e].MealPrice;  
                // console.log(orderModal.meals);
                if ( orderModal.meals.MealDetails !== null) {
                    orderModal.mealDetail = JSON.parse(orderModal.meals.MealDetails).detail;
                    orderModal.mealDetail.forEach(element => {
                        // console.log(element.type);
                        if (element.type == '1'){
                            orderModal.mealtype1 = true;
                        }
                        if (element.type == '0'){
                            orderModal.mealtype1 = false;
                            orderModal.mealtype2 = false;
                        }
                        if (element.type == '2'){
                            orderModal.mealtype2 = true;                       
                        }
                    });
                }
                if ( orderModal.mealtype2 == true ) {
                    orderModal.isDisabled = true;
                }
                // console.log(orderModal.mealDetail);
                $("#orderModalCenter").modal( { show: true } );
            }
        },
        mounted: function () {
            let getHref = (location.href).split("/");
            this.shopID = getHref[getHref.length-1];
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
            shoppingBagMealDetail:[],
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

                shoppingBagModalApp.shoppingBagMealDetail = [];
                shoppingBagModalApp.shoppingBagMealDetail.push(this.shoppingBagMealDetail);
                localStorage.setItem("unitMealDetailTotalArray", JSON.stringify(this.shoppingBagMealDetail));
            },
        },
    })
    </script>
    {{-- google map api key --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvNZ5xYMFKm3OAfZNqzAxCzgbPYuZf4D4&callback=initMap" async defer></script>
@endsection