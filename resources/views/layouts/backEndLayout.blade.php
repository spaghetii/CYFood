<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>CYFood-BackEnd</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/css/backendorder.css">
    
</head>

<body>

    <div class="container-fluid h-100" id="App">

        {{-- 上排 --}}
        <div class="row">

            <!-- Logo -->
            <div class="line1 col row text-left"><img id="cyImg" src="/img/BElogo.png" class="col"><div class="col"></div></div>
            
            <!-- 下拉式選單 -->
            @yield('selectOption')

            <!-- 搜索輸入框 -->
            <div class="line1 col">
                <input id="searchinput" name="searchinput" type="search" placeholder="請輸入關鍵字"
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
            <div class="button_cont indexBTN col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='order'" target="_blank" rel="nofollow"><img id="leftImg" src="/img/backOrder.png" alt=""><span>&nbsp;訂&nbsp;單</a></div>
            {{-- <hr> --}}
            <div class="button_cont indexBTN col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='restaurant'" target="_blank" rel="nofollow"><img id="leftImg" src="/img/backRestaurant.png" alt=""><span>&nbsp;餐&nbsp;廳</a></div>
            {{-- <hr> --}}
            <div class="button_cont indexBTN col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='member'" target="_blank" rel="nofollow"><img id="leftImg" src="/img/backMember.png" alt=""><span>&nbsp;會&nbsp;員</a></div>
            {{-- <hr> --}}
            <div class="button_cont indexBTN col"><a class="indexBTN list-group-item list-group-item-action" onclick="location.href='coupon'" target="_blank" rel="nofollow"><img id="leftImg" src="/img/backCoupon.png" alt=""><span>&nbsp;優&nbsp;惠</a></div>                    
            {{-- <br> --}}
            
        </div>
        
        
        {{-- 右側 --}}
        @yield('content')

    </div>
    @yield('dialog')

    {{-- script --}}
    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
    @yield('script') 


</body>

</html>