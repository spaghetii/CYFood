@extends('layouts.layout')

{{-- 隱藏式 header 地址搜尋 --}}
@section('headerSearchLarge')
<!-- 區域選擇 -->
    <div class="form-group navbar-nav col-sm-1" id="headerAreaLarge">
        <select class="form-control">
            <option>區域</option>
            <option>西區</option>
            <option>北區</option>
            <option>東區</option>
            <option>南區</option>
            <option>中區</option>
            <option>西屯區</option>
            <option>南屯區</option>
            <option>北屯區</option>
        </select>
    </div>  
    <!-- 類別篩選 -->
    <div class="form-group navbar-nav col-sm-1" id="headerCategoryLarge">
        <select class="form-control">
            <option>類別</option>
            <option>中式美食</option>
            <option>日式美食</option>
            <option>美式美食</option>
            <option>韓式美食</option>
            <option>泰式美食</option>
            <option>義式美食</option>
            <option>甜點</option>
            <option>飲料</option>
        </select>
    </div>  
    <!-- 地址搜尋 -->
    <div class="input-group navbar-nav col-sm-4" id="headerSearchLarge">
        <input type="text" class="form-control" placeholder="請輸入地址" value="台中市南屯區公益路二段51號">
        <div class="input-group-append">
            <button class="btn btn-warning" type="submit" id="headerSearchAddressButton">Go</button>
        </div>
    </div>
@endsection

{{-- 網頁內容 --}}
@section('content')
    <div class="mainHead">
        <div class="mainSearchDiv">
            <div>
                <h1 class="mb-4 col-sm-12">把您想吃的美食外送到府</h1>
            </div>
            <div class="container">
                <!-- 區域選擇 -->
                <div class="form-group col-sm-2 col-12" id="selectArea">
                    <select class="form-control">
                        <option>選擇區域</option>
                        <option>西區</option>
                        <option>北區</option>
                        <option>東區</option>
                        <option>南區</option>
                        <option>中區</option>
                        <option>西屯區</option>
                        <option>南屯區</option>
                        <option>北屯區</option>
                    </select>
                </div>  
                <!-- 類別篩選 -->
                <div class="form-group col-sm-2 col-12" id="selectCategory">
                    <select class="form-control">
                        <option>選擇類別</option>
                        <option>中式美食</option>
                        <option>日式美食</option>
                        <option>美式美食</option>
                        <option>韓式美食</option>
                        <option>泰式美食</option>
                        <option>義式美食</option>
                        <option>甜點</option>
                        <option>飲料</option>
                    </select>
                </div>  
                <!-- 地址搜尋 -->
                <div class="input-group col-sm-8 col-12" id="SearchAddress">
                    <input type="text" class="form-control" placeholder="請輸入地址" value="台中市南屯區公益路二段51號">
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="submit" id="mainSearchAddressButton">Go</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 本日推薦 -->
    <div class="container-fluid" id="todayRecommend">
            <div>
                <h3>本日推薦</h3>
            </div>
            <div class="row">
                <div v-for="item in recommend" class="col-sm-4 col-12 mt-5">
                    <a :href="'/restaurant/'+ item.ShopID" class="restaurantLink">
                        <div><img :src="item.ShopImage" class="restaurantImage" alt=""></div>
                        <div class="todayRecommendContent">
                            <div class="row mt-2">
                                @{{item.ShopName}}
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 todayRecommendContentItem"><small>$.@{{item.ShopType}}</small></div>
                                <div class="mr-1 todayRecommendContentItem"><img src="img/star1.png" class="mr-1"><small>4.7/5</small></div>
                                <div class="mr-1 todayRecommendContentItem"><small>15TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>                            
            </div> <!-- row -->
        </div> <!-- todayRecommend --> 

        {{-- 分隔線 --}}
        <div class="separationline">
                <hr>
        </div>

    <!-- 熱門餐廳 -->
    <div class="container-fluid" id="popularRestaurant">
            <div>
                <h3>熱門餐廳</h3>
            </div>
            <div class="row">
                <div v-for="(item,index) in list" class="col-sm-4 col-12 mt-5">
                    <a :href="'/restaurant/'+ item.ShopID" class="restaurantLink">
                        <div><img :src="item.ShopImage" class="restaurantImage" alt=""></div>
                        <div class="popularRestaurantContent">
                            <div class="row mt-2">
                                @{{item.ShopName}}
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 popularRestaurantContentItem"><small>$.@{{item.ShopType}}</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><img src="img/star1.png" class="mr-1"><small>4.9/5</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><small>15TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>        
            </div> <!-- row -->
             {{-- 顯示更多 btn --}}
            <div class="displayMore container-fluid">
                <div class="row justify-content-center align-items-center mt-5 mb-5">
                    <button type="button" class="btn btn-lg btn-dark" v-on:click="displayBtn" v-if="btnShow">顯示更多餐廳</button>
                </div>
            </div>
            {{-- loading spinners --}}
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" v-if="spinnerShow" role="status">
                </div>
            </div>
        </div> <!-- popularRestaurant --> 

