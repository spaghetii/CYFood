@extends('layouts.clientLayout')

@section('content')
<link rel="stylesheet" href="/css/clientUser.css">
{{-- bottom --}}
<div class="no-gutters" id="buttomDiv">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#delay" role="tab" aria-controls="delay" aria-selected="true">暫停接單</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#restOrder" role="tab" aria-controls="restOrder" aria-selected="false">歷史訂單</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#restSales" role="tab" aria-controls="restSales" aria-selected="false">銷售統計</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#restInfo" role="tab" aria-controls="restInfo" aria-selected="false">餐廳資訊</a>
        </li>
    </ul>
    {{-- 標籤內容 --}}
    <div class="tab-content" id="myTabContent">
        {{-- 暫停接單 --}}
        <div class="tab-pane fade show active" id="delay" role="tabpanel" aria-labelledby="home-tab">
            {{-- 卡片 --}}
            <div class="card text-center">
                {{-- v-if="headerShow" --}}
                <div class="card-header" v-if="headerShow">
                    停止受理新訂單
                </div>
                <div class="card-header" v-if="!headerShow">
                    您的餐廳將於
                </div>
                {{-- v-if="bodyShow" --}}
                <div class="card-body" v-if="bodyShow">
                    您希望暫停多久？<br><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="delayOptions" id="delay30" v-model="delayOptions" value="30">
                        <label class="form-check-label" for="delay30">30分鐘</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="delayOptions" id="delay60" v-model="delayOptions" value="60">
                        <label class="form-check-label" for="delay60">60分鐘</label>
                    </div>       
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="delayOptions" id="delay90" v-model="delayOptions" value="90">
                        <label class="form-check-label" for="delay90">90分鐘</label>
                    </div>       
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="delayOptions" id="delay120" v-model="delayOptions" value="120">
                        <label class="form-check-label" for="delay120">120分鐘</label>
                    </div>
                    <div id="delayHelp" v-if="delayHelpShow">請選取時間</div>       
                </div>
                <div class="card-body" v-if="!bodyShow">
                    @{{delayOptions}}分鐘後開始營業
                </div>
                {{--  --}}
                <div class="card-footer text-muted">
                    <button type="button" class="btn btn-outline-dark" id="delaySubmit" v-on:click="delaySubmit" v-if="btnShow">送出</button>
                    <button type="button" class="btn btn-outline-dark" id="delayReset" v-on:click="delayReset" v-if="!btnShow">重新營業</button>
                </div>
            </div>
        </div>
        {{-- 歷史訂單 --}}
        <div class="tab-pane fade" id="restOrder" role="tabpanel" aria-labelledby="profile-tab">
            {{-- 搜尋 --}}
            <div class="input-group">
                <select class="col-sm-4 form-control" id="orderSelect" name="orderSelect" v-model="orderSelect">
                    <option value="OrdersNum">訂單編號</option>
                    <option value="OrdersCreate">訂單日期</option>
                    <option value="memberName">客戶名稱</option>
                    <option value="total">訂單金額</option>
                    <option value="OrdersStatus">訂單狀況</option>
                </select>
                <input type="text" class="form-control" placeholder="Please Enter Keyword" aria-label="Recipient's username" aria-describedby="button-addon2" v-model="search">
            </div>
            {{-- 表格 --}}
            <table>
                <tr>
                    <th>訂單編號</th>
                    <th>訂單日期</th>
                    <th>客戶名稱</th>
                    <th>訂單金額</th>
                    <th>訂單狀況</th>
                </tr>
                <tr v-for="item,index in searchData">
                    <td>@{{item.OrdersNum}}</td>
                    <td>@{{item.OrdersCreate}}</td>
                    <td>@{{item.OrdersDetails.memberName}}</td>
                    <td>@{{total[index]}}</td>
                    <td>@{{item.OrdersStatus}}</td>
                </tr>
                
            </table>
            <a href="#"><div id="upDiv"></div></a>
        </div>
        {{-- 銷售統計 --}}
        <div class="tab-pane fade" id="restSales" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row no-gutters">
                <div class="col-lg-2">
                    <div id="chartSearchDiv">
                        <select class="form-control form-control-lg chartSearch" name="chartName" v-model="chartName">
                            <option value="chartNameOrders">訂單數</option>
                            <option value="chartNameSales">銷售額</option>
                            <option value="chartNameProducts">商品</option>
                        </select>
                        <select class="form-control form-control-lg chartSearch" name="chartYear" v-model="chartYear">
                            <option value="chartYear2019">2019</option>
                        </select>
                        <select class="form-control form-control-lg chartSearch" name="chartMonth" v-model="chartMonth">
                            <option value="chartMonth9">Semptember</option>
                            <option value="chartMonth10">October</option>
                            <option value="chartMonth11">November</option>
                        </select>
                        @{{chartId}}
                    </div>
                </div>
                <div class="col-lg-8" id="chartDiv">
                    <canvas :id="chartId"></canvas>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        {{-- 餐廳資訊 --}}
        <div class="tab-pane fade" id="restInfo" role="tabpanel" aria-labelledby="contact-tab">
            {{-- 修改資料 --}}
            <div id="information1">
                <form>
                    <div class="form-group row">
                        <label for="restName" class="col-sm-3 col-form-label">餐廳名稱</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="restName" v-model="shop.ShopName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="restAddr" class="col-sm-3 col-form-label">餐廳地址</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="restAddr" v-model="shop.ShopAddress">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="restTel" class="col-sm-3 col-form-label">餐廳電話</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="restTel" v-model="shop.ShopPhone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="restTime" class="col-sm-3 col-form-label">營業時間</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="restTime" value="11:00 - 20:00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="restCategory" class="col-sm-3 col-form-label">餐廳種類</label>
                        <select v-model="shop.ShopType" class="col-sm-5 form-control">
                        <option v-for="total in shopType">@{{total.type}}</option>
                            
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="restEmail" class="col-sm-3 col-form-label">電子郵件</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="restEmail" v-model="shop.ShopEmail" v-on:click="emailHelp">
                            <div id="emailHelp">如欲修改信箱，請聯絡客服．</div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-outline-dark" id="restEdit">確認修改</button>
                    </div> 
                </form>
            </div>
            {{-- 修改密碼 --}}
            <div id="information2">
                <form>
                    <div class="form-group row">
                        <label for="pswdNow" class="col-sm-3 col-form-label">現有密碼</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pswdNow" v-model="shop.ShopPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pswdNew1" class="col-sm-3 col-form-label">更新密碼</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pswdNew1" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pswdNew2" class="col-sm-3 col-form-label">確認密碼</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pswdNew2" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-outline-dark" id="pswdEdit">確認修改</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="/js/charts.js" charset="UTF-8"></script>
