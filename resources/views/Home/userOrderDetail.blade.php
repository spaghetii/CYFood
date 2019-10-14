@extends('layouts.layout')

@section('content')
    <div class="container-fluid" id="userOrderDetailDiv">
        {{-- 目前訂單 --}}
        <div class="mt-5 mb-5" id="currentOrder">
           <h3>目前訂單</h3><br>
            <div class="row mb-5" v-for="item,index in orders"  v-if="item.OrdersStatus == 1 || item.OrdersStatus == 2">
                <div class="col-sm-3 col-12 mb-4">
                    <img src="img/drink1.jpg" class="userOrderDetailrestaurantImg" alt="">
                </div>
                <div class="col-sm-5 col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>@{{item.OrdersDetails.restaurant}}</h4>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span>
                            105&nbsp;份餐點，$999&nbsp;•&nbsp;9月20日&nbsp;的&nbsp;下午12:27
                        </span>
                    </div>
                    <div>
                        <ul class="noPad noMarg" style="list-style:none;">
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
                            {{-- 隱藏Div --}}
                            <div id="displayDivApp" v-on:click="clickDispayDiv">
                                顯示更多內容&nbsp;<img src="img/arrowDown.png" alt="">
                            </div>
                            <li id="displayItem">
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
                        </ul>
                    </div>
                </div>
                <div class="col-sm-1 col-12"></div>
                <div class="col-sm-3 col-12">
                    <button type="button" class="btn btn-warning" id="reorderBtn">取消訂單</button>
                </div>
            </div> <!-- row -->
        </div> <!-- 目前訂單 -->

        <hr>

        {{-- 歷史訂單 --}}
        <div class="mt-5 mb-5">
           <h3>歷史訂單</h3><br>
            <div class="row mb-5">
                <div class="col-sm-3 col-12 mb-4">
                    <img src="img/drink1.jpg" class="userOrderDetailrestaurantImg" alt="">
                </div>
                <div class="col-sm-5 col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>茶湯會 中佑店</h4>
                        </div>
                        <div>
                            <img src="img/star1.png" alt="">4.7/5
                        </div>
                    </div>
                    <div class="mb-2">
                        <span>
                            6&nbsp;份餐點，$999&nbsp;•&nbsp;9月20日&nbsp;的&nbsp;下午12:27
                        </span>
                    </div>
                    <div>
                        <ul class="noPad noMarg" style="list-style:none;">
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
                        </ul>
                    </div>
                </div>
                <div class="col-sm-1 col-12"></div>
                <div class="col-sm-3 col-12">
                    <button type="button" class="btn btn-warning" id="reorderBtn">重新訂購</button>
                </div>
            </div> <!-- row -->
        </div>    <!-- 歷史訂單 -->
    </div> <!-- userOrderDetailDiv -->
@endsection

@section('script')
    <script>
        // var displayApp = new Vue ({
        //         el: '#displayDivApp',
                
        //     })

        var userOrder = new Vue({
            el: '#userOrderDetailDiv',
            data:{
                orders:{},
                memberID:0
            },
            methods:{
                clickDispayDiv: function(){
                    $("#displayItem").css("display", 'block');
                    $("#displayDivApp").css("display", "none");
                },
                init:function(){
                    let _this = this;
                    axios.get('/api/order/member/'+this.memberID)   
                        .then(function (response) {
                            console.log(response.data)
                            _this.orders = response.data;
                            
                        })
                        .catch(function (response) {
                            console.log(response);
                        });
                }
            },
            mounted:function(){
                let memberID = localStorage.getItem('memberID');
                this.memberID = memberID;
                this.init();
                console.log(this.memberID);
            }
        })
    </script>
@endsection