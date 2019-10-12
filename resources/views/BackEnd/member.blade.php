@extends('layouts.backEndLayout')

@section('selectOption')
    <div class="line1 row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="select">
            <select id="selectbasic" name="selectbasic" class="form-control col" v-model="selected">
                <option value="MemberName">會員名稱</option>
                <option value="MemberEmail">電子郵件</option>
                <option value="MemberPhone">連絡電話</option>
            </select>
        </div>
    </div>
@endsection

@section('content')
    <div id="divright" class="col-10">
        <div>
            <div class="line2 row">
                <div class="col text-center tableTitle">會員名稱</div>
                <div class="col text-center tableTitle">電子郵件</div>
                <div class="col text-center tableTitle">連絡電話</div>
                <div class="col"></div>
                <div id="neworder" class="col text-center">
                    {{-- <button id="singlebutton" name="singlebutton" class="btn btn-primary tableTitle"
                    v-on:click="insertData">✚</button> --}}
                </div>
            </div>

            <hr>
            <div v-for="item,index in items.slice(start,numForPage+start)" v-if="!item.MemberPermission">
                <div class="line3 row">
                    <div class="col text-center ">@{{item.MemberName}}</div>
                    <div class="col text-center">@{{item.MemberEmail}}</div>
                    <div class="col text-center">@{{item.MemberPhone}}</div>
                    <div class="col change text-right">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary"
                        v-on:click="edit(item.MemberID)">修改資訊</button>
                    </div>
                    <div class="col change text-center">
                        <button id="singlebutton" name="singlebutton" 
                        v-on:click="remove(item.MemberID)" class="btn btn-danger">刪除會員</button>
                    </div>
                </div>

                <hr>
            </div>
        </div>
        <div class="page" style="background-color:transparent;margin-top: 0px;margin-left:30%">
            <ul class="pagination">
                <li class="page-item" v-on:click="changePage(currentPage-1)" :class="{'disabled':(currentPage === 1)}" ><a class="page-link" href="#">Previous</a></li>
                <li class="page-item" v-for="page in totalPage" v-on:click="currentPage = page" :class="{'active': (currentPage === page)}">
                <a class="page-link" href="#">@{{page}}</a></li>
                <li class="page-item" v-on:click="changePage(currentPage+1)" :class="{'disabled':(currentPage === totalPage)}"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
@endsection

@section('dialog')
    <div id="memberModal" class="modal fade " role="dialog">
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
                            <label class="col-form-label col-sm-4 text-center">會員名稱: </label>
                            <input type="text" class="form-control col-sm-6" v-model="MemberName" >
                        </div>
                        <div class="form-group row ">
                            <label class="col-form-label col-sm-4 text-center ">電子郵件: </label>
                            <input type="text" class="form-control col-sm-6" v-model="MemberEmail">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 text-center">會員電話: </label>
                            <input type="text" class="form-control col-sm-6" v-model="MemberPhone" >
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4 text-center">會員密碼: </label>
                            <input type="password" disabled title="管理員無權更改會員密碼" class="form-control col-sm-6" v-model="MemberPassword">
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
        var member = new Vue({
            el: "#App",
            data: {
                selected: "MemberPhone",
                search: "",
                list: [],
                numForPage:5,
                currentPage:1
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
                        title: '確定要將該會員停權?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '確定',
                        cancelButtonText: '取消'
                    }).then((result) => {
                        if (result.value){
                            member.list.forEach((element,index) => {
                                if(element.CouponID == id)currentIndex = index;
                            });
                            member.list[currentIndex].MemberPermission = true;
                            axios.put('/api/coupon/'+id, member.list[currentIndex])
                            .then(function (response) {
                                console.log(response.data['ok']);  // 成功回傳時就會顯示true
                                coupon.init();                //更新目前畫面
                            })
                            .catch(function (response) {
                                console.log(response);
                            });
                        }
                            
                    });
                },
                insertData:function(){
                    Modal.title = "新增會員";
                    Modal.MemberName = "";
                    Modal.MemberEmail = "";
                    Modal.MemberPhone = "";
                    Modal.MemberPassword = "";
                    $("#memberModal").modal();
                    currentIndex = -1;
                },
                edit: function(select){
                    Modal.title = "修改資料";
                    member.list.forEach((element,index) => {
                        if(element.MemberID == select)currentIndex = index;
                    });
                    Modal.MemberName = member.list[currentIndex].MemberName;
                    Modal.MemberEmail = member.list[currentIndex].MemberEmail;
                    Modal.MemberPhone = member.list[currentIndex].MemberPhone;
                    Modal.MemberPassword = member.list[currentIndex].MemberPassword;
                    $("#memberModal").modal();
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
                el:"#memberModal",
                data:{
                    title:"",
                    MemberName: "",
                    MemberEmail: "",
                    MemberPhone: "",
                    MemberPassword: "",
                },
                methods:{
                    modalOK: function(){
                        // showToast("Select item",currentIndex);
                        if (currentIndex >= 0){
                            member.list[currentIndex].MemberName     = Modal.MemberName;
                            member.list[currentIndex].MemberEmail    = Modal.MemberEmail;
                            member.list[currentIndex].MemberPhone    = Modal.MemberPhone;
                            // member.list[currentIndex].MemberPassword = Modal.MemberPassword;
                            // 未修改完畢
                            axios.put('/api/member/'+member.list[currentIndex].MemberID, member.list[currentIndex])
                            .then(function (response) {
                                console.log(response.data['ok']);  // 成功回傳時就會顯示true
                                member.init();                //更新目前畫面
                            })
                        }else{
                            // 新增資料

                            var dataToSever = {
                                MemberName: this.MemberName,
                                MemberEmail: this.MemberEmail,
                                MemberPhone: this.MemberPhone,
                                MemberPassword: this.MemberPassword,
                            }
                            console.log(dataToSever);
                            // 檢查資料 (有空再說)

                            ///////////

                            // 傳送資料
                            axios.post('/api/member', dataToSever)
                            .then(function (response) {
                                console.log(response.data['ok']);  // 成功回傳時就會顯示true
                                member.init();                //更新目前畫面
                            })
                            
                        }
                        $("#memberModal").modal("hide");  //隱藏對話盒
                    }
                }
            });                 //vue-modal tail

    </script>
@endsection
