@extends('layouts.clientLayout')

@section('content')
<link rel="stylesheet" href="/css/clientTakeout.css">
<!-- buttom -->
<div class="row no-gutters" id="buttomDiv" v-cloak>
    <div class="col-4">
        <div id="leftButtom">
            <button type="button" class="btn btn-light btn-block" id="orderBtn" v-on:click="orderClick(index)" v-for="item,index in list" v-if="item.OrdersStatus==3">
                @{{item.OrdersNum}}<br>@{{item.OrdersDetails.memberName}}
            </button>
        </div>
    </div>
    <div class="col-8">
        <div id="rightButtom">
            <div class="jumbotron" v-for="item,index in list" v-if="index == currentIndex">
                <!-- 訂單標題 -->
                <h1 class="display-4" id="detailsTitle">@{{item.OrdersNum}}⎯ @{{item.OrdersDetails.memberName}}</h1>
                <hr class="my-4">
                <!-- 訂單內容 -->
                <h3 id="detailsItem">
                    <div class="row" v-for="i,index in item.OrdersDetails.meal">
                        <div class="col-1 text-center"><span class="badge badge-light">1</span></div>
                        <div class="col-2 text-left">
                            <span>@{{i.mealQuantity}}x</span>
                        </div>
                        <div class="col-7 text-left">
                            <span>@{{i.mealName}}</span>
                        </div>
                        <div class="col-2 text-right">
                            <span>$@{{i.mealUnitPrice}}</span>
                        </div>
                    </div>
                </h3>
                <hr class="my-4">
                <h3>
                    <div class="row" id="detailsTotal">
                        <div class="col-9 text-right">Total</div>
                        <div class="col-3 text-right">$@{{total[index]}}</div>
                    </div>
                </h3>
                <hr class="my-4">
                <div class="row" id="detailsButton">
                    <div class="col-12">
                        <div class="alert alert-dark" role="alert" id="takeoutTime">
                            外送員將於<span id="timeInterval"> 5:00 </span>後抵達
                        </div>
                    </div>
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
            list:[],
            total:[],
            currentIndex:0,
            shopID:-1
        },
        mounted:function(){
            let test = (location.href).split("/");
            this.shopID = test[test.length-1];
            this.init();
        },
        methods:{
            init:function(){
                let _this = this;
                axios.get('/api/order/shop/'+this.shopID)   //改為依shopID抓order資料 by林培誠
                    .then(function(response){
                        _this.list = response.data;
                        _this.list.forEach((element,index)=>{
                            _this.list[index].OrdersDetails = JSON.parse(_this.list[index].OrdersDetails);
                            _this.total[index] = 0;
                            _this.list[index].OrdersDetails.meal.forEach(ele => {
                                _this.total[index] += ele.mealQuantity * ele.mealUnitPrice;
                            })
                        })
                        // console.log(_this.list);
                    })
                    .catch(function(response){
                        console.log(response);
                    })
            },
            orderClick:function(index){
                this.currentIndex = index;
                $(".jumbotron").css("display","block");
            }
        }
    })
</script>
@endsection