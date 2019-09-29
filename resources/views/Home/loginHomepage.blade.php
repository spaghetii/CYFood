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
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/drink.jpg" class="restaurantImage" alt=""></div>
                        <div class="todayRecommendContent">
                            <div class="row mt-2">
                                可不可熟成紅茶 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 todayRecommendContentItem"><small>$.飲料</small></div>
                                <div class="mr-1 todayRecommendContentItem"><img src="img/star1.png" class="mr-1"><small>4.7/5</small></div>
                                <div class="mr-1 todayRecommendContentItem"><small>60TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/drink.jpg" class="restaurantImage" alt=""></div>
                        <div class="todayRecommendContent">
                            <div class="row mt-2">
                                可不可熟成紅茶 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 todayRecommendContentItem"><small>$.飲料</small></div>
                                <div class="mr-1 todayRecommendContentItem"><img src="img/star1.png" class="mr-1"><small>4.7/5</small></div>
                                <div class="mr-1 todayRecommendContentItem"><small>60TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/drink.jpg" class="restaurantImage" alt=""></div>
                        <div class="todayRecommendContent">
                            <div class="row mt-2">
                                可不可熟成紅茶 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 todayRecommendContentItem"><small>$.飲料</small></div>
                                <div class="mr-1 todayRecommendContentItem"><img src="img/star1.png" class="mr-1"><small>4.7/5</small></div>
                                <div class="mr-1 todayRecommendContentItem"><small>60TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/drink.jpg" class="restaurantImage" alt=""></div>
                        <div class="todayRecommendContent">
                            <div class="row mt-2">
                                可不可熟成紅茶 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 todayRecommendContentItem"><small>$.飲料</small></div>
                                <div class="mr-1 todayRecommendContentItem"><img src="img/star1.png" class="mr-1"><small>4.7/5</small></div>
                                <div class="mr-1 todayRecommendContentItem"><small>60TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/drink.jpg" class="restaurantImage" alt=""></div>
                        <div class="todayRecommendContent">
                            <div class="row mt-2">
                                可不可熟成紅茶 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 todayRecommendContentItem"><small>$.飲料</small></div>
                                <div class="mr-1 todayRecommendContentItem"><img src="img/star1.png" class="mr-1"><small>4.7/5</small></div>
                                <div class="mr-1 todayRecommendContentItem"><small>60TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/drink.jpg" class="restaurantImage" alt=""></div>
                        <div class="todayRecommendContent">
                            <div class="row mt-2">
                                可不可熟成紅茶 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 todayRecommendContentItem"><small>$.飲料</small></div>
                                <div class="mr-1 todayRecommendContentItem"><img src="img/star1.png" class="mr-1"><small>4.7/5</small></div>
                                <div class="mr-1 todayRecommendContentItem"><small>60TWD 費用</small></div>
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
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/MC.jpg" class="restaurantImage" alt=""></div>
                        <div class="popularRestaurantContent">
                            <div class="row mt-2">
                                麥當勞 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 popularRestaurantContentItem"><small>$.美式美食</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><img src="img/star1.png" class="mr-1"><small>4.9/5</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><small>30TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>                 
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/MC.jpg" class="restaurantImage" alt=""></div>
                        <div class="popularRestaurantContent">
                            <div class="row mt-2">
                                麥當勞 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 popularRestaurantContentItem"><small>$.美式美食</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><img src="img/star1.png" class="mr-1"><small>4.9/5</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><small>30TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>                 
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/MC.jpg" class="restaurantImage" alt=""></div>
                        <div class="popularRestaurantContent">
                            <div class="row mt-2">
                                麥當勞 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 popularRestaurantContentItem"><small>$.美式美食</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><img src="img/star1.png" class="mr-1"><small>4.9/5</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><small>30TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>                 
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/MC.jpg" class="restaurantImage" alt=""></div>
                        <div class="popularRestaurantContent">
                            <div class="row mt-2">
                                麥當勞 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 popularRestaurantContentItem"><small>$.美式美食</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><img src="img/star1.png" class="mr-1"><small>4.9/5</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><small>30TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>                 
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/MC.jpg" class="restaurantImage" alt=""></div>
                        <div class="popularRestaurantContent">
                            <div class="row mt-2">
                                麥當勞 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 popularRestaurantContentItem"><small>$.美式美食</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><img src="img/star1.png" class="mr-1"><small>4.9/5</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><small>30TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>                 
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="restaurantLink">
                        <div><img src="img/MC.jpg" class="restaurantImage" alt=""></div>
                        <div class="popularRestaurantContent">
                            <div class="row mt-2">
                                麥當勞 中佑店
                            </div>
                            <div class="row mt-2">
                                <div class="mr-1 popularRestaurantContentItem"><small>$.美式美食</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><img src="img/star1.png" class="mr-1"><small>4.9/5</small></div>
                                <div class="mr-1 popularRestaurantContentItem"><small>30TWD 費用</small></div>
                            </div>
                        </div>
                    </a>
                </div>                 
            </div> <!-- row -->
        </div> <!-- popularRestaurant --> 

        <div class="displayMore container-fluid">
            <div class="row justify-content-center align-items-center mt-5 mb-5">
                <button type="button" class="btn btn-lg btn-dark ">顯示更多餐廳</button>
            </div>
        </div>

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
    </script>
@endsection
