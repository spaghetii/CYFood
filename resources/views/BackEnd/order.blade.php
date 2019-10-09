@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control col" v-model="selected">
                <option value="OrdersNum">訂單編號</option>
                <option value="restaurant">餐廳名稱</option>    
                <option value="memberName">會員名稱</option>
                <option value="OrdersCreate">下單日期</option>
            </select>
        </div>
    </div>
@endsection 

@section('content')
    <div id="divright" class="col-10">
        <div>
            <div class="line2 row" id="tableTitle">
                <div class="col text-center tableTitle">訂單編號</div>
                <div class="col text-center tableTitle">餐廳名稱</div>
                <div class="col text-center tableTitle">會員名稱</div>
                <div class="col text-center tableTitle">下單日期</div>
                <div class="col"></div>
                <div id="neworder" class="col text-center">
                    <button id="singlebutton" name="singlebutton"
                    v-on:click="insertData" class="btn btn-primary tableTitle">✚</button>
                </div>
            </div>

            <hr>
            <div v-for="item,index in items" v-if="item.OrdersFinish != 0">
                <div class="line3 row">
                    <div class="col text-center ellipsis">@{{item.OrdersNum}}</div>
                    <div class="col text-center ellipsis">@{{item.OrdersDetails.restaurant}}</div>
                    <div class="col text-center ellipsis">@{{item.OrdersDetails.memberName}}</div>
                    <div class="col text-center ellipsis">@{{item.OrdersCreate}}</div>
                    <div class="col text-right">
                        <button id="singlebutton" name="singlebutton" 
                        v-on:click="edit(item.OrdersID)" class="btn btn-primary">查詢或修改</button>
                    </div>
                    <div class="col text-center">
                        <button id="singlebutton" name="singlebutton" 
                        v-on:click="remove(item.OrdersID)" class="btn btn-danger">刪除訂單</button>
                    </div>
                </div>
            </div>
            <hr>

        </div>
    </div>
@endsection

