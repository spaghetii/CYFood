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
    {{-- 餐廳title資訊 --}}
    <div class="restaurantImgDiv">
        <div class="restaurantDetailDiv d-flex align-items-center">
            <div class="restaurantDetail container">
                <h2>Din Tai Fung鼎泰豐 中佑店</h2>
                <p class="mt-3 mb-0">$.中式料理</p>
                <div class="restaurantDetailList row container">
                    <div class="mt-4 mr-2">10 – 20 分鐘</div>
                    <div class="mt-4 mr-2"><img src="img/star1.png" class="mr-1">4.8/5</div>
                    <div class="mt-4 mr-2">60TWD 費用</div>
                </div> 
                <div class="restaurantDetailAddress">
                    <span>台中市西屯區台灣大道三段251號b2, Taichung.&nbsp;<a href="">詳細資訊</a></span>
                </div>
            </div>      
        </div>
    </div>

    {{-- 分類排 --}}
    <div class="container-fluid" id="categoryBar">
        <div class="row no-gutters">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav" id="categoryBarList">
                        <a class="nav-item nav-link" href="#popular">人氣精選 Popular Items</a>
                        <a class="nav-item nav-link" href="#xiaolongbao">小籠包 Xiaolongbao</a>
                        <a class="nav-item nav-link" href="#dumplingsShumai">餃類及燒賣 Dumplings and Shumai</a>
                        <a class="nav-item nav-link" href="#friedRice">炒飯 Stir-Fried Rice</a>
                        <a class="nav-item nav-link" href="#soups">湯品 Soups</a>
                        <a class="nav-item nav-link" href="#desserts">甜點 Desserts</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    {{-- 分類內容 --}}
    <div class="container-fluid categoryListDiv" id="popularList">
        <div id="popular">
            <h4>人氣精選 Popular Items</h4>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12 mt-5">
                <a href="#" class="categoryItem">
                    <div class="media">
                        <div class="media-body d-flex flex-column">
                            <div class="col-10">
                                <h5 class="categoryFoodTitle">小籠包 Pork Xiaolongbao</h5>
                                <h6 class="categoryFoodDesc">每份10入。附薑絲及醋包。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 
                                    Every portion 10 pieces. Served with shredded ginger and vinegar. Respond to the environmental protection, 
                                    restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                </h6>
                            </div>
                            <div class="col-2 align-items-end">
                                $220
                            </div>
                        </div>
                        <img src="img/food.jpg" class="categoryItemImg" alt="">
                    </div>
                </a>
            </div>       
            <div class="col-sm-4 col-12 mt-5">
                <a href="#" class="categoryItem">
                    <div class="media">
                        <div class="media-body d-flex flex-column">
                            <div class="col-10">
                                <h5 class="categoryFoodTitle">小籠包 Pork Xiaolongbao</h5>
                                <h6 class="categoryFoodDesc">每份10入。附薑絲及醋包。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 
                                    Every portion 10 pieces. Served with shredded ginger and vinegar. Respond to the environmental protection, 
                                    restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                </h6>
                            </div>
                            <div class="col-2 align-items-end">
                                $220
                            </div>
                        </div>
                        <img src="img/food.jpg" class="categoryItemImg" alt="">
                    </div>
                </a>
            </div>       
            <div class="col-sm-4 col-12 mt-5">
                <a href="#" class="categoryItem">
                    <div class="media">
                        <div class="media-body d-flex flex-column">
                            <div class="col-10">
                                <h5 class="categoryFoodTitle">小籠包 Pork Xiaolongbao</h5>
                                <h6 class="categoryFoodDesc">每份10入。附薑絲及醋包。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 
                                    Every portion 10 pieces. Served with shredded ginger and vinegar. Respond to the environmental protection, 
                                    restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                </h6>
                            </div>
                            <div class="col-2 align-items-end">
                                $220
                            </div>
                        </div>
                        <img src="img/food.jpg" class="categoryItemImg" alt="">
                    </div>
                </a>
            </div>       
        </div> <!-- row -->
    </div> <!-- popularList -->

    <div class="container-fluid categoryListDiv" id="xiaolongbaoList">
            <div id="xiaolongbao">
                <h4>小籠包 Xiaolongbao</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">松露小籠包 Truffle and Pork Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份5入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 5 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $450
                                </div>
                            </div>
                            <img src="img/food.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>       
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">松露小籠包 Truffle and Pork Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份5入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 5 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $450
                                </div>
                            </div>
                            <img src="img/food.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>       
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">松露小籠包 Truffle and Pork Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份5入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 5 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $450
                                </div>
                            </div>
                            <img src="img/food.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
            </div>       
        </div> <!-- row -->
    </div> <!-- xiaolongbaoList -->

    <div class="container-fluid categoryListDiv" id="dumplingsShumaiList">
            <div id="dumplingsShumai">
                <h4>餃類及燒賣 Dumplings and Shumai</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">蝦仁燒賣 Steamed Shrimp and Pork Shao Mai</h5>
                                    <h6 class="categoryFoodDesc">每份10入。附薑絲及醋包。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Served with shredded ginger and vinegar. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $360
                                </div>
                            </div>
                            <img src="img/food1.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">蝦仁燒賣 Steamed Shrimp and Pork Shao Mai</h5>
                                    <h6 class="categoryFoodDesc">每份10入。附薑絲及醋包。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Served with shredded ginger and vinegar. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $360
                                </div>
                            </div>
                            <img src="img/food1.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">蝦仁燒賣 Steamed Shrimp and Pork Shao Mai</h5>
                                    <h6 class="categoryFoodDesc">每份10入。附薑絲及醋包。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Served with shredded ginger and vinegar. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $360
                                </div>
                            </div>
                            <img src="img/food1.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>              
            </div> <!-- row -->
    </div> <!-- dumplingsShumaiList -->

    <div class="container-fluid categoryListDiv" id="friedRiceList">
                <div id="friedRice">
                    <h4>炒飯 Stir-Fried Rice</h4>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-12 mt-5">
                        <a href="#" class="categoryItem">
                            <div class="media">
                                <div class="media-body d-flex flex-column">
                                    <div class="col-10">
                                        <h5 class="categoryFoodTitle">肉絲蛋炒飯 Shredded Pork Fried Rice with Egg</h5>
                                        <h6 class="categoryFoodDesc">為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                        </h6>
                                    </div>
                                    <div class="col-2 align-items-end">
                                        $190
                                    </div>
                                </div>
                                <img src="img/food2.jpg" class="categoryItemImg" alt="">
                            </div>
                        </a>
                    </div>              
                    <div class="col-sm-4 col-12 mt-5">
                        <a href="#" class="categoryItem">
                            <div class="media">
                                <div class="media-body d-flex flex-column">
                                    <div class="col-10">
                                        <h5 class="categoryFoodTitle">肉絲蛋炒飯 Shredded Pork Fried Rice with Egg</h5>
                                        <h6 class="categoryFoodDesc">為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                        </h6>
                                    </div>
                                    <div class="col-2 align-items-end">
                                        $190
                                    </div>
                                </div>
                                <img src="img/food2.jpg" class="categoryItemImg" alt="">
                            </div>
                        </a>
                    </div>              
                    <div class="col-sm-4 col-12 mt-5">
                        <a href="#" class="categoryItem">
                            <div class="media">
                                <div class="media-body d-flex flex-column">
                                    <div class="col-10">
                                        <h5 class="categoryFoodTitle">肉絲蛋炒飯 Shredded Pork Fried Rice with Egg</h5>
                                        <h6 class="categoryFoodDesc">為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                        </h6>
                                    </div>
                                    <div class="col-2 align-items-end">
                                        $190
                                    </div>
                                </div>
                                <img src="img/food2.jpg" class="categoryItemImg" alt="">
                            </div>
                        </a>
                    </div>              
                </div> <!-- row -->
    </div> <!-- friedRiceList -->

    <div class="container-fluid categoryListDiv" id="soupsList">
            <div id="soups">
                <h4>湯品 Soups</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">紅燒牛肉湯 Braised Beef Soup</h5>
                                    <h6 class="categoryFoodDesc">為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $230
                                </div>
                            </div>
                            <img src="img/food3.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">紅燒牛肉湯 Braised Beef Soup</h5>
                                    <h6 class="categoryFoodDesc">為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $230
                                </div>
                            </div>
                            <img src="img/food3.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>              
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">紅燒牛肉湯 Braised Beef Soup</h5>
                                    <h6 class="categoryFoodDesc">為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $230
                                </div>
                            </div>
                            <img src="img/food3.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>              
            </div> <!-- row -->
    </div> <!-- soupsList -->

    <div class="container-fluid categoryListDiv" id="dessertsList">
            <div id="desserts">
                <h4>甜點 Desserts</h4>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">豆沙小籠包 Red Bean Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份10入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $170
                                </div>
                            </div>
                            <img src="img/food4.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>                  
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">豆沙小籠包 Red Bean Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份10入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $170
                                </div>
                            </div>
                            <img src="img/food4.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>                  
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">豆沙小籠包 Red Bean Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份10入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $170
                                </div>
                            </div>
                            <img src="img/food4.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>                  
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">豆沙小籠包 Red Bean Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份10入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $170
                                </div>
                            </div>
                            <img src="img/food4.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>                  
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">豆沙小籠包 Red Bean Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份10入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $170
                                </div>
                            </div>
                            <img src="img/food4.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>                  
                <div class="col-sm-4 col-12 mt-5">
                    <a href="#" class="categoryItem">
                        <div class="media">
                            <div class="media-body d-flex flex-column">
                                <div class="col-10">
                                    <h5 class="categoryFoodTitle">豆沙小籠包 Red Bean Xiaolongbao</h5>
                                    <h6 class="categoryFoodDesc">每份10入。為響應環保, 恕不主動提供餐具。基於餐點口味及品質, 調整會影響餐點口味, 恕不提供客制化選項。 Every portion 10 pieces. Respond to the environmental protection, restaurant does not initiative on providing disposable tableware. No customization options are available in order to avoid on affecting the taste and food quality.
                                    </h6>
                                </div>
                                <div class="col-2 align-items-end">
                                    $170
                                </div>
                            </div>
                            <img src="img/food4.jpg" class="categoryItemImg" alt="">
                        </div>
                    </a>
                </div>                  
            </div> <!-- row -->
    </div> <!-- dessertsList -->
@endsection

@section('script')
    <script>
        // //滾輪滾到navbar
        // $(document).ready().scroll(function () {
        //     var winTop = $("#restaurantDetailHeaderSearchLarge").offset().top;
        //     var navTop = $("#categoryBar").offset().top;
        //     if (winTop > navTop) {
        //         $("#categoryBar").addClass("fixed-top");
        //     }
        // })
    </script>
@endsection