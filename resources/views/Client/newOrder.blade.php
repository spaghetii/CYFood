<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        .container-fuild {
            width: 100%;
            height: 100%;
        }

        #fixedDiv {
            height: 140px;
            background-color: white;
        }

        .fixedItem {
            background-color: orange;
            width: 300px;
            height: 120px;
            margin: 10px auto;
        }

        img {
            width: 70px;
            height: 80px;
            margin: 20px 115px;
        }

        #buttomDiv {
            height: 550px;
        }

        #leftButtom {
            width: 400px;
            height: 500px;
            margin: 25px auto;
        }

        #orderBtn {
            height: 80px;
            font-size: 28px;
            font-weight: bold;
            margin: 10px auto;
        }

        #rightButtom {
            width: 840px;
            height: 500px;
            margin: 25px auto;
            position: fixed;
        }

        .jumbotron {
            width: 800px;
            height: 480px;
            margin: 10px 20px;
            font-family: Microsoft JhengHei;
            display: none;
        }

        /* 複製 */
        #detailsTitle {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
        }

        #detailsItem {
            width: 500px;
            margin: auto;
            max-height: 150px;
            /* overflow: auto; */
        }

        #detailsTotal {
            width: 500px;
            margin: auto;
        }

        #detailsButton {
            width: 600px;
            margin: auto;
        }
        .detailsBtn{
            font-size: 28px;
            margin: auto;
            display: block;
        }
    </style>
</head>

<body>
    <div class="container-fuild h-100">
        <!-- top -->
        <div class="row no-gutters sticky-top" id="fixedDiv">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/newOrder">
                    <div class="fixedItem">
                        <img src="/img/client/neworder.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/processing">
                    <div class="fixedItem">
                        <img src="/img/client/processing.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/takeout">
                    <div class="fixedItem">
                        <img src="/img/client/takeout.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/user">
                    <div class="fixedItem">
                        <img src="/img/client/user.png" alt="">
                    </div>
                </a>
            </div>
        </div>
        <!-- buttom -->
        <div class="row no-gutters" id="buttomDiv">
            <div class="col-4">
                <div id="leftButtom">
                    <button type="button" class="btn btn-secondary btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                    <button type="button" class="btn btn-secondary btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                    <button type="button" class="btn btn-secondary btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                    <button type="button" class="btn btn-secondary btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                    <button type="button" class="btn btn-secondary btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                    <button type="button" class="btn btn-secondary btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                    <button type="button" class="btn btn-secondary btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                </div>
            </div>
            <div class="col-8">
                <div id="rightButtom">
                    <div class="jumbotron">
                        <!-- 訂單標題 -->
                        <h1 class="display-4" id="detailsTitle">@{{detailsTitle}}</h1>
                        <hr class="my-4">
                        <!-- 訂單內容 -->
                        <h3>
                            <div class="row" id="detailsItem">
                                <div class="col-2">
                                    <span>@{{detailsCount}}x</span>
                                </div>
                                <div class="col-8">
                                    <span>@{{detailsMeal}}</span>
                                </div>
                                <div class="col-2">
                                    <span>$@{{detailsPrice}}</span>
                                </div>
                            </div>
                        </h3>
                        <hr class="my-4">
                        <h3>
                            <div class="row" id="detailsTotal">
                                <div class="col-7"></div>
                                <div class="col-3">Total</div>
                                <div class="col-2">$@{{totalPrice}}</div>
                            </div>
                        </h3>
                        <hr class="my-4">
                        <div class="row" id="detailsButton">
                            <div class="col-2"></div>
                            <div class="col-4">
                                <button type="button" class="btn btn-dark detailsBtn">拒絕訂單</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-dark detailsBtn">接受訂單</button>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
            var buttomDiv = new Vue({
                el:"#buttomDiv",
                data:{
                    detailsTitle:"CY201909240001—Jennifer",
                    detailsCount:"9",
                    detailsMeal:"CY超值豪華牛排套餐",
                    detailsPrice:"1099",
                    totalPrice:"9891"
                },
                methods:{
                    orderClick:function(){
                        $(".jumbotron").css("display","block");
                    }
                }
            })
        </script>
    
</body>

</html>