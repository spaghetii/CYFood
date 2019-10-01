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
        <div v-for="item in items">
            <div class="line3 row">
                <div class="col text-center">@{{item.ShopName}}</div>
                <div class="col text-center">@{{item.ShopEmail}}</div>
                <div class="col text-center">@{{item.ShopPhone}}</div>
                <div class="col text-center dot" >@{{item.ShopAddress}}</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">查詢或修改</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" 
                    v-on:click="remove(item.ShopID)"   class="btn btn-danger">刪除餐廳</button>
                </div>
            </div>

            <hr>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    var shop = new Vue({
        el: "#App",
        data: {
            selected: "ShopName",
            search: "",
            list: []
        },
        methods: {
            init: function () {
                let _this = this;
                axios.get('/api/shop')
                    .then(function (response) {
                        _this.list = response.data;
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
            }
        }
    });

</script>
@endsection