@section('dialog')
    <div id="orderModal" class="modal fade disableSelect" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="col-11 modal-title text-center">@{{title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">訂單編號: </label>
                            <input type="text" class="form-control col-sm-8" v-model="list.OrdersNum">
                        </div>
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">訂單狀態: </label>
                            <select class="custom-select col-sm-8" v-model="list.OrdersStatus">
                                <option value="0">取消訂單</option>
                                <option value="1" selected>等待接單</option>
                                <option value="2">處理中</option>
                                <option value="3">餐點完成</option>
                                <option value="4">訂單完成</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">會員名稱: </label>
                            <select class="custom-select col-sm-8" v-model="list.OrdersDetails.memberName">
                                <option v-for="memberitem in memberList" :value="memberitem.MemberName">@{{memberitem.MemberName}}</option>
                            </select>
                        </div>
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">餐廳名稱: </label>
                            <select class="custom-select col-sm-8" v-model="shopSelect">
                                <option v-for="shopitem in shopList" :value="shopitem.ShopID">@{{shopitem.ShopName}}</option>
                            </select>
                        </div>
                    </div>
                    <!-- 標題 -->
                    <table class="table table-hover" style="margin:0px">
                        <thead class="thead-dark text-center">
                            <tr style="border: 1px solid black;" >
                                <th scope="col" style="width: 28%;">餐點名稱</th>
                                <th scope="col" style="width: 28%;">下單數量</th>
                                <th scope="col" style="width: 28%;">餐點單價</th>
                                <th style="width: 15%;"></th>
                            </tr>
                        </thead>
                    </table>
                    <!-- 第一列 -->
                    <div v-for="item,index in list.OrdersDetails.meal">
                        <table class="table table-hover" style="margin:0px">
                            <tbody class="text-center">
                                <tr style="border: 1px solid black;"  >
                                    <td style="border: 1px solid black;width: 28%;">
                                    <select class="custom-select" v-model="item.mealName" v-if="!status">
                                        <option v-for="mealitem in mealList" :value="mealitem.MealName">@{{mealitem.MealName}}</option>
                                    </select>
                                    <input type="text" class="form-control" v-model="item.mealName" v-if="status"></td>
                                    <td style="border: 1px solid black;width: 28%;">
                                    <input type="text" class="form-control" v-model="item.mealQuantity" ></td>
                                    <td style="border: 1px solid black;width: 28%;" >
                                        <input type="text" class="text-center" v-for="mealitem in mealList" v-if="item.mealName == mealitem.MealName" 
                                        v-model="item.mealUnitPrice = mealitem.MealPrice" disabled>
                                    </td>
                                    <td style="border: 1px solid black;width: 15%;"data-toggle="collapse"
                                    :data-target="total[index]" class="btn-info h6" >展開或收合</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="collapse" :id="item.mealDetail[0].mealNum">
                            <div class="card card-body">
                                <!-- detail row 1 -->
                                <div  v-for="mealDetailItem in item.mealDetail">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="custom-select" v-model="mealDetailItem.type" >
                                                <option value="0" selected disabled hidden>請選擇種類</option>
                                                <option value="1">加點</option>
                                                <option value="2">份量</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <input type="checkbox" aria-label="Checkbox for following text input" v-model="mealDetailItem.check" >
                                            <label class="col-form-label text-center">是否為必選? </label>
                                        </div>
                                    </div>
                                    <!-- detail row 2 -->
                                    <div class="row" style="margin:20px 0px ;">
                                        <label class="col-form-label col-sm-2 text-right">細項內容: </label>
                                        <input type="text" placeholder="請輸入細項內容" class="form-control col-sm-4" v-model="mealDetailItem.detail">
                                        <label class="col-form-label col-sm-2 text-right">細項單價: </label>
                                        <input type="text" placeholder="請輸入細項單價" class="form-control col-sm-4" v-model="mealDetailItem.price">
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary form-control"
                                        v-on:click="addDetail(index)">新增細項</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center" style="margin:20px 0px ;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <button type="button" class="btn btn-primary form-control"
                            v-on:click="addMeal">新增餐點</button>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary form-control"
                    v-on:click="modalOK">修改</button>
                    <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>        
        var treeData = {"OrdersNum":"","OrdersDetails":{"restaurant":"","memberName":"",
        "meal":[{"mealQuantity":"","mealName":"","mealUnitPrice":"","mealDetail":[{"type":0,"mealNum":"meal0","detail": "","price":"","check":false}] }] },
        "OrdersCreate":"2019-10-04","OrdersUpdate":"2019-10-04","OrdersFinish":1,"MemberID":1,"MealID":34};
        
        var currentIndex = 0;
        
        var order = new Vue({
            el:"#App",
            data:{
                selected:"OrdersNum",
                search:"",
                list:[]
            },
            methods:{
                init: function () {
                    let _this = this;
                    axios.get('/api/order')
                        .then(function (response) {
                            _this.list  = response.data;
                            _this.list.forEach((element,index) => {
                                //  console.log(element.OrdersDetails);
                                _this.list[index].OrdersDetails = JSON.parse(_this.list[index].OrdersDetails);
                            });
                            console.log(_this.list);
                        })
                        .catch(function (response) {
                            console.log(response);
                    });
                    
                },
                remove: function (id) {
                    let _this = this;
                    Swal.fire({                 // delete form
                        title: '確定要刪除這筆優惠?',
                        text: "刪除之後就無法復原!!!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '確定',
                        cancelButtonText: '取消'
                        }).then((result) => {
                            if (result.value)
                                axios.delete('/api/order/' + id)
                                .then(function (response) {
                                    if (response.data['ok']) {
                                        _this.init();
                                    }
                                })
                                .catch(function (response) {
                                    console.log(response);
                                });
                    });
                },
                insertData:function(){
                    Modal.title = "新增訂單";
                    Modal.list = treeData;      // 初始化
                    $("#orderModal").modal();
                    currentIndex = -1;
                },
                edit: function(select){
                    Modal.title = "修改訂單";
                    order.list.forEach((element,index) => {
                        if(element.OrdersID == select)currentIndex = index;
                    });
                    Modal.list = this.list[currentIndex];

                    // Modal.CouponCode = coupon.list[currentIndex].CouponCode;
                    // Modal.CouponType = coupon.list[currentIndex].CouponType;
                    // Modal.CouponDiscount = coupon.list[currentIndex].CouponDiscount;
                    // Modal.CouponStart = coupon.list[currentIndex].CouponStart;
                    // Modal.CouponDeadline = coupon.list[currentIndex].CouponDeadline;
                    $("#orderModal").modal();
                }
            },
            mounted: function () {
                this.init();            //initial
            },
            computed: {
                items: function() {
                    var _search = this.search;
                    var _selected = this.selected;
                    if (_search) {
                        return this.list.filter(function(item) {
                            // console.log(item);
                            return Object.keys(item).some(function(key) {
                                // console.log(item);
                                if (_selected == key){              // 下拉式的分類
                                    // console.log("select "+_selected);
                                    // console.log(key);
                                    return String(item[key]).toLowerCase().indexOf(_search) > -1
                                }                                
                            }) || Object.keys(item.OrdersDetails).some(function(key) {  //專分orderdetail
                                if (_selected == key){              // 下拉式的分類
                                    return String(item.OrdersDetails[key]).toLowerCase().indexOf(_search) > -1
                                }                                
                            })
                        })
                    }
                    return this.list;
                }
            }
        });         //vue-coupon tail

        Date.prototype.format = function (format) {
            //eg:format="yyyy-MM-dd hh:mm:ss";

            if (!format) {
                format = "yyyy-MM-dd hh:mm:ss";
            }

            var o = {
                "M+": this.getMonth() + 1,  // month
                "d+": this.getDate(),       // day
                "H+": this.getHours(),      // hour
                "h+": this.getHours(),      // hour
                "m+": this.getMinutes(),    // minute
                "s+": this.getSeconds(),    // second
                "q+": Math.floor((this.getMonth() + 3) / 3), // quarter
                "S": this.getMilliseconds()
            };

            if (/(y+)/.test(format)) {
                format = format.replace(RegExp.$1, (this.getFullYear() + "")
                    .substr(4 - RegExp.$1.length));
            }

            for (var k in o) {
                if (new RegExp("(" + k + ")").test(format)) {
                    format = format.replace(RegExp.$1, RegExp.$1.length == 1
                        ? o[k]
                        : ("00" + o[k]).substr(("" + o[k]).length));
                }
            }

            return format;
        };

        var lastNum = 0;
        var Modal = new Vue({
            el:"#orderModal",
            data:{
                title:"",
                list: treeData,
                total: [],
                memberList:[],
                shopList:[],
                shopSelect:'',
                mealList:[],
                status:false

            },
            methods:{
                init:function(){
                    let _this = this;
                    axios.get('/api/member')
                        .then(function (response) {
                            _this.list.OrdersDetails.memberName = response.data[0].MemberName;
                            _this.memberList  = response.data;
                        })
                    axios.get('/api/shop')
                        .then(function (response) {
                            _this.list.OrdersDetails.restaurant = response.data[0].ShopName;
                            _this.shopSelect = response.data[0].ShopID;
                            _this.shopList  = response.data;
                        })
                    this.list.OrdersDetails.meal.forEach((element,index) => {
                        element.mealDetail.forEach((ele,inIndex) =>{
                            // console.log(ele);
                            _this.total[index] = "#" + ele.mealNum;  //boostrap
                        })
                    });
                },
                addDetail:function(detailIndex){
                    this.list.OrdersDetails.meal.forEach((element,index) => {
                        element.mealDetail.push({"type":0,"mealNum":"meal0","detail": "","price":"","check":false})
                    });
                },
                addMeal:function(){
                    console.log(this.list.OrdersDetails.meal[lastNum]);
                    var temp = 'meal'+ (++lastNum);
                    // console.log(this.list);
                    this.list.OrdersDetails.meal.push({"mealQuantity":"","mealName":"","mealUnitPrice":"","mealDetail":[{"type":0,"detail": "","mealNum":temp,"price":"","check":false}] })
                    this.init();
                },
                modalOK: function(){
                    if (currentIndex >= 0){
                        order.list[currentIndex].OrdersNum = Modal.CouponCode;
                        order.list[currentIndex].OrdersDetails   = Modal.CouponType;
                        order.list[currentIndex].OrdersCreate   = Modal.CouponDiscount;
                        order.list[currentIndex].CouponStart   = Modal.CouponStart;
                        order.list[currentIndex].OrdersFinish   = Modal.CouponDeadline;
                        // 未修改完畢
                        axios.put('/api/order/'+order.list[currentIndex].OrdersID, order.list[currentIndex])
                        .then(function (response) {
                            console.log(response.data['ok']);  // 成功回傳時就會顯示true
                            order.init();                //更新目前畫面
                        })
                    }else{
                        // 新增資料
                        this.memberList.forEach(element => {
                            if (element.MemberName == this.list.OrdersDetails.memberName){
                                this.list.MemberID = element.MemberID;
                            }
                        });
                        var dataToSever = {
                            OrdersNum: this.list.OrdersNum,
                            OrdersDetails: JSON.stringify(this.list.OrdersDetails),
                            OrdersCreate: new Date().format(),
                            OrdersUpdate: new Date().format(),
                            OrdersStatus: this.list.OrdersStatus,
                            MemberID: this.list.MemberID,
                            ShopID: this.list.ShopID
                        }
                        // console.log(dataToSever);
                        // 檢查資料 (有空再說)

                        ///////////

                        // 傳送資料
                        axios.post('/api/order', dataToSever)
                        .then(function (response) {
                            // console.log(response.data['ok']);  // 成功回傳時就會顯示true
                            order.init();                //更新目前畫面
                        })
                        
                    }
                    $("#orderModal").modal("hide");  //隱藏對話盒
                }
            },
            watch:{
                shopSelect:function(value){
                    // console.log(value);
                    this.shopList.forEach(element => {
                        if (element.ShopID == value){
                            this.list.OrdersDetails.restaurant = element.ShopName;
                            this.list.ShopID = element.ShopID;
                        }
                    });
                    let _this = this;
                    axios.get('/api/meal/'+value)
                        .then(function (response) {
                            if(Object.keys(response.data).length != 0){
                                _this.list.OrdersDetails.meal[lastNum].mealName = response.data[0].MealName;
                                _this.mealList  = response.data;
                            }else{
                                _this.list.OrdersDetails.meal[lastNum].mealName = "";
                                _this.mealList  = [];
                            }
                            
                    })
                }
            },
            beforeMount:function(){
                this.init();
            }
        });                 //vue-modal tail

    </script>
@endsection