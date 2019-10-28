@extends('layouts.layout')
    <script> 
        if (!localStorage.getItem("OrdersNum")) {
            window.location.href="/loginHomepage";
        } 
    </script>

@section('content')
    <div class="container-fluid alignCenter" id="trackingOrderBgDiv">
        <div class="col-sm-6" id="blankDiv">
        </div>
        <div class="col-sm-4" id="trackingOrderDiv">
            <div class="d-flex flex-column trackingOrderDivStyle mb-3" id="timerApp">
                {{-- 抵達時間 --}}
                <div class="d-flex flex-row mb-2">
                    <div>
                    <h1 v-cloak class="noMarg">@{{arrivalTime}}</h1>
                    </div>
                    <div class="ml-auto mt-auto">
                        <small>預計抵達時間</small>
                    </div>
                </div>
                {{-- progress bar --}}
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" v-bind:style="{width: barValue}" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- 狀態顯示 --}}
                <div v-cloak>
                    <small>@{{orderStatus}}</small>
                </div>
            </div>
            {{-- 外送資訊 --}}
            <div class="d-flex flex-column trackingOrderDivStyle mb-3">
                <div class="mb-3">
                   <h4 class="fontBold noMarg">外送詳細資訊</h4>
                </div>
                <div>
                    <h6>地址</h6>    
                </div>
                <div>
                    <h6>台中市南屯區公益路二段51號</h6>
                </div>
            </div>
            {{-- 訂單摘要 --}}
            <div id="orderDetail"  class="d-flex flex-column trackingOrderDivStyle">
                <div>
                   <h4 class="fontBold noMarg">訂單摘要</h4>
                </div>
                <div class="mb-2">
                    <h6>@{{details.restaurant}}</h6>    
                </div>
                <div id="trackingOrderSummary">
                    <ul class="noPad noMarg ml-2 mr-2" style="list-style:none;" v-for="item,index in details.meal">
                        <li >
                            <div class="d-flex flex-row mb-3">
                                <div v-cloak class="mr-3" id="foodItemQuantity" v-cloak>
                                    @{{item.mealQuantity}}
                                </div>
                                <div>
                                    <div v-cloak>
                                        @{{item.mealName}}
                                    </div>
                                    <div style="margin:8px 0px 4px;font-size: 14px;line-height: 16px;"
                                            v-for="in1,dindex in mealDetail[0]" >
                                        <div v-for="in2,key,i in in1" v-if="dindex == index">  
                                            <div v-if="in2[i] != null">                   
                                                <div v-if="in2[i].type == 1" style="font-weight:bold">加點 Add-ons</div>
                                                <div v-for="item in in2" v-if="item.type == 1">@{{item.detail}}</div>
                                                <div v-if="in2[i].type == 2" style="font-weight:bold">份量 Size</div>
                                                <div v-for="item in in2" v-if="item.type == 2">@{{item.detail}}</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </li>
                        <hr >
                    </ul>
                </div>
                <div>
                    <div class="d-flex flex-row mb-2">
                        <div>
                            <h5 class="noMarg">總計</h5>
                        </div>
                        <div class="ml-auto">
                        <h5 v-cloak class="noMarg">$@{{details.orderTotalAmount}}TWD</h5>
                        </div>
                    </div>
                </div>
            </div> {{-- orderDetail --}}
        </div>
    </div>
@endsection

@section('script')
    
    <script>
        
        
        var temp = 0;
        var timerApp =  new Vue({
            el: '#timerApp',
            data: {
                barValue: '0%',
                orderStatus: '餐廳正在準備餐點 ...',
                arrivalTime:"--:--",

            },
            methods:{
            progressbar : function(){
                    var flag = setInterval(() => {
                        console.log(new Date().getTime()-new Date(orderDeatil.list.OrdersUpdate).getTime());
                        temp = (new Date().getTime()-new Date(orderDeatil.list.OrdersUpdate).getTime())/(parseInt(localStorage.getItem('shipTime'))*600);
                        this.barValue = temp + "%";
                        console.log(this.barValue);
                        if  (temp <= 33 && temp != 0)   { this.orderStatus = '外送員正在領取您的餐點' } else if
                            (temp <= 66 )   { this.orderStatus = '外送員正在前往您所在位置' } else if
                            (temp <= 99 )   { this.orderStatus = '請前往門口與外送員碰面' } else if
                            (temp >= 100)   { 
                                this.orderStatus = '已完成訂單'; 
                                clearInterval(flag);
                                localStorage.removeItem('OrdersNum');
                                localStorage.removeItem('shipTime');
                            };      
                    }, 1000);
                },
            }
        })


        var orderDeatil = new Vue({
            el:"#orderDetail",
            data:{
                list:[],
                details:[],
                // 會員
                memberID:0,
                mealDetail:[]
            },
            methods:{
                init:function(){
                    let OrdersNum = localStorage.getItem('OrdersNum');
                    let _this = this;
                    axios.get("/api/order/"+OrdersNum)
                        .then(function (response){
                            _this.list = response.data;
                            _this.details = JSON.parse(_this.list.OrdersDetails);
                            _this.memberID = _this.list.MemberID;
                            _this.mealDetail = {0:_this.details.meal[0].mealDetail};
                            console.log(_this.details);
                            console.log(_this.mealDetail);
                        })
                        .catch(function (response) {
                        console.log(response);
                        });
                    
                }
            },
            mounted:function(){
                
                // 隱藏遊覽列購物袋圖示
                $("#shoppingBag").css("display","none");
                this.init();
                
            },
            beforeCreate:function(){
                
            }
        })

    
        //清空localStorage
        function clearStorage(){
            localStorage.removeItem('OrdersNum');
            localStorage.removeItem('shipTime');
        }

        
    </script>
@endsection