@endsection

@section('script')
    <script>
        $("#headerSearchAddressButton,#mainSearchAddressButton").on("click",function(){
            alert('oops!');
        });  
        
        // 隱藏式 header 地址搜尋 顯示判斷
        $(document).ready().scroll(function () {
            var winTop = $("#headerSearchLarge").offset().top;
            var searchDivTop = $("#SearchAddress").offset().top;
            if (winTop > searchDivTop) {
                $("#headerSearchLarge,#headerAreaLarge,#headerCategoryLarge").css("visibility","visible");
            }else{
                $("#headerSearchLarge,#headerAreaLarge,#headerCategoryLarge").css("visibility","hidden");
            }
        });
        var recommendApp = new Vue({
            el: "#todayRecommend",
            data: {
                temp: [],
                recommend:[]
            },
            methods: {
                init: function () {
                    let _this = this;
                    axios.get('/api/shop')
                        .then(function (response) {
                            _this.temp = response.data;
                            
                            //本日推薦(隨機推薦)
                            for (i = _this.temp.length - 1; i > 0; i--) {
                                    j = Math.floor(Math.random() * (i + 1));
                                    temp = _this.temp[i];
                                    _this.temp[i] = _this.temp[j];
                                    _this.temp[j] = temp;
                                }
                            
                            //取前3或6筆
                            _this.recommend = _this.temp.filter(function(item, index, array){
                                return index < 3;    // 取得陣列中雙數的物件
                                });
                            // console.log(_this.recommend);
                        })
                        .catch(function (response) {
                            console.log(response);
                        });
                }
            },
            mounted: function () {
                this.init();
            }
        });
        var loginshop = new Vue({
            el: "#popularRestaurant",
            data: {
                list: [],
                listtemp:[],
                listTotal: [],
                btnShow: true,
                spinnerShow: false,
            },
            methods: {
                init: function () {
                    let _this = this;
                    axios.get('/api/shop')
                        .then(function (response) {
                            _this.listtemp = response.data;
                            _this.listTotal = _this.listtemp;
                            //篩選出跟本日推薦不重複的餐廳
                            recommendApp.recommend.forEach((r_ele,r_index) => {
                                _this.listTotal = _this.listTotal.filter(function(element, index, arr){
                                    // console.log(!(arr[index].ShopID==recommendApp.recommend[r_index].ShopID));
                                    // console.log(arr.indexOf(element) === index);
                                    return (!(arr[index].ShopID==recommendApp.recommend[r_index].ShopID));
                                });
                                _this.list = _this.listTotal.slice(0,6);
                            });
                        })
                        .catch(function (response) {
                            // console.log(response);
                        });
                },
                displayBtn: function(){
                    let _this = this;
                    this.btnShow = false;
                    this.spinnerShow = true;
                    setTimeout( function(){  
                        _this.list = _this.listTotal.slice(0,_this.list.length+6);
                        _this.spinnerShow = false;
                        _this.btnShow = true;
                        if (_this.list.length == _this.listTotal.length){
                            _this.btnShow = false;
                            }}
                    ,2000)
                    // console.log(this.list.length);
                    // console.log(this.listTotal.length);
                },
            },
            mounted: function () {
                this.init();
            }
        });
    </script>
@endsection