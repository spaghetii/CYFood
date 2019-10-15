@extends('layouts.layout')

@section('content')
    <div class="container-fluid" id="userOrderDetailDiv">
        {{-- 目前訂單 --}}
        <div class="mt-5 mb-5" id="currentOrder">
           <h3>目前訂單</h3><br>
            <div class="row mb-5" v-for="item,index in list"  v-if="item.OrdersStatus == 1 || item.OrdersStatus == 2">
                <div class="col-sm-3 col-12 mb-4">
                    <img :src="item.OrdersDetails.ShopImage" class="userOrderDetailrestaurantImg" alt="">
                </div>
                <div class="col-sm-5 col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <div v-cloak>
                            <h4>@{{item.OrdersDetails.restaurant}}</h4>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span v-cloak>
                            @{{item.OrdersDetails.shoppingBagTotalQuantity}}&nbsp;份餐點，$@{{item.OrdersDetails.orderTotalAmount}}&nbsp;•&nbsp;9月20日&nbsp;的&nbsp;下午12:27
                        </span>
                    </div>
                    <div>
                        <ul class="noPad noMarg" style="list-style:none;">
                            <li v-for="odDetail in item.OrdersDetails.meal">
                                <div class="d-flex flex-row mb-3">
                                    <div class="mr-3" id="foodItemQuantity" v-cloak>
                                        @{{odDetail.mealQuantity}}
                                    </div>
                                    <div>
                                        <div v-cloak>
                                            @{{odDetail.mealName}}
                                        </div>
                                        <div v-cloak>
                                            <small>@{{odDetail.mealDetail.detail}}</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            {{-- 隱藏Div --}}
                            {{-- <div id="displayDivApp" v-on:click="clickDispayDiv">
                                顯示更多內容&nbsp;<img src="img/arrowDown.png" alt="">
                            </div> --}}
                            
                        </ul>
                    </div>
                </div>
                <div class="col-sm-1 col-12"></div>
                <div class="col-sm-3 col-12">
                    <button type="button" class="btn btn-warning" id="reorderBtn" v-if="item.OrdersStatus == 1">取消訂單</button>
                </div>
            </div> <!-- row -->
        </div> <!-- 目前訂單 -->

        <hr>

        {{-- 歷史訂單 --}}
        <div class="mt-5 mb-5">
           <h3>歷史訂單</h3><br>
            <div class="row mb-5" v-for="item,index in list"  v-if="item.OrdersStatus == 3 || item.OrdersStatus == 4">
                <div class="col-sm-3 col-12 mb-4">
                    <img :src="item.OrdersDetails.ShopImage" class="userOrderDetailrestaurantImg" alt="">
                </div>
                <div class="col-sm-5 col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <div v-cloak>
                            <h4>@{{item.OrdersDetails.restaurant}}</h4>
                        </div>
                        <div>
                            <img src="img/star1.png" alt="">4.7/5
                        </div>
                    </div>
                    <div class="mb-2" v-cloak>
                        <span>
                            @{{item.OrdersDetails.shoppingBagTotalQuantity}}&nbsp;份餐點，$@{{item.OrdersDetails.orderTotalAmount}}&nbsp;•&nbsp;9月20日&nbsp;的&nbsp;下午12:27
                        </span>
                    </div>
                    <div>
                        <ul class="noPad noMarg" style="list-style:none;">
                            <li v-for="odDetail in item.OrdersDetails.meal">
                                <div class="d-flex flex-row mb-3">
                                    <div class="mr-3" id="foodItemQuantity" v-cloak>
                                        @{{odDetail.mealQuantity}}
                                    </div>
                                    <div>
                                        <div v-cloak>
                                            @{{odDetail.mealName}}
                                        </div>
                                        <div v-cloak>
                                            <small>@{{odDetail.mealDetail.detail}}</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-1 col-12"></div>
                <div class="col-sm-3 col-12">
                    {{-- <button type="button" class="btn btn-warning" id="reorderBtn">重新訂購</button> --}}
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
                list:[],
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
                            _this.list = response.data;
                            _this.list.forEach((element,index) => {
                                // console.log(element);
                                _this.list[index].OrdersDetails = JSON.parse(_this.list[index].OrdersDetails);
                                
                            });
                            
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