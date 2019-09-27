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
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/27e7caddfb.js"></script>
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
        }

        .container-fuild {
            width: 100%;
            
        }

        #fixedDiv {
            height: 15%;
            background-color: white;
        }

        #fixedItem {
            width: 95%;
            height: 90%;
            margin: 1% auto;
            font-size: 70px;
            background-color: orange;
            color: white;
        }

        #fixedImg {
            margin: 0px 115px;
            width: 70px;
        }

        #leftButtom {
            margin: 10% auto;
        }

        #rightButtom {
            margin: 4% auto;
            position: fixed;
            
        }

        .btn {
            font-size: 30px;
            margin: 0px auto 25px auto;
        }


        .jumbotron {
            width: 800px;
            height: 500px;
            margin: auto auto auto 2%;
            font-family: Microsoft JhengHei;
            display: none;
        }

        #detailsTitle {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
        }

        #detailsItem {
            width: 60%;
            margin: auto;
            max-height: 150px;
            /* overflow: auto; */
        }
        #detailsTotal{
            width: 60%;
            margin: auto;
        }
        #detailsButton{
            width: 80%;
            margin: auto;
        }
        #detailsButton1{
            width: 90%;
            margin: 0 5%;
        }
        
       
    </style>
</head>

<body>
    <div class="container-fuild h-100">
        <!-- fixed -->
        <div class="row no-gutters sticky-top" id="fixedDiv">
            <div class="col">
                <a href="/newOrder">
                    <div id="fixedItem">
                        <i class="far fa-sticky-note" id="fixedImg"></i>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/processing">
                    <div id="fixedItem">
                        <i class="fas fa-utensils" id="fixedImg"></i>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="">
                    <div id="fixedItem">
                        <i class="fas fa-shopping-bag" id="fixedImg"></i>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="">
                    <div id="fixedItem">
                        <i class="far fa-clock" id="fixedImg"></i>
                    </div>
                </a>
            </div>
        </div>

        <!-- buttom -->
        <div class="row no-gutters" id="buttomDiv">
            <div class="col-4">
                <div id="leftButtom">
                    <button type="button" class="btn btn-light btn-block" v-on:click="orderClick">
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
                                <div class="col-3">Total:</div>
                                <div class="col-2">$@{{totalPrice}}</div>
                            </div>
                        </h3>
                        <hr class="my-4">
                        <div class="row" id="detailsButton">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <button type="button" class="btn btn-dark" id="detailsButton1">完成訂單 呼叫外送員</button>
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