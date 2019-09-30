<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CYFood-BackEnd</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/backendorder.css">
    
</head>

<body>

    <div class="container-fluid" >

        {{-- 上排 --}}
        <div class="row">

            <!-- Logo -->
            <div class="line1 col">CYFood</div>
            
            <!-- 下拉式選單 -->
            @yield('selectOption')

            <!-- 搜索輸入框 -->
            <div class="line1 col">
                <input id="searchinput" name="searchinput" type="search" placeholder="我是輸入框......"
                    class="form-control input-md">
            </div>

            <!-- 開始查詢 -->
            <div class="line1 col">
                <button id="searchbutton" name="searchbutton" class="btn btn-primary">開始查詢</button>
            </div>
        </div>
        <hr>

        {{-- 左側 --}}
        <div id="divleft">
            <div id="buttonleft">
                <button id="orderbutton" name="orderbutton" class="information-btn"
                    onclick="location.href='order'">訂單</button>
                <br>
                <br>
                <button id="restaurantbutton" name="restaurantbutton" class="information-btn"
                    onclick="location.href='restaurant'">餐廳</button>
                <br>
                <br>
                <button id="memberbutton" name="orderbutton" class="information-btn"
                    onclick="location.href='member'">會員</button>
                <br>
                <br>
                <button id="preferentialbutton" name="orderbutton" class="information-btn"
                    onclick="location.href='coupon'">優惠</button>
                <br>
                <br>
            </div>
        </div>

        {{-- 右側 --}}
        @yield('content')

    </div>
    
    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
    @yield('script') 


</body>

</html>