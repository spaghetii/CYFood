@extends('layouts.layout')

@section('content')
    <div class="container-fluid alignCenter" id="trackingOrderBgDiv">
        <div class="col-sm-6" id="blankDiv">
        </div>
        <div class="col-sm-4" id="trackingOrderDiv">
            <div class="d-flex flex-column trackingOrderDivStyle mb-3" id="timerApp">
                {{-- 抵達時間 --}}
                <div class="d-flex flex-row mb-2">
                    <div>
                       <h1 class="noMarg">12:15</h1>
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
                <div>
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
            <div class="d-flex flex-column trackingOrderDivStyle">
                <div>
                   <h4 class="fontBold noMarg">訂單摘要</h4>
                </div>
                <div class="mb-2">
                    <h6>茶湯會 中佑店</h6>    
                </div>
                <div id="trackingOrderSummary">
                    <ul class="noPad noMarg ml-2 mr-2" style="list-style:none;">
                        <li>
                            <div class="d-flex flex-row mb-3">
                                <div class="mr-3" id="foodItemQuantity">
                                    1
                                </div>
                                <div>
                                    <div>
                                        觀音拿鐵 Guanyin Latte
                                    </div>
                                    <div>
                                        <small>熱 Hot • 微糖 Less Sugar • 寒天晶球 Agar</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="d-flex flex-row mb-3">
                                <div class="mr-3" id="foodItemQuantity">
                                    2
                                </div>
                                <div>
                                    <div>
                                        翡翠檸檬 Jade Lemon
                                    </div>
                                    <div>
                                        <small>微糖 Less Sugar • 去冰 Ice-Free • 寒天晶球 Agar</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="d-flex flex-row mb-3">
                                <div class="mr-3" id="foodItemQuantity">
                                    3
                                </div>
                                <div>
                                    <div>
                                        紅茶珍珠拿鐵 Black Tea Latte with Tapioca
                                    </div>
                                    <div>
                                        <small>無糖 Sugar-Free • 珍珠換波霸 Changed Tapioca to Pearl • 熱 Hot</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="d-flex flex-row mb-3">
                                <div class="mr-3" id="foodItemQuantity">
                                    99
                                </div>
                                <div>
                                    <div>
                                        塑膠袋 Plastic Bag
                                    </div>
                                    <div>
                                        <small>1杯袋 One Cup</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div>
                    <div class="d-flex flex-row mb-2">
                        <div>
                            <h5 class="noMarg">總計</h5>
                        </div>
                        <div class="ml-auto">
                            <h5 class="noMarg">$999TWD</h5>
                        </div>
                    </div>
                </div>
            </div>
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
                orderStatus: '餐廳正在確定訂單 ...'
            },
            mounted:function(){
                var flag = setInterval(() => {
                    temp += 20;
                    this.barValue = temp + "%";
                    console.log(this.barValue);
                    if  (temp == 20 )   { this.orderStatus = '餐點正在準備中 ...' } else if
                        (temp == 40 )   { this.orderStatus = '外送員正在領取您的餐點' } else if
                        (temp == 60 )   { this.orderStatus = '外送員正在前往您所在位置' } else if
                        (temp == 80 )   { this.orderStatus = '請前往門口與外送員碰面' } else if
                        (temp == 100)   { this.orderStatus = '已完成訂單'; clearInterval(flag);};      
                }, 2000);
            },
        })
    </script>
@endsection