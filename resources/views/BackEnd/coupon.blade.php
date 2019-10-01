@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="select ">
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
            <div class="line2 row">
                <div class="col text-center">優惠代碼</div>
                <div class="col text-center">優惠種類</div>
                <div class="col text-center">生效日期</div>
                <div class="col text-center">結束日期</div>
                <div class="col"></div>
                <div id="neworder" class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" 
                    onclick="location.href='/coupon/create'">新增優惠</button>
                </div>
            </div>

            <hr>
            <div v-for="item in items">
                <div class="line2 row " >
                    <div class="col text-center">@{{item.CouponCode}}</div>
                    <div class="col text-center">@{{item.CouponType}}</div>
                    <div class="col text-center">@{{item.CouponStart}}</div>
                    <div class="col text-center">@{{item.CouponDeadline}}</div>
                    <div class="col text-right">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary "
                        >修改優惠</button>
                    </div>
                    <div class="col text-center">
                        <button id="singlebutton" name="singlebutton" class="btn btn-danger"
                        v-on:click="remove(item.CouponID)">刪除優惠</button>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var coupon = new Vue({
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
                    })
                    .catch(function (response) {
                        console.log(response);
                });
                },
                remove: function (id) {
                    let _this = this;
                    Swal.fire({                 // delete form
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
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
        });         //vue tail
    </script>
@endsection