<script>
    var delay = new Vue({
        el:"#delay",
        data:{
            delayOptions:"",
            headerShow:true,
            bodyShow:true,
            btnShow:true,
            delayHelpShow:false
        },
        methods:{
            delaySubmit:function(){
                if(this.delayOptions != ""){
                    this.headerShow = false;
                    this.bodyShow = false;
                    this.btnShow = false;
                    var flag = setInterval(goBack, 100);
                    function goBack(){
                        delay.delayOptions--;
                        if(delay.delayOptions<=0){
                            clearInterval(flag);
                            location.reload();
                        }
                    }
                }else{
                    this.delayHelpShow=true;
                }
            },
            delayReset:function(){
                location.reload();
            }
        }
    })

    var restOrder = new Vue({
        el:"#restOrder",
        data:{
            list:[],
            total:[],
            orderSelect:"OrdersNum",
            search:"",
            shopID:-1
        },
        mounted:function(){
            let shopID = location.pathname.substr(11);
            this.shopID = shopID;
            this.init();
        },
        methods:{
            init:function(){
                let _this = this;
                axios.get('/api/order/shop/'+this.shopID)  //改為依shopID抓order資料 by林培誠
                    .then(function(response){
                        _this.list = response.data;
                        _this.list.forEach((element,index)=>{
                            _this.list[index].OrdersDetails = JSON.parse(_this.list[index].OrdersDetails);
                            _this.total[index] = 0;
                            _this.list[index].OrdersDetails.meal.forEach(ele=>{
                                _this.total[index] += ele.mealQuantity * ele.mealUnitPrice;
                            })
                        })
                        // console.log(_this.list);
                    })
                    .catch(function(response){
                        console.log(response);
                    })
            }
        },
        computed:{
            searchData:function(){
                let _this = this;
                var _search = this.search;
                var _orderSelect = this.orderSelect;
                if(_search){
                    return this.list.filter(function(data,index){
                        
                        return Object.keys(data).some(function(key){
                            // console.log(key);
                            if(_orderSelect==key){
                                return String(data[key]).toLowerCase().indexOf(_search)>-1;
                            }
                        }) || Object.keys(data.OrdersDetails).some(function(key){
                            // console.log(key);
                            if(_orderSelect==key){
                                return String(data.OrdersDetails[key]).toLowerCase().indexOf(_search)>-1;
                            }
                        }) 
                    })
                }
                return this.list;
            }
        }
    })

    var restInfo = new Vue({
        el:"#restInfo",
        data:{
            shop:[],
            shopType:[
                {type:"中式美食"},
                {type:"台灣美食"},
                {type:"日式美食"},
                {type:"美式美食"},
                {type:"飲料"},
            ]
        },
        methods:{
            emailHelp:function(){
                $("#emailHelp").css("display","block")
            },
            init:function(){
                let _this = this;
                axios.get('/api/shop/'+restOrder.shopID)  
                    .then(function(response){
                        console.log(response.data);
                        _this.shop = response.data;
                        // console.log(_this.list);
                    })
                    .catch(function(response){
                        console.log(response);
                    })
            }
        },
        mounted:function(){
            this.init();
        }
    })

    var restSales = new Vue({
        el:"#restSales",
        data:{
            chartName:"",
            chartYear:"",
            chartMonth:""
        },
        computed:{
            chartId:function(){
                return this.chartName+this.chartYear+this.chartMonth;
            }
        }
    })
  
</script>
@endsection
