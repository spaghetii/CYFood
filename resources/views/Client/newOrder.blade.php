@extends('layouts.clientLayout')

@section('content')
<!-- buttom -->
<link rel="stylesheet" href="/css/clientNewOrder.css">
<div class="row no-gutters" id="buttomDiv">
    <div class="col-4">
        <div id="leftButtom">
            <button type="button" class="btn btn-light btn-block" id="orderBtn" v-for="item,index in detailsTitle" v-on:click="orderClick(index)">
                @{{item.ordersNum}}⎯ @{{item.memberName}}
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
                <h3 id="detailsItem">
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
                </h3>
                <hr class="my-4">
                <h3>
                    <div class="row" id="detailsTotal">
                        <div class="col-9 text-right">Total</div>
                        <div class="col-3 text-right">$@{{totalPrice}}</div>
                    </div>
                </h3>
                <hr class="my-4">
                <div class="row" id="detailsButton">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <button type="button" class="btn btn-dark detailsBtn">✘拒絕訂單</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-dark detailsBtn">✔接受訂單</button>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

    var buttomDiv = new Vue({
        el:"#buttomDiv",
        data:{
            detailsTitle:[
                {ordersNum:"CY20191004001",memberName:"Jennifer"},
                {ordersNum:"CY20191004002",memberName:"Leonard"},
            ],
            detailsCount:"10",
            detailsMeal:"CY超值豪華A9和牛套餐",
            detailsPrice:"399",
            totalPrice:"3990"
        },
        methods:{
            orderClick:function(index){
                $(".jumbotron").css("display","block");
            }
        }
    })
</script>
@endsection