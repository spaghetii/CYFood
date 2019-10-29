@extends('layouts.layout')

@section('content')
    <div class="container-fluid" id="userOrderDetailDiv">
        {{-- 目前訂單 --}}
        <div class="mt-5 mb-5" id="currentOrder">
           <h3>目前訂單</h3><br>
            <div class="row mb-5" v-for="item,index in list"  v-if="item.OrdersStatus == 1 || item.OrdersStatus == 2 || item.OrdersStatus == 3">
                <div class="col-sm-3 col-12 mb-4">
                    <img :src="item.OrdersDetails.ShopImage" class="userOrderDetailrestaurantImg" alt="">
                </div>
                <div class="col-sm-5 col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <div v-cloak>
                            <h4>@{{item.OrdersDetails.restaurant}}</h4>
                        </div>
                    </div>
                    <div class="mb-2" v-cloak>
                        <span>
                        @{{totalCount[index]}}&nbsp;份餐點，$@{{item.OrdersDetails.orderTotalAmount}}&nbsp;•
                        &nbsp;@{{createMonth[index]}}月@{{createDay[index]}}日&nbsp;的&nbsp;@{{createTime[index]}}
                        </span>
                    </div>
                    <div>
                        <ul class="noPad noMarg" style="list-style:none;">
                            <li v-for="odDetail,odIndex in item.OrdersDetails.meal">
                                <div class="d-flex flex-row mb-3">
                                    <div class="mr-3" id="foodItemQuantity" v-cloak>
                                        @{{odDetail.mealQuantity}}
                                    </div>
                                    <div>
                                        <div v-cloak>
                                            @{{odDetail.mealName}}
                                        </div>
                                        <div v-cloak>
                                            <b v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 2">份量</b>
                                            <div style="margin:8px 0px 4px;font-size: 14px;line-height: 16px;"
                                                    v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 2">
                                                <div>@{{dItem.detail}}</div>
                                            </div> 
                                            <b v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 1 && dIndex == 0">加點</b>                                    
                                            <div style="margin:8px 0px 4px;font-size: 14px;line-height: 16px;"
                                                    v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 1">
                                                
                                                <div>@{{dItem.detail}}</div>
                                            </div>
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
                    <button type="button" class="btn btn-warning" id="reorderBtn" v-on:click="cancelOrder(index)" v-if="item.OrdersStatus == 1">取消訂單</button>
                </div>
            </div> <!-- row -->
        </div> <!-- 目前訂單 -->

        <hr>

        {{-- 歷史訂單 --}}
        <div class="mt-5 mb-5">
           <h3>歷史訂單</h3><br>
            <div class="row mb-5" v-for="item,index in list"  v-if="item.OrdersStatus == 4 || item.OrdersStatus == 5">
                <div class="col-sm-3 col-12 mb-4">
                    <img :src="item.OrdersDetails.ShopImage" class="userOrderDetailrestaurantImg" alt="">
                </div>
                <div class="col-sm-5 col-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <div v-cloak>
                            <h4>@{{item.OrdersDetails.restaurant}}</h4>
                        </div>
                        <div>
                            <img src="/img/star1.png" alt="">4.7/5
                        </div>
                    </div>
                    <div class="mb-2" v-cloak>
                        <span>
                            @{{item.OrdersDetails.shoppingBagTotalQuantity}}&nbsp;份餐點，$@{{item.OrdersDetails.orderTotalAmount}}&nbsp;•
                            &nbsp;@{{updateMonth[index]}}月@{{updateDay[index]}}日&nbsp;的&nbsp;@{{updateTime[index]}}
                        </span>
                    </div>
                    <div>
                        <ul class="noPad noMarg" style="list-style:none;">
                            <li v-for="odDetail,odIndex in item.OrdersDetails.meal">
                                <div class="d-flex flex-row mb-3">
                                    <div class="mr-3" id="foodItemQuantity" v-cloak>
                                        @{{odDetail.mealQuantity}}
                                    </div>
                                    <div>
                                        <div v-cloak>
                                            @{{odDetail.mealName}}
                                        </div>
                                        <div v-cloak>
                                            <b v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 2">份量</b>
                                            <div style="margin:8px 0px 4px;font-size: 14px;line-height: 16px;"
                                                    v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 2">
                                                <div>@{{dItem.detail}}</div>
                                            </div> 
                                            <b v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 1 && dIndex == 0">加點</b>                                    
                                            <div style="margin:8px 0px 4px;font-size: 14px;line-height: 16px;"
                                                    v-for="dItem,dIndex in odDetail.mealDetail" v-if="dItem.type == 1">
                                                
                                                <div>@{{dItem.detail}}</div>
                                            </div>
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

        var userOrder = new Vue({
            el: '#userOrderDetailDiv',
            data:{
                list:[],
                memberID:0,
                createMonth:[],
                createDay:[],
                createTime:[],
                updateMonth:[],
                updateDay:[],
                updateTime:[],
                totalCount:[],
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
                            
                            _this.list = response.data;
                            console.log(_this.list);
                            _this.list.forEach((element,index) => {
                                
                                _this.list[index].OrdersDetails = JSON.parse(_this.list[index].OrdersDetails);
                                //訂單建立時機
                                let createTime = element.OrdersCreate.split(" ");
                                _this.createMonth[index] = createTime[0].substr(5,2);
                                _this.createDay[index] = createTime[0].substr(8,2);
                                _this.createTime[index] = createTime[1].substr(0,5);
                                //訂單修改時機
                                let updateTime = element.OrdersUpdate.split(" ");
                                _this.updateMonth[index] = updateTime[0].substr(5,2);
                                _this.updateDay[index] = updateTime[0].substr(8,2);
                                _this.updateTime[index] = updateTime[1].substr(0,5);
                                //每個訂單餐點總數量
                                _this.totalCount[index] = 0;
                                _this.list[index].OrdersDetails.meal.forEach(ele => {

                                    _this.totalCount[index] += parseInt(ele.mealQuantity);
                                    // _this.mealDetail[index] = ele.mealDetail;
                                    // console.log(ele);
                                })
                                
                            });
                            // console.log(_this.mealDetail);
                        })
                        .catch(function (response) {
                            console.log(response);
                        });
                },
                cancelOrder:function(e){
                    console.log(this.list[e].OrdersID);
                    let _this = this;
                    Swal.fire({                 // delete form
                        title: '確定要取消這筆訂單?',
                        text: "刪除之後就無法復原!!!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '確定',
                        cancelButtonText: '取消'
                        }).then((result) => {
                            if (result.value)
                            this.list[e].OrdersStatus = 0;
                            let _this = this;
                            axios.put('/api/order/'+this.list[e].OrdersID,this.list[e])
                            .then(function(response){
                                if(response.data['ok']){
                                    _this.init();
                                    console.log(_this.list[e].ShopID);
                                    axios.post('/socket/clientsend', {
                                        header: "shopID",
                                        id:_this.list[e].ShopID,
                                        type:"cancelOrders"
                                    })
                                    .then(function (response) {
                                        console.log(response.data);
                                    })
                                    .catch(function (response) {
                                        console.log(response)
                                    });
                                }
                                
                            })
                    });
                }
            },
            mounted:function(){
                let test = (location.href).split("/");
                this.memberID = test[test.length-1];
                this.init();
                console.log(this.memberID);
            }
        })
    </script>
@endsection