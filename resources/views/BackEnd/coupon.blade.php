@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 col">
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control">
                <option value="1">代碼</option>
                <option value="2">種類</option>
                <option value="3">生效日期</option>
                <option value="4">結束日期</option>
            </select>
        </div>
    </div>
@endsection 

@section('content')
    <div id="divright">
        <div class="line2 row">
            <div class="col">優惠代碼</div>
            <div class="col">優惠種類</div>
            <div class="col">生效日期</div>
            <div class="col">結束日期</div>
            <div class="col"></div>
            <div id="neworder" class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="location.href='/coupon/create'">新增優惠</button>
            </div>
        </div>

        <hr>
        <div v-for="item in list">
            <div class="line2 row" >
                <div class="col">@{{item.CouponCode}}</div>
                <div class="col">@{{item.CouponType}}</div>
                <div class="col">@{{item.CouponStart}}</div>
                <div class="col">@{{item.CouponDeadline}}</div>
                <div class="col">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">修改優惠</button>
                </div>
                <div class="col">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" v-on:click="remove(item.CouponID)">刪除優惠</button>
                </div>
            </div>

            <hr>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var coupon = new Vue({
            el:"#divright",
            data:{
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
                    Swal.fire({
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
                this.init();
            }
        });
    </script>
@endsection