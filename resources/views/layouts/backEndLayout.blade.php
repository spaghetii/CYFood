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
            <div class="line1 col row text-left"><img src="/img/BElogo.png" class="col"><div class="col"></div></div>
            
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
        <div id="divleft" class="col-2 text-center" >
            <br>
            <div class="button_cont col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='order'" target="_blank" rel="nofollow"><span>訂&emsp;&emsp;單</a></div>
            <hr>
            <div class="button_cont col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='restaurant'" target="_blank" rel="nofollow"><span>餐&emsp;&emsp;廳</a></div>
            <hr>
            <div class="button_cont col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='member'" target="_blank" rel="nofollow"><span>會&emsp;&emsp;員</a></div>
            <hr>
            <div class="button_cont col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='coupon'" target="_blank" rel="nofollow"><span>優&emsp;&emsp;惠</a></div>                    
            <br>
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