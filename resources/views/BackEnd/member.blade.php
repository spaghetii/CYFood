@extends('layouts.backEndLayout')

@section('selectOption')
<div class="line1 row">
    <div class="col"></div>
    <div class="col"></div>
    <div class="select">
        <select id="selectbasic" name="selectbasic" class="form-control col" v-model="selected">
            <option value="MemberPhone">連絡電話</option>
            <option value="MemberName">會員名稱</option>
            <option value="MemberEmail">電子郵件</option>
        </select>
    </div>
</div>
@endsection

@section('content')
<div id="divright" class="col-10">
    <div>
        <div class="line2 row">
            <div class="col text-center">會員名稱</div>
            <div class="col text-center">電子郵件</div>
            <div class="col text-center">連絡電話</div>
            <div class="col"></div>
            <div id="neworder" class="col text-right">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary"
                    onclick="location.href='/member/create'">新增會員</button>
            </div>
        </div>

        <hr>
        <div v-for="item in items">
            <div class="line3 row">
                <div class="col text-center">@{{item.MemberName}}</div>
                <div class="col text-center">@{{item.MemberEmail}}</div>
                <div class="col text-center">@{{item.MemberPhone}}</div>
                <div class="col text-right">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">修改資訊</button>
                </div>
                <div class="col text-center">
                    <button id="singlebutton" name="singlebutton" 
                    v-on:click="remove(item.MemberID)" class="btn btn-danger">刪除會員</button>
                </div>
            </div>

            <hr>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var member = new Vue({
        el: "#App",
        data: {
            selected: "MemberPhone",
            search: "",
            list: []
        },
        methods: {
            init: function () {
                let _this = this;
                axios.get('/api/member')
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
                        axios.delete('/api/member/' + id)
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
                        console.log(item);
                        console.log(Object.keys(item));
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
