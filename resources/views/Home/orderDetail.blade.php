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
                        {{-- <a href="" class="colorOrange aHoverColor">編輯</a> --}}
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
                            <div class="col-9" v-cloak>@{{shiptime-5}} – @{{shiptime+5}} 分鐘</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">優惠卷</div>
                            <div class="col-9"><input type="text" v-bind:class="{ 'is-invalid': couponError ,'is-valid': couponOK }" 
                                                v-model.lazy="coupon" class="form-control form-control-sm"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">付款方式</div>
                            <div class="col-9">
                                <div class="form-check mb-1">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" checked>現金
                                    </label>
                                </div>
                                <div class="form-check d-flex justify-content-between mb-3"  v-if="profile.MemberCredit != null" v-cloak>
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">信用卡
                                    </label>
                                    <select class="form-control form-control-sm" style="width:83%">
                                        <option>@{{profile.MemberCredit}}</option>
                                    </select>
                                </div>
                                <div>
                                    <div v-if="profile.MemberCredit == null" class="bgOrange textWhite" id="addCreditCardBtn" data-toggle="modal" data-target="#addCreditCardModal">
                                        新增信用卡號
                                    </div>
                                    <div v-if="profile.MemberCredit != null" class="bgOrange textWhite" id="addCreditCardBtn" data-toggle="modal" data-target="#addCreditCardModal">
                                        更改信用卡號
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 餐點詳情 --}}
                <div class="orderDetailItemDiv" id="orderDetailItemDivApp">
                    <div class="d-flex justify-content-between">
                        <div v-cloak>
                            <h5>餐點份數&nbsp;(@{{shoppingBagTotalQuantity}})</h5>
                            <small>訂餐餐廳：@{{restaurantName}}</small>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div>
                        <ul class="noPad">
                            <li style="list-style-type:none" v-for="MealItem,index in shoppingBagMealName">
                                <div class="d-flex  noPad">
                                    <div class="shoppingBagModalItemQuantity noPad mr-3" >
                                        <div class="form-group noMarg" v-cloak style="width:100px">
                                            <select class="form-control" v-model="shoppingBagMealQuantity[index]">
                                                <option value="0">移除</option>
                                                <option v-for="item in quantitySelectLists">@{{item}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div v-cloak class="noPad">
                                            @{{shoppingBagMealName[index]}}
                                        </div>   
                                        <div style="margin:8px 0px 4px;font-size: 14px;line-height: 16px;"
                                                v-for="in1,dindex in shoppingBagMealDetail[0]" >
                                            <div v-for="in2 in in1" v-if="index == dindex">       
                                                <div v-if="in2[0].type == 1" style="font-weight:bold">加點 Add-ons</div>
                                                <div v-for="item in in2" v-if="item.type == 1">@{{item.detail}}</div>
                                                <div v-if="in2[0].type == 2" style="font-weight:bold">份量 Size</div>
                                                <div v-for="item in in2" v-if="item.type == 2">@{{item.detail}}</div>
                                            </div>
                                        </div> 
                                    </div>   
                                    <div class="noPad ml-auto" v-for="item,sindex in shoppingBagMealTotalPrice" v-if="index == sindex" v-cloak>
                                        $@{{item}}
                                    </div> 
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
                    <div class="mb-3" v-cloak>
                        <img src="img/shopping-bag1.png" alt="">&ensp;透過&nbsp;@{{restaurantName}}&nbsp;訂購的&nbsp;@{{shoppingBagTotalQuantity}}&nbsp;份餐點
                    </div>
                    <div class="mb-3" v-cloak>
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
                            <div v-cloak>NT$@{{shoppingBagTotalPrice}}</div>
                        </li>
                        <li class="noPad noMarg mb-4 d-flex justify-content-between">
                            <div>外送費</div>
                            <div>NT$@{{shippingfee}}</div>
                        </li>
                        <li class="noPad noMarg mb-3 d-flex justify-content-between">
                            <div><h5>總計</h5></div>
                            <div v-cloak><h4>NT$@{{orderTotalAmount}}</h4></div>
                        </li>
                    </ul>
                    <a href="javascript:void(0);" v-on:click="sendOrders" style="text-decoration: none;">
                        <div class="orderConfirmDiv alignCenter bgOrange">
                            安排訂單
                        </div>
                    </a>
                </div>
            </div> {{-- rightdiv --}}
        </div>     {{-- row --}}
    </div> {{-- orderDetailDiv --}}

    <!-- addCreditCardModal -->
    <div class="modal fade" id="addCreditCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">新增信用卡號</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="/img/close1.png" alt=""></span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">卡號</label>
                    <input type="text" class="form-control" name="creditInput" v-on:blur="creditInputBlur" v-bind:class="{ 'is-invalid': creditInputError }" v-model="creditInput" id="creditCardInput" size="19" maxlength="19" required>
                    <div class="invalid-feedback">
                        @{{ creditCardErrMsg }}
                    </div>
                </div>
                <div class="d-flex flex-row container-fluid noPad">
                    <div class="form-group noPad mr-2" style="width:100%">
                        <label for="exampleInputEmail">有效期限</label>
                        <input type="text" class="form-control" name="creditInputDate" 
                            v-on:blur="creditInputDateBlur" 
                            v-bind:class="{ 'is-invalid': creditInputDateError }" 
                            v-model="creditInputDate" id="creditCardInput" size="5" maxlength="5" required placeholder="MM/YY">
                        <div class="invalid-feedback">
                            @{{ creditInputDateErrMsg }}
                        </div>
                    </div>
                    <div class="form-group noPad" style="width:100%">
                        <label for="exampleInputEmail">安全碼</label>
                        <input type="password" class="form-control" name="creditInputSafe" 
                            v-on:blur="creditInputSafeBlur" 
                            v-bind:class="{ 'is-invalid': creditInputSafeError }" 
                            v-model="creditInputSafe" id="creditCardInput" size="3" maxlength="3" required>
                        <div class="invalid-feedback">
                            @{{ creditInputSafeErrMsg }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:30%">取消</button>
                <button type="button" class="btn btn-warning" style="width:30%" v-on:click="addCreditCardBtnClick">儲存</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var orderDetailDivApp = new Vue ({
            el:"#orderDetailDiv",
            data:{
                profile:[],
                header:"shopID",
                // 餐廳名稱
                restaurantName: '',
                shiptime: 0,
                ShopID: -1,
                ShopImage:"",
                shippingfee:15,
                // 會員
                memberName:'',
                memberID:'',
                // 數量選擇框
                quantitySelectLists: [],

                // 購物袋 總數 總價
                shoppingBagTotalQuantity: 0,
                shoppingBagTotalPrice: 0,

                // 加運費 訂單總金額
                // orderTotalAmount: 0,

                // 購物袋 各個資料
                shoppingBagMealQuantity: [],
                shoppingBagMealTotalPrice: [],
                shoppingBagMealName: [],
                shoppingBagMealPrice: [],
                //優惠券
                coupon:"",
                couponError:false,
                couponOK:false,

                shoppingBagMealDetail:[],
            },
            methods:{
                init: function(){
                    var _this = this;
                    
                    axios.get('/api/member/'+this.memberID)
                    .then(function (response) {
                        _this.profile = response.data;
                        // console.log(_this.profile);
                        addCreditCardModalnApp.memberID = _this.profile.MemberID;
                        // console.log(addCreditCardModalnApp.memberID);
                    })
                    .catch(function (response) {
                        console.log(response);
                    });
                },
                sendOrders: function(){
                    if(this.couponError == true){
                        Swal.fire({
                            type: 'error',
                            title: '無此優惠券或已失效',
                        })
                        return;
                    }
                    let _this = this;
                    Swal.fire({                 // 送出訂單前確認視窗
                        title: '確定要安排訂單嗎?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '送出訂單',
                        cancelButtonText: '再考慮一下'
                        }).then((result) => {
                            _this.memberName = sessionStorage.getItem('memberName');
                            // console.log(_this.memberName);
                            if (result.value){

                                let dataToSever = {
                                    OrdersDetails: {
                                        restaurant: _this.restaurantName,
                                        memberName: _this.memberName,
                                        meal:[],
                                        coupon: _this.coupon,
                                        orderTotalAmount:_this.orderTotalAmount,   //新增的
                                        ShopImage:_this.ShopImage   //多塞一個餐廳圖片  歷史訂單要用 by 林培誠
                                    },
                                    OrdersStatus: 1,
                                    MemberID: _this.memberID,
                                    ShopID: _this.ShopID,
                                }
                                // [{"type":0,"mealNum":"meal0","detail": "","price":"","check":false}]
                                
                                _this.shoppingBagMealQuantity.forEach((element,index) => {
                                    let mealDetailTemp = [];

                                    // console.log(index);
                                    // console.log(_this.shoppingBagMealDetail[0][index]);
                                    
                                    _this.shoppingBagMealDetail[0][index].Add.forEach(dAddElement => {
                                        mealDetailTemp.push(dAddElement);
                                    });
                                    _this.shoppingBagMealDetail[0][index].Size.forEach(dSizeElement => {
                                        mealDetailTemp.push(dSizeElement);
                                    });
                                    // console.log(mealDetailTemp);
                                    dataToSever.OrdersDetails.meal.push({   mealQuantity:element,
                                                                            mealName:_this.shoppingBagMealName[index],
                                                                            mealUnitPrice:_this.shoppingBagMealPrice[index],
                                                                            mealDetail:mealDetailTemp
                                                                        });      
                                });
                                dataToSever.OrdersDetails = JSON.stringify(dataToSever.OrdersDetails);
                                // console.log(dataToSever);


                                axios.post('/api/order', dataToSever)
                                .then(function (response) {
                                    clearStorage();
                                    localStorage.setItem("OrdersNum", response.data['OrdersNum']);
                                    axios.post('/socket/clientsend', {
                                        header: _this.header,
                                        id:_this.ShopID,
                                        type:"addOrders"
                                    })
                                    .then(function (response) {
                                        window.location.href="/trackingOrder";
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
                        clearStorage();
                        window.self.location=window.document.referrer;  
                    }

                    // 總價 更新
                    this.shoppingBagTotalPrice = 0;
                    this.shoppingBagMealTotalPrice.forEach(element => {
                        _this.shoppingBagTotalPrice += element;
                    });
                    // 加運費 總價 更新
                    // this.orderTotalAmount = this.shoppingBagTotalPrice + this.shippingfee;
                    
                },
                coupon:function(){
                    let self = this;
                    if(this.coupon == ""){
                        this.couponError = false;
                        this.couponOK =false;
                        this.shippingfee = 15;
                        return;
                    }
                    axios.post('/api/coupon/check', {
                        CouponCode: this.coupon,
                    })
                    .then(function (response) {
                        if (response.data['ok']) {
                            self.couponError=false;
                            self.couponOK=true;
                            self.shippingfee = 0;
                            return;
                        }
                        self.shippingfee = 15;
                        self.couponOK=false;
                        self.couponError=true;
                        
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
                }
            },
            computed:{
                orderTotalAmount : function(){
                    return this.shoppingBagTotalPrice + this.shippingfee;
                }
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
                let storedShopImage = JSON.parse(localStorage.getItem('shopImage'));

                let memberName = sessionStorage.getItem('memberName');
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
                this.ShopImage = storedShopImage;        //新增的
                this.memberID = memberID;
                this.memberName = memberName;
                // console.log(this.restaurantName);

                let storedUnitMealDetailTotalArray = JSON.parse(localStorage.getItem('unitMealDetailTotalArray'));
                this.shoppingBagMealDetail = {0:storedUnitMealDetailTotalArray};

                this.init();
                }
                
            },
        })
    
    function clearStorage(){
        localStorage.removeItem('mealNameArray');
        localStorage.removeItem('mealPriceArray');
        localStorage.removeItem('mealQuantityArray');
        localStorage.removeItem('mealTotalPriceArray');
        localStorage.removeItem('restautantName');
        localStorage.removeItem('shopID');
        localStorage.removeItem('unitMealDetailTotalArray');
        localStorage.removeItem('shopImage');         //新增的
    }
        // 新增信用卡 modal
        var addCreditCardModalnApp = new Vue ({
            el:'#addCreditCardModal',
            data: {
                creditInput: '',
                creditInputError: false,
                creditInputCorrect: false,
                creditCardErrMsg: '',
                memberID:'',
                creditInputDate: '',
                creditInputSafe: '',
                creditInputDateError: false,
                creditInputDateErrMsg: '',
                creditInputSafeError: false,
                creditInputSafeErrMsg: '',
            },
            watch: {
                creditInput: function () {
                    // 四字元補空格
                    this.creditInput = this.creditInput.replace(/(\d{4})(?=\d)/g, "$1-");                
                },
                creditInputDate: function () {
                    this.creditInputDate = this.creditInputDate.replace(/(\d{2})(?=\d)/g, "$1/");
                },
            },
            methods: {
                // input 失去焦點後 驗證格式
                creditInputBlur: function () {
                    let checkCredit = this.creditInput.replace(/-/g, '');
                    let isCredit =  /^[0-9\s]*$/;
                    if ( checkCredit == "" ){
                        this.creditInputError = false;
                    } else {
                            if (!isCredit.test(checkCredit)) {
                            this.creditInputError = true;
                            this.creditCardErrMsg = '請輸入數字';
                        } else if (checkCredit.length < 16) {
                            this.creditInputError = true;
                            this.creditCardErrMsg = '請完整輸入卡號';
                        } else {
                            this.creditInputError = false;
                        }
                    }
                },
                creditInputDateBlur: function () {
                    let checkCredit = this.creditInputDate.replace(/\//g, '');
                    let isCredit =  /^[0-9\s]*$/;
                    let checkMonth = checkCredit.substring(0,2);
                    if ( checkCredit == "" ){
                        this.creditInputDateError = false;
                    } else {
                            if (!isCredit.test(checkCredit)) {
                            this.creditInputDateError = true;
                            this.creditInputDateErrMsg = '請輸入數字';
                        } else if (checkCredit.length < 4) {
                            this.creditInputDateError = true;
                            this.creditInputDateErrMsg = '請完整輸入有效期限';
                        } else if (parseInt(checkMonth) >= 13 ||  checkMonth == 00) {
                            this.creditInputDateError = true;
                            this.creditInputDateErrMsg = '請正確輸入月份';
                        } else {
                            this.creditInputDateError = false;
                        }
                    }
                },
                creditInputSafeBlur: function () {
                    let isCredit =  /^[0-9\s]*$/;
                    if ( this.creditInputSafe == "" ){
                        this.creditInputSafeError = false;
                    } else {
                            if (!isCredit.test(this.creditInputSafe)) {
                            this.creditInputSafeError = true;
                            this.creditInputSafeErrMsg = '請輸入數字';
                        } else if (this.creditInputSafe.length < 3) {
                            this.creditInputSafeError = true;
                            this.creditInputSafeErrMsg = '請完整輸入安全碼';
                        } else {
                            this.creditInputSafeError = false;
                        }
                    }
                },
                // 送出信用卡號至DB
                addCreditCardBtnClick: function (){
                    if ( this.creditInput.length >= 19 ) {
                        if ( this.creditInputSafe.length < 3 ) {
                            this.creditInputSafeError = true;
                            this.creditInputSafeErrMsg = '請完整輸入安全碼';
                        }
                        if ( this.creditInputDate.length < 5 ) {
                            this.creditInputDateError = true;
                            this.creditInputDateErrMsg = '請完整輸入有效期限';
                        }
                        if ( this.creditInputSafe.length >= 3 && this.creditInputDate.length >= 5) {
                            let _this = this;
                            axios.put('/api/member/changecredit/'+this.memberID, {
                                MemberCredit:this.creditInput,
                            })
                            .then(function (response) {
                                if (response.data['ok']) {
                                    Swal.fire({
                                        type: 'success',
                                        title: '新增成功',
                                    }).then((result) => {
                                        console.log(result.value);
                                        if (result.value) {
                                            orderDetailDivApp.init();
                                            $('#addCreditCardModal').modal('toggle');
                                            _this.creditInput="";
                                            _this.creditInputDate="";
                                            _this.creditInputSafe="";
                                        }
                                    })   
                                }               
                            })
                        }
                    } else {
                        this.creditInputError = true;
                        this.creditCardErrMsg = '請完整輸入卡號';
                    }
                },
            }
        })
    
    </script>
@endsection