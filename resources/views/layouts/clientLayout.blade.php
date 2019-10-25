<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CYFood-Restaurant</title>
    <!-- 網頁 icon -->
    <link rel="icon" href="/img/burger.ico" type="image/x-icon">
    <!-- vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- bootstrap -->
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
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    {{-- Topcss --}}
    <link rel="stylesheet" href="/css/clientTop.css">
    {{-- v-charts --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/v-charts/lib/index.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/v-charts/lib/style.min.css">
</head>
<body>
    <div class="container-fuild">
        <!-- top -->
        <div class="row no-gutters sticky-top" id="fixedDiv" v-cloak>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/newOrder/{{$id}}">
                    <div class="fixedItem" v-on:mouseover="mouseOver(1)" v-on:mouseout="mouseOut(1)">
                        <img src="/img/client/neworder.png" alt="" v-if="show1">
                        <div class="showFont" v-if="showFont1">新訂單</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/processing/{{$id}}">
                    <div class="fixedItem" v-on:mouseover="mouseOver(2)" v-on:mouseout="mouseOut(2)">
                        <img src="/img/client/processing.png" alt="" v-if="show2">
                        <div class="showFont" v-if="showFont2">處理中</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/takeout/{{$id}}">
                    <div class="fixedItem" v-on:mouseover="mouseOver(3)" v-on:mouseout="mouseOut(3)">
                        <img src="/img/client/takeout.png" alt="" v-if="show3">
                        <div class="showFont" v-if="showFont3">待取餐</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/user/{{$id}}">
                    <div class="fixedItem" v-on:mouseover="mouseOver(4)" v-on:mouseout="mouseOut(4)">
                        <img src="/img/client/user.png" alt="" v-if="show4">
                        <div class="showFont" v-if="showFont4">會員頁</div>
                    </div>
                </a>
            </div>
        </div>
        {{-- bottom --}}
        @yield('content')

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    <script>
        var fixedDiv = new Vue({
            el:"#fixedDiv",
            data:{
                show1:true,
                show2:true,
                show3:true,
                show4:true,
                showFont1:false,
                showFont2:false,
                showFont3:false,
                showFont4:false,
            },
            methods:{
                mouseOver:function(e){
                    if(e==1){this.show1 = false;this.showFont1 = true;}
                    if(e==2){this.show2 = false;this.showFont2 = true;}
                    if(e==3){this.show3 = false;this.showFont3 = true;}
                    if(e==4){this.show4 = false;this.showFont4 = true;}
                    
                },
                mouseOut:function(e){
                    if(e==1){this.show1 = true;this.showFont1 = false;}
                    if(e==2){this.show2 = true;this.showFont2 = false;}
                    if(e==3){this.show3 = true;this.showFont3 = false;}
                    if(e==4){this.show4 = true;this.showFont4 = false;}
                }
            }
        })
    </script>


    @yield('script')

</body>
</html>