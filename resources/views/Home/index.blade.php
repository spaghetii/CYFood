@extends('layouts.layout')

{{-- 隱藏式 header 地址搜尋 --}}
@section('headerSearchLarge')
    <div class="input-group navbar col-sm-6" id="headerSearchLarge">
        <input type="text" class="form-control" placeholder="請輸入地址" value="台中市南屯區公益路二段51號">
        <div class="input-group-append">
            <button class="btn btn-warning" type="submit" id="SearchAddressButton">Go</button>
        </div>
    </div>
@endsection

@section('content')

    <div class="mainHead">
        <div class="mainSearchDiv">
            <div>
                <h1 class="mb-4 col-sm-12">把您想吃的美食外送到府</h1>
            </div>
            <div class="container">  
                <!-- 地址搜尋 -->
                <div class="input-group col-sm-12 col-12" id="SearchAddress">
                    <input type="text" class="form-control" placeholder="請輸入地址" value="台中市南屯區公益路二段51號">
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="submit" id="SearchAddressButton">Go</button>
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
            <div class="col-sm-4 mt-5">
                <div class="todayRecommendImage"></div>
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
            </div>
            <div class="col-sm-4 mt-5">
                <div class="todayRecommendImage"></div>
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
            </div>
            <div class="col-sm-4 mt-5">
                <div class="todayRecommendImage"></div>
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
            </div>
            <div class="col-sm-4 mt-5">
                <div class="todayRecommendImage"></div>
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
            </div>
            <div class="col-sm-4 mt-5">
                <div class="todayRecommendImage"></div>
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
            </div>
            <div class="col-sm-4 mt-5">
                <div class="todayRecommendImage"></div>
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
            </div>
        </div>    
    </div>
    
    {{-- 餐廳加入 div --}}
    <div class="restaurantJoinUs">
        <div class="restaurantJoinUsContent">
            <div>
                <p><h3>加入CY Food，把你的美食分享給大家！</h3></p>
                <p>想要上千名新顧客試試你的美食嗎？我們想，相信你也是！</p>
                <p>達到這個目的超簡單：</p>
                <p>我們把你的菜單放上線、幫你處理訂單、到餐廳去取餐、將餐點外送給顧客們！</p>
                <p>還等什麼？一起和我們開啟這個外送美食給大家的旅程吧！</p>
            </div>
            <div>
                <a href="" class="btn btn-warning" id="restaurantJoinBtn" role="button" aria-pressed="true">立即加入</a>
            </div>
        </div>
    </div>
    
    {{-- 與footer分隔線 --}}
    <div class="container-fluid separationline">
        <hr>
    </div>   

    <script>
        $("#SearchAddressButton").on("click",function(){
            alert('oops!');
        });  
        
        // 隱藏式 header 地址搜尋 顯示判斷
        $(window).scroll(function () {
                var winTop = $("#headerSearchLarge").offset().top;
                var navTop = $("#SearchAddress").offset().top;
                if (winTop > navTop) {
                    $("#headerSearchLarge").css("visibility","visible");
                }else{
                    $("#headerSearchLarge").css("visibility","hidden");
                }
        })
    </script>
@endsection
