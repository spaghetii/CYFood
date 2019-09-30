@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 col">
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control">
                <option value="1">連絡電話</option>
                <option value="2">會員名稱</option>
                <option value="3">電子郵件</option>
            </select>
        </div>
    </div>
@endsection 

@section('content')
    <div id="divright">
        <div class="line2 row">
            <div class="col">會員名稱</div>
            <div class="col">電子郵件</div>
            <div class="col">連絡電話</div>
            <div class="col"></div>
            <div id="neworder" class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">新增會員</button>
            </div>
        </div>

        <hr>

        <div class="line3 row">
            <div class="col">A君</div>
            <div class="col">CY@CYFood.com</div>
            <div class="col">09XX-XXX-XXX</div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">修改資訊</button>
            </div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">刪除會員</button>
            </div>
        </div>

        <hr>

        <div class="line4 row">
            <div class="col">B君</div>
            <div class="col">CY@CYFood.com</div>
            <div class="col">09XX-XXX-XXX</div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">修改資訊</button>
            </div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">刪除會員</button>
            </div>
        </div>

        <hr>

        <div class="line5 row">
            <div class="col">O君</div>
            <div class="col">CY@CYFood.com</div>
            <div class="col">09XX-XXX-XXX</div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">修改資訊</button>
            </div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">刪除會員</button>
            </div>
        </div>

        <hr>

        <div class="line6 row">
            <div class="col">AB君</div>
            <div class="col">CY@CYFood.com</div>
            <div class="col">09XX-XXX-XXX</div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">修改資訊</button>
            </div>
            <div class="col">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">刪除會員</button>
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
