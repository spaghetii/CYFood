@extends('layouts.layout')

@section('headerSearchLarge')
<h3>結帳</h3>
@endsection

@section('content')
    <div class="container-fluid" id="orderDetailDiv">
        <div class="row d-flex">
            {{-- leftdiv --}}
            <div class="orderDetailLeftDiv col-sm-6 col-12">
                {{-- 外送詳情 --}}
                <div class="orderDetailItemDiv">
                    <div class="d-flex justify-content-between">
                        <h5>外送詳情</h5>
                        <a href="" class="colorOrange aHoverColor">編輯</a>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="row mb-3">
                            <div class="col-3">送達地址</div>
                            <div class="col-9">台中市南屯區公益路二段51號18樓</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">預計時間</div>
                            <div class="col-9">@{{shiptime-5}} – @{{shiptime+5}} 分鐘</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">優惠卷</div>
                            <div class="col-9"><input type="text" class="form-control form-control-sm"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 alignCenter">付款方式</div>
                            <div class="col-9">
                                <div class="form-check mb-1">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">現金
                                    </label>
                                </div>
                                <div class="form-check d-flex justify-content-between">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">信用卡
                                    </label>
                                    <select class="form-control form-control-sm" style="width:83%">
                                        <option>選擇信用卡</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 餐點詳情 --}}
                <div class="orderDetailItemDiv" id="orderDetailItemDivApp">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>餐點份數&nbsp;(@{{shoppingBagTotalQuantity}})</h5>
                            <small>訂餐餐廳：@{{restaurantName}}</small>
                        </div>
                        <a href="" class="colorOrange aHoverColor">新增餐點</a>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div>
                        <ul class="noPad">
                            <li style="list-style-type:none" v-for="MealItem,index in shoppingBagMealName">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control" v-model="shoppingBagMealQuantity[index]">
                                                <option value="0">移除</option>
                                                <option v-for="item in quantitySelectLists">@{{item}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    @{{shoppingBagMealName[index]}}
                                                </div>
                                                <div class="float-right" v-for="item,sindex in shoppingBagMealTotalPrice" v-if="index == sindex">
                                                    $@{{item}}
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <hr>
                            </li> 
                        </ul>
                    </div>
                    <div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="留下備註給餐廳"></textarea>
                    </div>
                </div>
            </div> {{-- leftdiv --}}

            {{-- rightdiv --}}
            <div class="orderDetailRightDiv col-sm-6 col-12" id="orderDetailRightDiv">
                <div class="orderSummaryDiv divCenter">
                    <div class="mb-4">
                        <h5>訂單摘要</h5>
                    </div>
                    <div class="mb-3">
                        <img src="img/shopping-bag1.png" alt="">&ensp;透過&nbsp;@{{restaurantName}}&nbsp;訂購的&nbsp;@{{shoppingBagTotalQuantity}}&nbsp;份餐點
                    </div>
                    <div class="mb-3">
                        <img src="img/clock.png" alt="">&ensp;預計在&nbsp;@{{shiptime-5}}&nbsp;到&nbsp;@{{shiptime+5}}&nbsp;分鐘內抵達
                    </div>
                    <div class="mb-3">
                        <img src="img/address.png" alt="">&ensp;外送到台中市南屯區公益路二段51號18樓
                    </div>
                    <div class="mt-4 mb-4">
                        <hr>
                    </div>
                    <ul class="noPad noMarg" style="list-style:none">
                        <li class="noPad noMarg mb-3 d-flex justify-content-between">
                            <div>小計</div>
                            <div>NT$@{{shoppingBagTotalPrice}}</div>
                        </li>
                        <li class="noPad noMarg mb-4 d-flex justify-content-between">
                            <div>外送費</div>
                            <div>NT$15</div>
                        </li>
                        <li class="noPad noMarg mb-3 d-flex justify-content-between">
                            <div><h5>總計</h5></div>
                            <div><h4>NT$@{{orderTotalAmount}}</h4></div>
                        </li>
                    </ul>
                    <a v-on:click="sendOrders" style="text-decoration: none;">
                        <div class="orderConfirmDiv alignCenter bgOrange">
                            安排訂單
                        </div>
                    </a>
                </div>
            </div> {{-- rightdiv --}}
        </div>     {{-- row --}}
    </div> {{-- orderDetailDiv --}}
@endsection

@section('script')
    <script>
        var orderDetailDivApp = new Vue ({
            el:"#orderDetailDiv",
            data:{
                header:"shopID",
                id:1,
                // 餐廳名稱
                restaurantName: '',
                shiptime: 0,
                ShopID: -1,
                // 會員
                memberName:'',
                memberID:'',
                // 數量選擇框
                quantitySelectLists: [],

                // 購物袋 總數 總價
                shoppingBagTotalQuantity: 0,
                shoppingBagTotalPrice: 0,

                // 加運費 訂單總金額
                orderTotalAmount: 0,

                // 購物袋 各個資料
                shoppingBagMealQuantity: [],
                shoppingBagMealTotalPrice: [],
                shoppingBagMealName: [],
                shoppingBagMealPrice: [],
            },
            methods:{
                sendOrders: function(){
                    let _this = this;
                    Swal.fire({                 // delete form
                        title: '確定要安排訂單嗎?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '送出訂單',
                        cancelButtonText: '再考慮一下'
                        }).then((result) => {
                            if (result.value){

                                let dataToSever = {
                                    OrdersDetails: {
                                        restaurant: _this.restaurantName,
                                        memberName: _this.memberName,
                                        coupon: '',
                                        meal:[]
                                    },
                                    OrdersStatus: 1,
                                    MemberID: _this.memberID,
                                    ShopID: _this.ShopID,
                                }
                                
                                _this.shoppingBagMealQuantity.forEach((element,index) => {
                                    dataToSever.OrdersDetails.meal.push({   mealQuantity:element,
                                                                            mealName:_this.shoppingBagMealName[index],
                                                                            mealUnitPrice:_this.shoppingBagMealPrice[index],
                                                                            mealDetail:[{type:0,mealNum:"meal0",detail:"",price:"",check:false}]
                                                                        });      
                                });
                                dataToSever.OrdersDetails = JSON.stringify(dataToSever.OrdersDetails);
                                console.log(dataToSever);


                                axios.post('/api/order', dataToSever)
                                .then(function (response) {
                                    axios.post('/socket/clientsend', {
                                        header: _this.header,
                                        id:_this.id
                                    })
                                    .then(function (response) {
                                        console.log(response.data);
                                    })
                                    .catch(function (response) {
                                        console.log(response)
                                    });
                                })
                            }
                    });
                }
            },
            watch: {
                // watch 餐點數量變化
                shoppingBagMealQuantity: function (value) {
                    // console.log(value);
                    _this = this;
                    this.shoppingBagTotalQuantity = 0;
                    // 每筆 數量 和 順序
                    value.forEach((element,index) => {
                        // console.log(element);
                        // 根據數量變化 改變每筆的總價
                        _this.shoppingBagMealTotalPrice[index] = _this.shoppingBagMealPrice[index] * element;
                        // console.log(_this.shoppingBagMealTotalPrice);
                        // 餐點總數 更新
                        _this.shoppingBagTotalQuantity += parseInt(element);
                        // navbar 餐點總數 更新
                        navBar.shoppingBagTotalQuantity = _this.shoppingBagTotalQuantity;

                        // 移除餐點 更新data array值
                        if (element == '0'){
                            this.shoppingBagMealQuantity.splice(index, 1);
                            this.shoppingBagMealTotalPrice.splice(index, 1);
                            this.shoppingBagMealName.splice(index, 1);
                            this.shoppingBagMealPrice.splice(index, 1);
                        }
                    });

                    // 數量變化 新增到 localstorage
                    if (value != 0) {
                        localStorage.setItem("mealQuantityArray", JSON.stringify(value));
                        localStorage.setItem("mealTotalPriceArray", JSON.stringify(this.shoppingBagMealTotalPrice));
                        localStorage.setItem("mealNameArray", JSON.stringify(this.shoppingBagMealName));
                        localStorage.setItem("mealPriceArray", JSON.stringify(this.shoppingBagMealPrice));
                    }else{
                        window.self.location=window.document.referrer;  
                        localStorage.removeItem('mealNameArray');
                        localStorage.removeItem('mealPriceArray');
                        localStorage.removeItem('mealQuantityArray');
                        localStorage.removeItem('mealTotalPriceArray');
                        localStorage.removeItem('restautantName');
                        localStorage.removeItem('shipTime');
                        localStorage.removeItem('shopID');
                    }

                    // 總價 更新
                    this.shoppingBagTotalPrice = 0;
                    this.shoppingBagMealTotalPrice.forEach(element => {
                        _this.shoppingBagTotalPrice += element;
                    });
                    // 加運費 總價 更新
                    this.orderTotalAmount = this.shoppingBagTotalPrice + 15 ;
                },
            },
            mounted: function () {
                // 結帳畫面隱藏遊覽列購物袋圖示
                if (this.shoppingBagTotalQuantity >= 0) {
                    $("#shoppingBag").css("display","none");
                }

                // 數量選擇框
                for(var i=1; i<=99; i++){
                    this.quantitySelectLists.push(i);
                }

                // console.log(localStorage.getItem('mealPriceArray'));
                if (localStorage.getItem('mealPriceArray') != null ){
                // 取出localstorage資料
                let storedMealNameArray = JSON.parse(localStorage.getItem('mealNameArray'));
                let storedMealPriceArray = JSON.parse(localStorage.getItem('mealPriceArray'));
                let storedMealQuantityArray = JSON.parse(localStorage.getItem('mealQuantityArray'));
                let storedMealTotalPriceArray = JSON.parse(localStorage.getItem('mealTotalPriceArray'));
                let storedRestautantName = JSON.parse(localStorage.getItem('restautantName'));
                let storedShipTime = JSON.parse(localStorage.getItem('shipTime'));
                let storedShopID = JSON.parse(localStorage.getItem('shopID'));

                let memberName = localStorage.getItem('memberName');
                let memberID = localStorage.getItem('memberID');
                // console.log(storedMealNameArray);
                // console.log(storedMealPriceArray);
                // console.log(storedMealQuantityArray);
                // console.log(storedMealTotalPriceArray);
                // console.log(storedRestautantName);
                // localstorage如果有資料 丟到 購物袋
                this.shoppingBagMealName = storedMealNameArray;
                this.shoppingBagMealPrice = storedMealPriceArray;
                this.shoppingBagMealQuantity = storedMealQuantityArray;
                this.shoppingBagMealTotalPrice = storedMealTotalPriceArray;
                this.restaurantName = storedRestautantName;
                this.shiptime = storedShipTime;
                this.ShopID = storedShopID;
                this.memberID = memberID;
                this.memberName = memberName;
                // console.log(this.restaurantName);
                }
            },
        })
    
    </script>
@endsection