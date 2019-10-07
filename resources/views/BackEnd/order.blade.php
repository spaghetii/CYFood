@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control col">
                <option value="MemberName">會員名稱</option>
                <option value="restaurantName">餐廳名稱</option>
                <option value="OrdersNum">訂單編號</option>
                <option value="4">下單日期</option>
            </select>
        </div>
    </div>
@endsection 

@section('content')
    <div id="divright" class="col-10">
        <div>
            <div class="line2 row">
                <div class="col text-center">訂單編號</div>
                <div class="col text-center">餐廳名稱</div>
                <div class="col text-center">會員名稱</div>
                <div class="col text-center">下單日期</div>
                <div class="col"></div>
                <div id="neworder" class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">新增訂單</button>
                </div>
            </div>

            <hr>

            <div class="line3 row">
                <div class="col text-center">9846</div>
                <div class="col text-center">海之家</div>
                <div class="col text-center">A君</div>
                <div class="col text-center">YY/MM/DD</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除訂單</button>
                </div>
            </div>

            <hr>

            <div class="line4 row">
                <div class="col text-center">1235</div>
                <div class="col text-center">兩芳</div>
                <div class="col text-center">B君</div>
                <div class="col text-center">YY/MM/DD</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除訂單</button>
                </div>
            </div>

            <hr>

            <div class="line5 row">
                <div class="col text-center">1454</div>
                <div class="col text-center">雞大叔</div>
                <div class="col text-center">O君</div>
                <div class="col text-center">YY/MM/DD</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除訂單</button>
                </div>
            </div>

            <hr>

            <div class="line6 row">
                <div class="col text-center">6394</div>
                <div class="col text-center">郭記</div>
                <div class="col text-center">AB君</div>
                <div class="col text-center">YY/MM/DD</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除訂單</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>        
        var order = new Vue({
            el:"#App",
            data:{
                selected:"CouponCode",
                search:"",
                list:[]
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
                    var _search = this.search;
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