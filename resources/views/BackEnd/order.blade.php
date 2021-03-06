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
                    {{-- <button id="singlebutton" name="singlebutton"
                    v-on:click="insertData" class="btn btn-primary tableTitle">✚</button> --}}
                </div>
            </div>

            <hr>
            <div v-for="item,index in items.slice(start,numForPage+start)" v-if="item.OrdersFinish != 0">
                <div class="line3 row">
                    <div class="col text-center ellipsis">@{{item.OrdersNum}}</div>
                    <div class="col text-center ellipsis">@{{item.OrdersDetails.restaurant}}</div>
                    <div class="col text-center ellipsis">@{{item.OrdersDetails.memberName}}</div>
                    <div class="col text-center ellipsis">@{{item.OrdersCreate}}</div>
                    <div class="col text-right">
                        <button id="singlebutton" name="singlebutton" 
                        v-on:click="edit(item.OrdersID)" class="btn btn-primary greenBtn">查詢或修改</button>
                    </div>
                    <div class="col text-center">
                        <button id="singlebutton" name="singlebutton" 
                        v-on:click="remove(item.OrdersID)" class="btn btn-danger RedBtn">刪除訂單</button>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="page" style="background-color:transparent;margin-top: 0px;margin-left:43%">
            <ul class="pagination">
                <li class="page-item" v-for="page in totalPage" v-on:click="currentPage = page" :class="{'active': (currentPage === page)}">
                <a class="page-link" href="#">@{{page}}</a></li>
            </ul>
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
                            <input type="text" class="form-control col-sm-8" v-model="list.OrdersNum" disabled>
                        </div>
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">訂單狀態: </label>
                            <select class="custom-select col-sm-8" v-model="list.OrdersStatus">
                                <option value="0">取消訂單</option>
                                <option value="1" selected>等待接單</option>
                                <option value="2">處理中</option>
                                <option value="3">餐點完成</option>
                                <option value="4">送餐中</option>
                                <option value="5">訂單完成</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">會員名稱: </label>
                            {{-- <select class="custom-select col-sm-8" v-model="list.OrdersDetails.memberName" disabled>
                                <option v-for="memberitem in memberList" :value="memberitem.MemberName">@{{memberitem.MemberName}}</option>
                            </select> --}}
                            <input type="text" class="form-control col-sm-8" v-model="list.OrdersDetails.memberName" disabled>
                        </div>
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">餐廳名稱: </label>
                            {{-- <select class="custom-select col-sm-8" v-model="shopSelect" disabled>
                                <option v-for="shopitem in shopList" :value="shopitem.ShopID">@{{shopitem.ShopName}}</option>
                            </select> --}}
                            <input type="text" class="form-control col-sm-8" v-model="list.OrdersDetails.restaurant" disabled>
                        </div>
                    </div>
                    <!-- 標題 -->
                    <table class="table table-hover" style="margin:0px">
                        <thead class="thead-dark text-center">
                            <tr style="border: 1px solid black;" >
                                <th scope="col" style="width: 28%;">餐點名稱</th>
                                <th scope="col" style="width: 28%;">下單數量</th>
                                <th scope="col" style="width: 28%;">餐點價格</th>
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
                                    {{-- <select class="custom-select" v-model="item.mealName" v-if="!status">
                                        <option v-for="mealitem in mealList" :value="mealitem.MealName">@{{mealitem.MealName}}</option>
                                    </select> --}}
                                    <input type="text" class="form-control" v-model="item.mealName" disabled></td>
                                    <td style="border: 1px solid black;width: 28%;">
                                    <input type="text" class="form-control" v-model="item.mealQuantity" disabled></td>
                                    <td style="border: 1px solid black;width: 28%;" >
                                        <input type="text" class="text-center" v-model="item.mealUnitPrice" disabled>
                                    </td>
                                    <td style="border: 1px solid black;width: 15%;"data-toggle="collapse"
                                    :data-target="recombind[index]" class="btn-info h6" >展開或收合</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="collapse" :id="item.mealDetail[0].mealNum">
                            <div class="card card-body">
                                <!-- detail row 1 -->
                                <div  v-for="mealDetailItem in item.mealDetail">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="custom-select" v-model="mealDetailItem.type" disabled >
                                                <option value="0" selected disabled hidden>請選擇種類</option>
                                                <option value="1">加點</option>
                                                <option value="2">份量</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <input type="checkbox" aria-label="Checkbox for following text input" v-model="mealDetailItem.check" disabled>
                                            <label class="col-form-label text-center">是否為必選? </label>
                                        </div>
                                    </div>
                                    <!-- detail row 2 -->
                                    <div class="row" style="margin:20px 0px ;">
                                        <label class="col-form-label col-sm-2 text-right">細項內容: </label>
                                        <input type="text" placeholder="請輸入細項內容" class="form-control col-sm-4" v-model="mealDetailItem.detail" disabled>
                                        <label class="col-form-label col-sm-2 text-right">細項單價: </label>
                                        <input type="text" placeholder="請輸入細項單價" class="form-control col-sm-4" v-model="mealDetailItem.price" disabled>
                                    </div>
                                </div>
                                {{-- <div class="row text-center">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary form-control"
                                        v-on:click="addDetail(index)">新增細項</button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row text-center" style="margin:20px ;">
                        <div class="row col-sm-12">
                            <div class="col-sm-2 text-left" style="padding-left: 0px;">訂單備註:</div>
                            <div class="col-sm-5"></div>
                            <div class="col-sm-3 text-right">訂單總價(含運費):</div>
                            <input type="text" placeholder="請輸入細項內容" class="col-sm-2 text-center" v-model="list.OrdersDetails.orderTotalAmount">
                        </div>
                        <div class="row col-sm-12">
                            <textarea cols="120" rows="5" v-model="list.OrdersRemark"></textarea>
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
                list:[],
                numForPage:6,
                currentPage:1
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
                        title: '確定要刪除這筆訂單?',
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
                    Modal.init();
                    $("#orderModal").modal();
                }
            },
            mounted: function () {
                this.init();            //initial
            },
            computed: {
                items: function() {
                    var _search = this.search.toLowerCase();
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
                },
                totalPage: function(){
                    return Math.ceil(this.items.length/this.numForPage);
                },
                start: function(){
                    return (this.currentPage-1)*this.numForPage;
                }
            }
        });         //vue-coupon tail

        var lastNum = 0;
        var Modal = new Vue({
            el:"#orderModal",
            data:{
                title:"",
                list: treeData,
                recombind: [],
            },
            methods:{
                init:function(){
                    let _this = this;
                    this.list.OrdersDetails.meal.forEach((element,index) => {
                        element.mealDetail.forEach((ele,inIndex) =>{
                            _this.recombind[index] = "#" + ele.mealNum;  //boostrap
                        })
                    });
                },
                modalOK: function(){
                    if (currentIndex >= 0){
                        _this = this;
                        console.log(_this.list);
                        dataToSever = {
                            OrdersDetails: _this.list.OrdersDetails,
                            OrdersStatus: _this.list.OrdersStatus,
                            OrdersRemark: _this.list.OrdersRemark,
                        }
                        console.log(dataToSever);
                        // 未修改完畢
                        axios.put('/api/order/'+_this.list.OrdersID, _this.list)
                        .then(function (response) {
                            console.log(response.data['ok']);  // 成功回傳時就會顯示true
                            order.init();                //更新目前畫面
                        })
                    }
                    $("#orderModal").modal("hide");  //隱藏對話盒
                }
            },
            beforeMount:function(){
                this.init();
            }
        });                 //vue-modal tail

    </script>
@endsection