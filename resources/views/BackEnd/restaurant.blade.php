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
        <div class="page" style="background-color:transparent;margin-top: 0px;margin-left:30%">
            <ul class="pagination">
                <li class="page-item" v-on:click.prevent="changePage(currentPage-1)" :class="{'disabled':(currentPage === 1)}" ><a class="page-link" href="#">Previous</a></li>
                <li class="page-item" v-for="page in totalPage" v-on:click="currentPage = page" :class="{'active': (currentPage === page)}">
                <a class="page-link" href="#">@{{page}}</a></li>
                <li class="page-item" v-on:click.prevent="changePage(currentPage+1)" :class="{'disabled':(currentPage === totalPage)}"><a class="page-link" href="#">Next</a></li>
            </ul>
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
                changePage:function(page){
                    if(page === 0 || page > this.totalPage){
                        return;
                    }
                    this.currentPage = page;

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

    </script>
@endsection
