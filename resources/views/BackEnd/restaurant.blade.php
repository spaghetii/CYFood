@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control col" v-model="selected">
                <option value="ShopName">餐廳名稱</option>
                <option value="ShopEmail">電子郵件</option>
                <option value="ShopPhone">餐廳電話</option>
                <option value="ShopAddress">餐廳地址</option>
            </select>
        </div>
    </div>
@endsection

@section('content')
    <div id="divright" class="col-10">
        <div>
            <div class="line2 row">
                <div class="col text-center tableTitle">餐廳名稱</div>
                <div class="col text-center tableTitle">電子郵件</div>
                <div class="col text-center tableTitle">餐廳電話</div>
                <div class="col text-center tableTitle">餐廳地址</div>
                <div class="col"></div>
                <div id="neworder" class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary tableTitle">✚</button>
                </div>
            </div>

            <hr>
            <div v-for="item in items.slice(start,numForPage+start)">
                <div class="line3 row">
                    <div class="col text-center ellipsis">@{{item.ShopName}}</div>
                    <div class="col text-center">@{{item.ShopEmail}}</div>
                    <div class="col text-center">@{{item.ShopPhone}}</div>
                    <div class="col text-center ellipsis" >@{{item.ShopAddress}}</div>
                    <div class="col text-right">
                        <button id="singlebutton" name="singlebutton" 
                        v-on:click="edit(item.ShopID)" class="btn btn-primary">查詢或修改</button>
                    </div>
                    <div class="col text-center">
                        <button id="singlebutton" name="singlebutton" 
                        v-on:click="remove(item.ShopID)"   class="btn btn-danger">刪除餐廳</button>
                    </div>
                </div>

                <hr> 
            </div>
            
        </div>
        <div class="page" style="background-color:transparent;margin-top: 0px;margin-left:37%">
            <ul class="pagination">
                <li class="page-item" v-for="page in totalPage" v-on:click="currentPage = page" :class="{'active': (currentPage === page)}">
                <a class="page-link" href="#">@{{page}}</a></li>
            </ul>
        </div>
    </div>
    
@endsection

