@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control col" v-model="selected">
                <option value="CouponCode" >代碼</option>
                <option value="CouponType" >種類</option>
                <option value="CouponStart" >生效日期</option>
                <option value="CouponDeadline" >結束日期</option>
            </select>
        </div>
    </div>
@endsection 

@section('content')
    
    <div id="divright" class="col-10">
        <div>
            <div class="line2 row" id="tableTitle">
                <div class="col text-center tableTitle">優惠代碼</div>
                <div class="col text-center tableTitle">優惠種類</div>
                <div class="col text-center tableTitle">生效日期</div>
                <div class="col text-center tableTitle">結束日期</div>
                <div class="col"></div>
                <div id="neworder" class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary tableTitle greenBtn" 
                    v-on:click="insertData">✚</button>
                </div>
            </div>

            <hr>
            <div v-for="item in items.slice(start,numForPage+start)">
                <div class="line2 row " >
                    <div class="col text-center">@{{item.CouponCode}}</div>
                    <div class="col text-center">@{{item.CouponType}}</div>
                    <div class="col text-center">@{{item.CouponStart}}</div>
                    <div class="col text-center">@{{item.CouponDeadline}}</div>
                    <div class="col text-right">
                        <button name="singlebutton" class="btn btn-primary greenBtn"
                        v-on:click="edit(item.CouponID)">修改優惠</button>
                    </div>
                    <div class="col text-center">
                        <button name="singlebutton" class="btn btn-danger RedBtn"
                        v-on:click="remove(item.CouponID)">刪除優惠</button>
                    </div>
                </div>

                <hr>
            </div>
        </div>
        <div class="page" style="background-color:transparent;margin-top: 0px;margin-left:42%">
            <ul class="pagination">
                <li class="page-item" v-for="page in totalPage" v-on:click="currentPage = page" :class="{'active': (currentPage === page)}">
                <a class="page-link" href="#">@{{page}}</a></li>
            </ul>
        </div>
    </div>
   
@endsection

{{-- 對話框 --}}
@section('dialog')
    <div id="couponModal" class="modal fade " role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="col-11 modal-title text-center" id="exampleModalLabel">@{{title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 text-center">優惠代碼: </label>
                            <input type="text" class="form-control col-sm-6" 
                             v-model="CouponCode">
                        </div>
                        <div class="invalid-tooltip">
                            請輸入代碼
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 text-center">優惠種類: </label>
                            <select class="custom-select custom-select-lg col-sm-6" v-model="CouponType" >
                                <option selected value="freeship">免運送費</option>
                                <option value="discount">餐點折扣</option>
                              </select>
                        </div>
                        <div class="invalid-tooltip">
                            請選擇種類
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 text-center">優惠折扣: </label>
                            <input type="text" class="form-control col-sm-6" 
                             v-model="CouponDiscount">
                        </div>
                        <div class="invalid-tooltip">
                            請輸入折扣
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 text-center">生效日期: </label>
                            <input type="date" class="form-control col-sm-6" 
                            value="2019-10-02" v-model="CouponStart">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 text-center">結束日期: </label>
                            <input type="date" class="form-control col-sm-6" 
                            value="2019-10-02" v-model="CouponDeadline">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary form-control" v-on:click="modalOK">確定</button>
                        <button type="button" class="btn btn-secondary form-control" data-dismiss="modal">取消</button>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var currentIndex = -1;
        
        var coupon = new Vue({
            el:"#App",
            data:{
                selected:"CouponCode",
                search:"",
                list:[],
                numForPage:5,
                currentPage:1
            },
            methods:{
                init: function () {
                    let _this = this;
                    axios.get('/api/coupon')
                        .then(function (response) {
                            _this.list  = response.data;
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
                insertData:function(){
                    Modal.title = "新增優惠";
                    Modal.CouponCode = "";
                    Modal.CouponType = "freeship";
                    Modal.CouponDiscount = "";
                    Modal.CouponStart = "2019-10-02";
                    Modal.CouponDeadline = "2019-10-02";
                    $("#couponModal").modal();
                    currentIndex = -1;
                },
                edit: function(select){
                    Modal.title = "修改優惠";
                    coupon.list.forEach((element,index) => {
                        if(element.CouponID == select)currentIndex = index;
                    });
                    Modal.CouponCode = coupon.list[currentIndex].CouponCode;
                    Modal.CouponType = coupon.list[currentIndex].CouponType;
                    Modal.CouponDiscount = coupon.list[currentIndex].CouponDiscount;
                    Modal.CouponStart = coupon.list[currentIndex].CouponStart;
                    Modal.CouponDeadline = coupon.list[currentIndex].CouponDeadline;
                    $("#couponModal").modal();
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
                            // console.log(Object.keys(item));
                            return Object.keys(item).some(function(key) {
                                // console.log(key);
                                if (_selected == key){              // 下拉式的分類
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
        });         //vue-coupon tail

        var Modal = new Vue({
            el:"#couponModal",
            data:{
                title:"",
                CouponCode: "",
                CouponType: "discount",
                CouponDiscount: "",
                CouponStart: "",
                CouponDeadline: "",
            },
            methods:{
                modalOK: function(){
                    // showToast("Select item",currentIndex);
                    if (currentIndex >= 0){
                        coupon.list[currentIndex].CouponCode = Modal.CouponCode;
                        coupon.list[currentIndex].CouponType   = Modal.CouponType;
                        coupon.list[currentIndex].CouponDiscount   = Modal.CouponDiscount;
                        coupon.list[currentIndex].CouponStart   = Modal.CouponStart;
                        coupon.list[currentIndex].CouponDeadline   = Modal.CouponDeadline;
                        // 未修改完畢
                        axios.put('/api/coupon/'+coupon.list[currentIndex].CouponID, coupon.list[currentIndex])
                        .then(function (response) {
                            console.log(response.data['ok']);  // 成功回傳時就會顯示true
                            coupon.init();                //更新目前畫面
                        })
                    }else{
                        // 新增資料

                        var dataToSever = {
                            CouponCode: this.CouponCode,
                            CouponType: this.CouponType,
                            CouponDiscount: this.CouponDiscount,
                            CouponStart: this.CouponStart,
                            CouponDeadline: this.CouponDeadline
                        }

                        // 檢查資料 (有空再說)

                        ///////////

                        // 傳送資料
                        axios.post('/api/coupon', dataToSever)
                        .then(function (response) {
                            // console.log(response.data['ok']);  // 成功回傳時就會顯示true
                            coupon.init();                //更新目前畫面
                        })
                        
                    }
                    $("#couponModal").modal("hide");  //隱藏對話盒
                }
            }
        });                 //vue-modal tail

    </script>
@endsection