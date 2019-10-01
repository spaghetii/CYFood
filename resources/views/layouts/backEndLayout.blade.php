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

    <div class="container-fluid" id="App">

        {{-- 上排 --}}
        <div class="row">

            <!-- Logo -->
            <div class="line1 col display-4">CY Food</div>
            
            <!-- 下拉式選單 -->
            @yield('selectOption')

            <!-- 搜索輸入框 -->
            <div class="line1 col">
                <input id="searchinput" name="searchinput" type="search" placeholder="我是輸入框......"
                    class="form-control input-md" v-model="search">
            </div>

            <!-- 開始查詢 -->
            {{-- <div class="line1 col">
                <button id="searchbutton" name="searchbutton" class="btn btn-primary">開始查詢</button>
            </div> --}}
        </div>
        <hr>
        {{-- 左側 --}}
        <div id="divleft"  >
            <div id="buttonleft" class="list-group" >
                <br><br>
                <a id="orderbutton" class="list-group-item list-group-item-action" onclick="location.href='order'">訂 單</a>
                <br><br>
                <a id="restaurantbutton" class="list-group-item list-group-item-action" onclick="location.href='restaurant'">餐 廳</a>
                <br><br>
                <a id="memberbutton" class="list-group-item list-group-item-action" onclick="location.href='member'">會 員</a>
                <br><br>
                <a id="preferentialbutton" class="list-group-item list-group-item-action" onclick="location.href='coupon'">優 惠</a>
                
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