@section('dialog')
    <div id="restaurantModal" class="modal fade disableSelect" role="dialog">
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
                            <label class="col-form-label col-sm-4 text-center">餐廳名稱:</label>
                            <input type="text" class="form-control col-sm-8" v-model="shopList.ShopName">
                        </div>
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">餐廳種類: </label>
                            <select class="custom-select col-sm-8" v-model="shopList.ShopType">
                                <option value="0">中式美食</option>
                                <option value="1">台灣美食</option>
                                <option value="2">日式美食</option>
                                <option value="3">美式美食</option>
                                <option value="4">飲品</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">餐廳信箱: </label>
                            <input type="text" class="form-control col-sm-8" v-model="shopList.ShopEmail">
                        </div>
                        <div class="form-group row col-sm-6">
                            <label class="col-form-label col-sm-4 text-center">餐廳電話: </label>
                            <input type="text" class="form-control col-sm-8" v-model="shopList.ShopPhone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group row col-sm-12">
                            <label class="col-form-label col-sm-2 text-center">餐廳地址: </label>
                            <input type="text" class="form-control col-sm-9" v-model="shopList.ShopAddress">
                        </div>
                    </div>
                    <!-- 標題 -->
                    <table class="table table-hover" style="margin:0px">
                        <thead class="thead-dark text-center">
                            <tr style="border: 1px solid black;" >
                                <th scope="col" style="width: 28%;">餐點名稱</th>
                                <th scope="col" style="width: 28%;">每日數量</th>
                                <th scope="col" style="width: 28%;">餐點單價</th>
                                <th style="width: 15%;"></th>
                            </tr>
                        </thead>
                    </table>
                    <!-- 第一列 -->
                    <div v-for="item,index in list">
                        <table class="table table-hover" style="margin:0px">
                            <tbody class="text-center">
                                <tr style="border: 1px solid black;"  >
                                    <td style="border: 1px solid black;width: 28%;">
                                    <input type="text" class="form-control" v-model="item.MealName"></td>
                                    <td style="border: 1px solid black;width: 28%;">
                                    <input type="text" class="form-control" v-model="item.MealQuantity"></td>
                                    <td style="border: 1px solid black;width: 28%;" >
                                        <input type="text" class="text-center" v-model="item.MealPrice">
                                    </td>
                                    <td style="border: 1px solid black;width: 15%;"data-toggle="collapse"
                                    :data-target="recombind[index]" class="btn-info h6" >展開或收合</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="collapse" :id="item.MealDetails.mealNum">
                            <div class="card card-body">
                                <!-- detail row 1 -->
                                <div  v-for="mealDetailItem,mealDetailIndex in item.MealDetails.detail">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="custom-select" v-model="mealDetailItem.type" >
                                                <option value="0" selected disabled hidden>請選擇種類</option>
                                                <option value="1">加點</option>
                                                <option value="2">份量</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <input type="checkbox" aria-label="Checkbox for following text input" v-model="mealDetailItem.check" >
                                            <label class="col-form-label text-center">是否為必選? </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-danger form-control"
                                            v-on:click="removeDetail(index,mealDetailIndex)">刪除細項</button>
                                        </div>
                                    </div>
                                    <!-- detail row 2 -->
                                    <div class="row" style="margin:20px 0px ;">
                                        <label class="col-form-label col-sm-2 text-right">細項內容: </label>
                                        <input type="text" placeholder="請輸入細項內容" class="form-control col-sm-4" v-model="mealDetailItem.detailName">
                                        <label class="col-form-label col-sm-2 text-right">細項單價: </label>
                                        <input type="text" placeholder="請輸入細項單價" class="form-control col-sm-4" v-model="mealDetailItem.price">
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary form-control"
                                        v-on:click="addDetail(index)">新增細項</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary form-control"
                                        v-on:click="removeMeal(index)">刪除餐點</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center" style="margin:20px ;">
                            <div class="row col-sm-2">餐點描述:</div>
                            <div class="row col-sm-12">
                                <textarea cols="120" rows="5" v-model="list[index].MealDesc"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin:20px">
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
        // treeData is Meal data example in database 
        var treeData = [{"MealName":"名字","MealDesc":"描述","MealPrice":1000,"MealType":"種類",
        "MealDetails":{"mealNum":"meal0","detail":[{"type":0,"detailName": "","price":"","check":false}]},
        "MealQuantity":10}];
        // shopType array
        var type = ["中式美食","台灣美食","日式美食","美式美食","飲品"];
        var currentIndex = 0;
        var lastNum = 0;
        
        var shop = new Vue({
            el: "#App",
            data: {
                title:'',
                selected: "ShopName",
                search: "",
                list: [],
                numForPage:5,
                currentPage:1
            },
            methods: {
                init: function () {
                    let _this = this;
                    axios.get('/api/shop')
                        .then(function (response) {
                            _this.list = response.data;
                            // let ShopType transform number
                            _this.list.forEach((element,index) => {
                                _this.list[index].ShopType = type.indexOf(element.ShopType);
                                // console.log(_this.list[index].ShopType);
                            });
                            
                        })
                        .catch(function (response) {
                            console.log(response);
                        });
                },
                remove: function (id) {
                    let _this = this;
                    Swal.fire({
                        title: '確定要刪除這家餐廳?',
                        text: "刪除之後就無法復原!!!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value)
                            axios.delete('/api/coupon/' + id)
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
                edit: function(select){
                    Modal.title = "修改資訊";
                    this.list.forEach((element,index) => {
                        if(element.ShopID == select)currentIndex = index;
                    });
                    Modal.shopList = this.list[currentIndex];
                    Modal.init();
                    // Modal.CouponCode = coupon.list[currentIndex].CouponCode;
                    // Modal.CouponType = coupon.list[currentIndex].CouponType;
                    // Modal.CouponDiscount = coupon.list[currentIndex].CouponDiscount;
                    // Modal.CouponStart = coupon.list[currentIndex].CouponStart;
                    // Modal.CouponDeadline = coupon.list[currentIndex].CouponDeadline;
                    $("#restaurantModal").modal();
                }
            },
            mounted: function () {
                this.init();
            },
            computed: {
                items: function () {
                    var _search = this.search;
                    var _selected = this.selected;
                    if (_search) {
                        return this.list.filter(function (item) {
                            // console.log(item);
                            // console.log(Object.keys(item));
                            return Object.keys(item).some(function (key) {
                                // console.log(key);
                                if (_selected == key) { // 下拉式的分類
                                    // console.log("select "+_selected);
                                    // console.log(key);
                                    return String(item[key]).toLowerCase().indexOf(_search) > -1
                                }

                                // console.log(String(item[key]).toLowerCase().indexOf(_search) > -1);

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
        });

        var Modal = new Vue({
            el:"#restaurantModal",
            data:{
                title:"",
                list: treeData,
                shopList:[],
                recombind: [],
            },
            methods:{
                init:async function(){
                    _this = this;
                    // console.log(_this.shopList.ShopID)

                    await axios.get('/api/meal/'+_this.shopList.ShopID)
                        .then(function (response) {
                            // console.log(response.data[0])
                            _this.list = response.data;
                            _this.list.forEach((element,index) => {
                                // console.log(temp);
                                // console.log(_this.list[index].MealDetails);
                                if (_this.list[index].MealDetails === null)
                                    _this.list[index].MealDetails = {"mealNum":"meal"+index,"detail":[{"type":0,"detailName": "","price":"","check":false}]};
                                else
                                    _this.list[index].MealDetails = JSON.parse(_this.list[index].MealDetails);
                            });
                            console.log(_this.list);
                            _this.combind();
                            // _this.list.OrdersDetails.restaurant = response.data[0].ShopName;
                            // _this.shopSelect = response.data[0].ShopID;
                            // _this.shopList  = response.data;

                        })
                    this.combind();

                },
                combind:function(){
                    _this = this;
                    this.list.forEach((element,index) => {
                        // console.log(element.MealDetails.mealNum);
                        // if(element.MealDetails.mealNum)
                        // console.log(element.MealDetails.mealNum);
                        _this.recombind[index] = "#" + element.MealDetails.mealNum;  //boostrap
                        lastNum = index;
                    });
                },
                addDetail:function(mealIndex){
                    this.list[mealIndex].MealDetails.detail.push(
                        {"type":0,"detailName": "","price":"","check":false}
                    );                  
                },
                removeDetail:function(mealIndex,detailIndex){
                    this.list[mealIndex].MealDetails.detail.splice(detailIndex,1);
                },
                addMeal:function(){
                    // console.log(this.list.OrdersDetails.meal[lastNum]);
                    var temp = 'meal'+ (++lastNum);
                    // console.log(this.list);
                    this.list.push({"MealName":"名字","MealDesc":"描述","MealPrice":1000,"MealType":"種類",
                        "MealDetails":{"mealNum":temp,"detail":[{"type":0,"detailName": "","price":"","check":false}]},
                        "MealQuantity":10}
                    );
                    this.init();
                },
                removeMeal:function(index){
                    this.list.splice(index,1);
                    this.recombind.splice(index,1);
                },
                modalOK:function(){

                    if (currentIndex >= 0){
                        _this = this;
                        this.shopList.ShopType = type[this.shopList.ShopType];
                        this.list.forEach((element,index) => {
                            // console.log(element.MealDetails)
                            _this.list[index].MealDetails = JSON.stringify(element.MealDetails);
                        });
                        // console.log(_this.list)
                        // console.log(_this.shopList.ShopID);
                        // 未修改完畢

                        axios.put('/api/shop/'+_this.shopList.ShopID, _this.shopList)
                        .then(function (response) {
                            console.log(response.data['ok']);  // 成功回傳時就會顯示true
                            shop.init();                //更新目前畫面
                        })

                        let dataToServer = {
                            meals:_this.list
                        }

                        axios.put('/api/meal/'+_this.shopList.ShopID, dataToServer)
                        .then(function (response) {
                            console.log(response.data['ok']);  // 成功回傳時就會顯示true
                            shop.init();                //更新目前畫面
                        })

                    //    this.list.forEach((element,index) => {
                    //         axios.put('/api/meal/'+element.MealID, element)
                    //         .then(function (response) {
                    //             console.log(response.data['ok']);  // 成功回傳時就會顯示true
                    //             shop.init();                //更新目前畫面
                    //         })
                    //     });
                        
                    }else{
                        // 新增資料
                        // this.memberList.forEach(element => {
                        //     if (element.MemberName == this.list.OrdersDetails.memberName){
                        //         this.list.MemberID = element.MemberID;
                        //     }
                        // });
                        // var dataToSever = {
                        //     OrdersNum: this.list.OrdersNum,
                        //     OrdersDetails: JSON.stringify(this.list.OrdersDetails),
                        //     OrdersCreate: new Date().format(),
                        //     OrdersUpdate: new Date().format(),
                        //     OrdersStatus: this.list.OrdersStatus,
                        //     MemberID: this.list.MemberID,
                        //     ShopID: this.list.ShopID
                        // }
                        // // console.log(dataToSever);
                        // // 檢查資料 (有空再說)

                        // ///////////

                        // // 傳送資料
                        // axios.post('/api/order', dataToSever)
                        // .then(function (response) {
                        //     // console.log(response.data['ok']);  // 成功回傳時就會顯示true
                        //     order.init();                //更新目前畫面
                        // })
                        
                    }
                    $("#restaurantModal").modal("hide");  //隱藏對話盒

                }
            },
            beforeMount:function(){
                this.combind();
            }
        });                 //vue-modal tail
    </script>
@endsection
