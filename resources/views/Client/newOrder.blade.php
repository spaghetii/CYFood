@extends('layouts.clientLayout')

@section('content')
<!-- buttom -->
<link rel="stylesheet" href="/css/clientNewOrder.css">
<div class="row no-gutters" id="buttomDiv">
    <div class="col-4">
        <div id="leftButtom">
            <button type="button" class="btn btn-light btn-block" id="orderBtn" v-for="item,index in list" v-on:click="orderClick(index)" v-if="item.OrdersFinish == 1">
                @{{item.OrdersNum}}<br>@{{item.OrdersDetails[0].memberName}}
            </button>
        </div>
    </div>
    <div class="col-8">
        <div id="rightButtom">
            <div class="jumbotron" v-for="item,index in list" v-if="index == currentIndex">
                <!-- 訂單標題 -->
                <h1 class="display-4" id="detailsTitle">@{{item.OrdersNum}}⎯ @{{item.OrdersDetails[0].memberName}}</h1>
                <hr class="my-4">
                <!-- 訂單內容 -->
                <h3 id="detailsItem">
                    <div class="row" v-for="i,index in item.OrdersDetails">
                    <div class="col-1 text-center"><span class="badge badge-light">@{{index+1}}</span></div>
                        <div class="col-2 text-left">
                            <span>@{{i.mealQuantity}}x</span>
                        </div>
                        <div class="col-7 text-left">
                            <span>@{{i.mealName}}</span>
                        </div>
                        <div class="col-2 text-right">
                            <span>$@{{i.mealUnitPrice}}</span>
                        </div>
                    </div>
                </h3>
                <hr class="my-4">
                <h3>
                    <div class="row" id="detailsTotal">
                        <div class="col-9 text-right">Total</div>
                        <div class="col-3 text-right">$@{{total[index]}}</div>
                    
                       
                    </div>
                </h3>
                <hr class="my-4">
                <div class="row" id="detailsButton">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <button type="button" class="btn btn-dark detailsBtn" data-toggle="modal" data-target="#rejectModal">✘拒絕訂單</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-dark detailsBtn" v-on:click="acceptClick(index)">✔接受訂單</button>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- 是否拒絕訂單MODAL --}}
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="modalHeader">
                    <span>您確定要拒絕此筆訂單?</span>
                </div>
                <div id="modalFooter">
                    <button type="button" class="btn btn-danger" v-on:click="yesReject()">確定拒絕</button>
                    <button type="button" class="btn btn-outline-dark" v-on:click="notReject()">取消拒絕</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
<script>
   
    var appB = new Vue({
        el:"#buttomDiv",
        data:{
            list:[],
            total:[],
            currentIndex:0
        },
        mounted: function () {
            this.init();
        },
        methods:{
            init:function(){
                let _this = this;
                axios.get('/api/order')
                    .then(function (response) {
                        _this.list  = response.data;
                        _this.list.forEach((element,index) => {
                            // console.log(element);
                            _this.list[index].OrdersDetails = JSON.parse(_this.list[index].OrdersDetails);
                            _this.total[index] = 0;
                            _this.list[index].OrdersDetails.forEach(ele => {
                                // console.log(ele);
                                _this.total[index] += ele.mealQuantity * ele.mealUnitPrice;
                            });
                        });
                        // console.log(_this.list);
                    })
                    .catch(function (response) {
                        console.log(response);
                });
            },
            orderClick:function(index){
                // console.log(index);
                this.currentIndex = index;
                $(".jumbotron").css("display","block");
            },
            acceptClick:function(index){
                // console.log(this.list[index].OrdersID);
                // console.log(index);
                this.list[index].OrdersFinish = 2;
                $(".jumbotron").css("display","none");
                let _this = this;
                axios.put('/api/order/'+_this.list[index].OrdersID,_this.list[index])
                    .then(function(response){
                        console.log(response.data['ok']);
                        _this.init();
                    })
            },
            notReject:function(){
                $("#rejectModal").modal('hide');
            },
            yesReject:function(){
                // console.log(this.currentIndex);
                // console.log(this.list[this.currentIndex].OrdersID);
                this.list[this.currentIndex].OrdersFinish = 0;
                let _this = this;
                axios.put('/api/order/'+_this.list[_this.currentIndex].OrdersID,_this.list[_this.currentIndex])
                    .then(function(response){
                        console.log(response.data['ok']);
                        _this.init();
                    })
                $(".jumbotron").css("display","none");
                $("#rejectModal").modal('hide');
            }
        }
    })
</script>
@endsection