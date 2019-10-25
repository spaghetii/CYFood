@extends('layouts.clientLayout')

@section('content')
<link rel="stylesheet" href="/css/clientUser.css">
{{-- bottom --}} 
<div class="no-gutters" id="buttomDiv">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        {{-- <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#delay" role="tab" aria-controls="delay" aria-selected="true">暫停接單</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#restOrder" role="tab" aria-controls="restOrder" aria-selected="true">歷史訂單</a>
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
        {{-- <div class="tab-pane fade show active" id="delay" role="tabpanel" aria-labelledby="home-tab">
            <div class="card text-center">
                <div class="card-header" v-if="headerShow">
                    停止受理新訂單
                </div>
                <div class="card-header" v-if="!headerShow">
                    您的餐廳將於
                </div>
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
                <div class="card-footer text-muted">
                    <button type="button" class="btn btn-outline-dark" id="delaySubmit" v-on:click="delaySubmit" v-if="btnShow">送出</button>
                    <button type="button" class="btn btn-outline-dark" id="delayReset" v-on:click="delayReset" v-if="!btnShow">重新營業</button>
                </div>
            </div>
        </div> --}}
        {{-- 歷史訂單 --}}
        <div class="tab-pane fade show active" id="restOrder" role="tabpanel" aria-labelledby="home-tab">
            {{-- 搜尋 --}}
            <div class="input-group">
                <select class="col-sm-4 form-control" id="orderSelect" name="orderSelect" v-model="orderSelect">
                    <option value="OrdersNum">訂單編號</option>
                    <option value="OrdersCreate">訂單日期</option>
                    <option value="memberName">客戶名稱</option>
                    {{-- <option value="total">訂單金額</option> --}}
                    <option value="OrdersStatus">訂單狀況</option>
                </select>
                <input type="text" class="form-control" placeholder="請輸入關鍵字" aria-label="Recipient's username" aria-describedby="button-addon2" v-model="search">
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
                <tr v-for="item,index in searchData.slice(start,start+numPerPage)" v-if="item.OrdersStatus==5">
                    <td>@{{item.OrdersNum}}</td>
                    <td>@{{item.OrdersCreate}}</td>
                    <td>@{{item.OrdersDetails.memberName}}</td>
                    <td>@{{total[index]}}</td>
                    <td>已完成</td>
                </tr>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item" v-for="page in totalPage"  v-on:click="currentPage = page" :class="{'active': (currentPage == page)}">
                    <a class="page-link" href="#">@{{page}}</a>
                  </li>
                </ul>
            </nav>
        </div>
        {{-- 銷售統計 --}}
        <div class="tab-pane fade" id="restSales" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row no-gutters">
                <div class="col-lg-2">
                    <div id="chartSearchDiv">
                        {{-- <select class="form-control form-control-lg chartSearch" name="chartName">
                            <option value="chartNameOrders">訂單數</option>
                            <option value="chartNameSales">銷售額</option>
                            <option value="chartNameProducts">商品</option>
                        </select> --}}
                        <select class="form-control form-control-lg chartSearch" name="chartYear">
                            <option value="chartYear2019">2019</option>
                        </select>
                        <select class="form-control form-control-lg chartSearch" name="chartMonth" v-model="chartMonth">
                            <option value="default" selected hidden disabled>請選擇月份</option>
                            <option value="09">9月</option>
                            <option value="10">10月</option>
                            <option value="11">11月</option>
                            <option value="12">12月</option>
                        </select>
                        <button type="button" class="btn btn-outline-secondary" id="chartSearchBtn" v-on:click="chartSearchClick">搜尋</button>
                    </div>
                </div>
                <div class="col-lg-8" id="chartDiv">
                    <ve-histogram :data="chartData" :colors="colors"></ve-histogram>
                </div>
                <div class="col-lg-2">
                </div>
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
                    {{-- <div class="form-group row">
                        <label for="restTime" class="col-sm-3 col-form-label">營業時間</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="restTime" value="11:00 - 20:00">
                        </div>
                    </div> --}}
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
                            <div id="emailHelp" v-if="emailHelpShow">如欲修改信箱，請聯絡客服．</div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-outline-dark" v-on:click="restEdit" id="restEdit">確認修改</button>
                    </div> 
                </form>
            </div>
            {{-- 修改密碼 --}}
            <div id="information2">
                <form>
                    <div class="form-group row">
                        <label for="pswdNow" class="col-sm-3 col-form-label">現有密碼</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" v-bind:class="{ 'is-invalid': passwordError ,'is-valid': passwordOK }" id="pswdNow" v-model.lazy="shopPassword" placeholder="Password">
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="pswdNew1" class="col-sm-3 col-form-label">更新密碼</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pswdNew1" v-model="newPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pswdNew2" class="col-sm-3 col-form-label">確認密碼</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" v-bind:class="{ 'is-invalid': repeatError ,'is-valid': repeatOK }" id="pswdNew2" v-model.lazy="repeatPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-outline-dark"   :disabled="isDisabled" v-on:click="changePassword" id="pswdEdit">確認修改</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
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
                    let flag = setInterval(goBack, 1000);
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
            shopID:-1,
            numPerPage:10,
            currentPage:1
        },
        mounted:function(){
            let test = (location.href).split("/");
            this.shopID = test[test.length-1];
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
                        
                        //以下為charts:
                        let finalDate = [];
                        let counter = {};
                        for(let ii=0;ii<_this.list.length;ii++){
                            //只抓已完成訂單
                            if(_this.list[ii].OrdersStatus==5){
                            let beforeDate = _this.list[ii].OrdersCreate.split(" ",1);//取出2019-10-04
                            let afterDate = beforeDate[0].split("-");//取出['2019','10','04']
                            if(chartSearchDiv.chartMonth==afterDate[1]){//只選出選擇到的月份的日期
                                finalDate.push(afterDate[2]);//['04','05','05','05'.....]
                            }}
                        }
                        finalDate.forEach(function(x){
                            counter[x] = (counter[x] || 0) + 1; 
                        })
                        // console.log(counter["05"]);//=>9 共9筆
                        let result = Array.from(new Set(finalDate));
                        // console.log(result);//['04','05','15','16']只取出不重複項目
                        let y = 2019;
                        let m = chartSearchDiv.chartMonth;
                        let firstDay = new Date(y, m - 1, 1).getDate();
                        let lastDay = new Date(y, m, 0).getDate();
                        let allDay = []
                        for(let i=firstDay;i<=lastDay;i++){
                            allDay.push(i);
                            allDay[i-1]=allDay[i-1]+100;
                            allDay[i-1]=allDay[i-1].toString();
                            allDay[i-1]=allDay[i-1].substring(1,3);
                        }
                        // console.log(allDay);//['01','02',.....]
                        chartDiv.chartData.rows = [];//清空資料
                        for(let index=firstDay-1;index<=lastDay-1;index++){
                            //allDay[0]='01' 比對到result[]裡沒有'01' 顯示false
                            let torf = result.some(e=>e==allDay[index]);
                            let temp = ((index+1)<10)?'0'+(index+1):(index+1);//將1~9變成01~09
                            chartDiv.chartData.rows.push({'日期':allDay[index],'訂單數':
                                torf?counter[temp]:0//如果torf是true 就計算幾筆 false就顯示0
                            });
                        }
                    })
                    .catch(function(response){
                        console.log(response);
                    })
            }
        },
        computed:{
            searchData:function(){
                let _this = this;
                let _search = this.search.toLowerCase().trim();
                let _orderSelect = this.orderSelect;
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
            },
            totalPage:function(){
                return Math.ceil(this.searchData.length/this.numPerPage);
            },
            start:function(){
                return (this.currentPage-1)*this.numPerPage;
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
            ],
            emailHelpShow:false,
            shopPassword:"",
            newPassword:"",
            repeatPassword:"",
            passwordError:false,
            passwordOK:false,
            repeatError:false,
            repeatOK:false, 
        },
        methods:{
            emailHelp:function(){
                this.emailHelpShow=true;
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
            },
            restEdit:function(){
                let _this = this;
                axios.put('/api/shop/'+restOrder.shopID, this.shop)
                    .then(function (response) {
                        if (response.data['ok']) {
                            Swal.fire({
                                type: 'success',
                                title: '修改資料成功',
                            }).then((result) => {
                                console.log(result.value);
                                if (result.value) {
                                    _this.init(); //更新目前畫面
                                }
                            })   
                        }           
                    })
            },
            changePassword:function(){
                let self = this;
                axios.put('/api/shop/changepwd/'+restOrder.shopID, {
                    ShopPassword: this.newPassword
                })
                .then(function (response) {
                    if (response.data['ok']) {
                        Swal.fire({
                            type: 'success',
                            title: '修改密碼成功',
                        }).then((result) => {
                            console.log(result.value);
                            if (result.value) {
                                self.shopPassword="";
                                self.newPassword="";
                                self.repeatPassword="";
                            }
                        })   
                    }               
                })
            }
        },
        watch:{
            shopPassword:function(){
                if(this.shopPassword == ""){
                    this.passwordError = false;
                    this.passwordOK = false;
                    return;
                }
                let self = this;
                axios.post('/api/shop/checkpwd/'+restOrder.shopID, {
                        ShopPassword: this.shopPassword,
                    })
                    .then(function (response) {
                        console.log(response.data['passwordError']);
                        if (response.data['passwordError']){
                            self.passwordOK = false;
                            self.passwordError = true;
                            return;
                        }
                        self.passwordError = false;
                        self.passwordOK = true;
                            
                    })
                    .catch(function (response) {
                        console.log(response)
                    });
            },
            repeatPassword:function(){
                if(this.repeatPassword == ""){
                    this.repeatError = false;
                    this.repeatOK = false;
                    return;
                }
                if(this.repeatPassword != this.newPassword){
                    this.repeatOK = false;
                    this.repeatError = true;
                    return;
                }
                this.repeatError = false;
                this.repeatOK = true;
            }
        },
        computed:{
            isDisabled(){
                if(this.repeatOK && this.passwordOK){
                    return false;
                }
                return true;
            }
        },
        mounted:function(){
            this.init();
        }
    })

    var chartSearchDiv = new Vue({
        el:"#chartSearchDiv",
        data:{
            chartMonth:"default"
        },
        methods:{
            chartSearchClick:function(){
                restOrder.init();
            }
        }
    })

    var chartDiv = new Vue({
        el:"#chartDiv",
        data:function () {
            var chartData = {
                columns:['日期','訂單數'],
                rows:[]
            };
            this.colors = ['#4E7BA7'];
            return {chartData}
        }
    })

   
  
</script>
@endsection
