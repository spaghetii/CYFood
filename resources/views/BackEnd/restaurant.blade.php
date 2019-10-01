@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control col">
                <option value="1">餐廳名稱</option>
                <option value="2">電子郵件</option>
                <option value="3">餐廳電話</option>
                <option value="4">餐廳地址</option>
            </select>
        </div>
    </div>
@endsection 

@section('content')
    <div id="divright" class="col-10">
        <div>
            <div class="line2 row">
                <div class="col text-center">餐廳名稱</div>
                <div class="col text-center">電子郵件</div>
                <div class="col text-center">餐廳電話</div>
                <div class="col text-center">餐廳地址</div>
                <div class="col"></div>
                <div id="neworder" class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">新增餐廳</button>
                </div>
            </div>

            <hr>

            <div class="line3 row">
                <div class="col text-center">海之家</div>
                <div class="col text-center">CY@CYFood.com</div>
                <div class="col text-center">09XX-XXX-XXX</div>
                <div class="col text-center">某一樓</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除餐廳</button>
                </div>
            </div>

            <hr>

            <div class="line4 row">
                <div class="col text-center">兩芳</div>
                <div class="col text-center">CY@CYFood.com</div>
                <div class="col text-center">09XX-XXX-XXX</div>
                <div class="col text-center">某條路</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除餐廳</button>
                </div>
            </div>

            <hr>

            <div class="line5 row">
                <div class="col text-center">雞大叔</div>
                <div class="col text-center">CY@CYFood.com</div>
                <div class="col text-center">09XX-XXX-XXX</div>
                <div class="col text-center">某一區</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除餐廳</button>
                </div>
            </div>

            <hr>

            <div class="line6 row">
                <div class="col text-center">郭記</div>
                <div class="col text-center">CY@CYFood.com</div>
                <div class="col text-center">09XX-XXX-XXX</div>
                <div class="col text-center">某一市</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" class="btn btn-danger">刪除餐廳</button>
                </div>
            </div>
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
