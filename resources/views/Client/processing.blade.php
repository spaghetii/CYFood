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
            color:#3c3c3c;
        }
        #rightButtom {
            width: 840px;
            height: 500px;
            margin: 25px auto;
            position: fixed;
            overflow: auto;
        }
        .jumbotron {
            width: 800px;
            min-height: 480px;
            margin: 10px 20px; 
            font-family: Microsoft JhengHei;
            display: none;
            background-color: whitesmoke;
        }
        #detailsTitle {
            text-align: right;
            font-size: 36px;
            font-weight: bold;
            display: inline-block;
            color:#5b5b5b;
        }
        #detailsItem {
            width: 550px;
            margin: auto;
            color:#5b5b5b;
        }
        #detailsTotal {
            width: 550px;
            margin: auto;
            color:#5b5b5b;
        }
        .detailsBtn{
            font-size: 28px;
            margin: auto;
            display: block;
            font-weight: bold;
        }
        @media (min-width: 1300px) and (max-width: 1600px){
            #buttomDiv {
                height: 614px;
            }
            #rightButtom{
                width: 966px;
                height: 564px;
            }
            .jumbotron {
                width: 926px;
                min-height: 544px;
            }
        }
        #detailsGroup{
            display: inline-block;
            margin: auto;
        }
        .dropdown-toggle{
            font-size: 20px;
            font-weight: bold;
        }
        .dropdown-item{
            text-align: center;
            font-size: 20px;
            color: #212529;
            font-weight: bold;
        }
        .dropdown-item:hover, .dropdown-item:focus {
            color:#dcdcdc;
            background-color: white;
        }
        .dropdown-item.active, .dropdown-item:active {
            color:#dcdcdc;
            background-color: white;
        }
        .modal{
            font-family: Microsoft JhengHei;
        }
    </style>
</head>

<body>
    <div class="container-fuild h-100">
        <!-- top -->
        <div class="row no-gutters sticky-top" id="fixedDiv">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/newOrder">
                    <div class="fixedItem rounded">
                        <img src="/img/client/neworder.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/processing">
                    <div class="fixedItem rounded">
                        <img src="/img/client/processing.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/takeout">
                    <div class="fixedItem rounded">
                        <img src="/img/client/takeout.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/user">
                    <div class="fixedItem rounded">
                        <img src="/img/client/user.png" alt="">
                    </div>
                </a>
            </div>
        </div>
        <!-- buttom -->
        <div class="row no-gutters" id="buttomDiv">
            <div class="col-4">
                <div id="leftButtom">
                    <button type="button" class="btn btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                        @{{detailsTitle}}
                    </button>
                </div>
            </div>
            <div class="col-8">
                <div id="rightButtom">
                    <div class="jumbotron">
                        <!-- 訂單標題 -->
                        <div class="row" id="rowTop">
                            <div class="col-10" id="detailsTitle">
                                @{{detailsTitle}}
                            </div>
                            <div class="col-2 btn-group" id="detailsGroup">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    幫助
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#contactModal" href="#">✉ 聯絡顧客</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#delayModal" href="#">☹ 延遲訂單</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#cancelModal" href="#">✘ 取消訂單</a>
                                </div>
                            </div>
                            
                        </div>
                        <hr class="my-4">
                        <!-- 訂單內容 -->
                        <h3  id="detailsItem">
                            <div class="row">
                                <div class="col-1 text-center"><span class="badge badge-light">1</span></div>
                                <div class="col-2 text-left">
                                    <span>@{{detailsCount}}x</span>
                                </div>
                                <div class="col-7 text-left">
                                    <span>@{{detailsMeal}}</span>
                                </div>
                                <div class="col-2 text-right">
                                    <span>$@{{detailsPrice}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 text-center"><span class="badge badge-light">2</span></div>
                                <div class="col-2 text-left">
                                    <span>@{{detailsCount}}x</span>
                                </div>
                                <div class="col-7 text-left">
                                    <span>@{{detailsMeal}}</span>
                                </div>
                                <div class="col-2 text-right">
                                    <span>$@{{detailsPrice}}</span>
                                </div>
                            </div>
                        </h3>
                        <hr class="my-4">
                        <h3>
                            <div class="row" id="detailsTotal">
                                <div class="col-9 text-right">Total</div>
                                <div class="col-3 text-right">$@{{totalPrice}}</div>
                            </div>
                        </h3>
                        <hr class="my-4">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-dark detailsBtn">☎ 呼叫外送員</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    {{-- 聯絡顧客MODAL --}}
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Jennifer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">輸入訊息:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark">送出</button>
                </div>
            </div>
        </div>
    </div>
    {{-- 延遲訂單MODAL --}}
    <div class="modal fade" id="delayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        請問您需要額外準備幾分鐘？<br>
                        我們會通知客戶訂單有所延遲。
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">5分鐘</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">10分鐘</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                            <label class="form-check-label" for="inlineRadio3">15分鐘</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option2">
                            <label class="form-check-label" for="inlineRadio4">20分鐘</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark">送出</button>
                </div>
            </div>
        </div>
    </div>
    {{-- 取消訂單MODAL --}}
    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        請問您為什麼要取消訂單？
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option1">
                            <label class="form-check-label" for="inlineRadio5">提早打烊</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option2">
                            <label class="form-check-label" for="inlineRadio6">存貨不足</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option2">
                            <label class="form-check-label" for="inlineRadio7">餐廳問題</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark">送出</button>
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
                    detailsMeal:"CY超值豪華A9和牛套餐",
                    detailsPrice:"1000",
                    totalPrice:"9000"
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
