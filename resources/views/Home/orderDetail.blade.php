@extends('layouts.layout')

@section('headerSearchLarge')
<h3>結帳</h3>
@endsection

@section('content')
    <div class="container-fluid" id="orderDetailDiv">
        <div class="row d-flex">
            {{-- leftdiv --}}
            <div class="orderDetailLeftDiv col-sm-6 col-12">
                {{-- 外送詳情 --}}
                <div class="orderDetailItemDiv">
                    <div class="d-flex justify-content-between">
                        <h5>外送詳情</h5>
                        <a href="" class="colorOrange aHoverColor">編輯</a>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="row mb-3">
                            <div class="col-3">送達地址</div>
                            <div class="col-9">台中市南屯區公益路二段51號18樓</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">預計時間</div>
                            <div class="col-9">35 – 45 分鐘</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">優惠卷</div>
                            <div class="col-9"><input type="text" class="form-control form-control-sm"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 alignCenter">付款方式</div>
                            <div class="col-9">
                                <div class="form-check mb-1">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">現金
                                    </label>
                                </div>
                                <div class="form-check d-flex justify-content-between">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">信用卡
                                    </label>
                                    <select class="form-control form-control-sm" style="width:83%">
                                        <option>選擇信用卡</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 餐點詳情 --}}
                <div class="orderDetailItemDiv">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>餐點份數&nbsp;(1)</h5>
                            <small>訂餐餐廳：春水堂 中佑店</small>
                        </div>
                        <a href="" class="colorOrange aHoverColor">新增餐點</a>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div>
                        <ul class="noPad">
                            <li style="list-style-type:none">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>移除</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>    
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    冰珍珠奶茶 Iced Pearl Milk Tea
                                                </div>
                                                <div class="float-right">
                                                    $130
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="noPad">
                            <li style="list-style-type:none">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>移除</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>    
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    冰珍珠奶茶 Iced Pearl Milk Tea
                                                </div>
                                                <div class="float-right">
                                                    $130
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="noPad">
                            <li style="list-style-type:none">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>移除</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>    
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    冰珍珠奶茶 Iced Pearl Milk Tea
                                                </div>
                                                <div class="float-right">
                                                    $130
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="noPad">
                            <li style="list-style-type:none">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>移除</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>    
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    冰珍珠奶茶 Iced Pearl Milk Tea
                                                </div>
                                                <div class="float-right">
                                                    $130
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="noPad">
                            <li style="list-style-type:none">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>移除</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>    
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    冰珍珠奶茶 Iced Pearl Milk Tea
                                                </div>
                                                <div class="float-right">
                                                    $130
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="noPad">
                            <li style="list-style-type:none">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>移除</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>    
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    冰珍珠奶茶 Iced Pearl Milk Tea
                                                </div>
                                                <div class="float-right">
                                                    $130
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="noPad">
                            <li style="list-style-type:none">
                                <div class="d-flex justify-content-between">
                                    <div class="shoppingBagModalItemQuantity">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>移除</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>    
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" class="shoppingBagModalItemDetail">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <div class="float-left">
                                                    冰珍珠奶茶 Iced Pearl Milk Tea
                                                </div>
                                                <div class="float-right">
                                                    $130
                                                </div>
                                            </div>
                                            <div>
                                                <small class="colorOrange aHoverColor">編輯</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="留下備註給餐廳"></textarea>
                    </div>
                </div>
            </div> {{-- leftdiv --}}

            {{-- rightdiv --}}
            <div class="orderDetailRightDiv col-sm-6 col-12">
                <div class="orderSummaryDiv divCenter">
                    <div class="mb-4">
                        <h5>訂單摘要</h5>
                    </div>
                    <div class="mb-3">
                       <img src="img/shopping-bag1.png" alt="">&ensp;透過春水堂&nbsp;中佑店訂購的&nbsp;1&nbsp;份餐點
                    </div>
                    <div class="mb-3">
                        <img src="img/clock.png" alt="">&ensp;預計在&nbsp;35&nbsp;到&nbsp;45&nbsp;分鐘內抵達
                    </div>
                    <div class="mb-3">
                        <img src="img/address.png" alt="">&ensp;外送到台中市南屯區公益路二段51號18樓
                    </div>
                    <div class="mt-4 mb-4">
                        <hr>
                    </div>
                    <ul class="noPad noMarg" style="list-style:none">
                        <li class="noPad noMarg mb-3 d-flex justify-content-between">
                            <div>小計</div>
                            <div>NT$260</div>
                        </li>
                        <li class="noPad noMarg mb-4 d-flex justify-content-between">
                            <div>外送費</div>
                            <div>NT$30</div>
                        </li>
                        <li class="noPad noMarg mb-3 d-flex justify-content-between">
                            <div><h5>總計</h5></div>
                            <div><h4>NT$290</h4></div>
                        </li>
                    </ul>
                    <a v-on:click="sendOrders" style="text-decoration: none;">
                        <div class="orderConfirmDiv alignCenter bgOrange">
                            安排訂單
                        </div>
                    </a>
                </div>
            </div> {{-- rightdiv --}}
        </div>     {{-- row --}}
    </div> {{-- orderDetailDiv --}}
@endsection

@section('script')
    <script>
    
        var sendOrders = new Vue({
            el:".orderDetailRightDiv",
            data:{
                header:"shopID",
                id:1
            },
            methods:{
                sendOrders: function(){
                    let _this = this;
                    Swal.fire({                 // delete form
                        title: '確定要安排訂單嗎?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '送出訂單',
                        cancelButtonText: '再考慮一下'
                        }).then((result) => {
                            if (result.value)
                            axios.post('/socket/clientsend', {
                                header: this.header,
                                id:this.id
                            })
                            .then(function (response) {
                                console.log(response.data);
                            })
                            .catch(function (response) {
                                console.log(response)
                            });
                    });
                }
            }
        })
    
    </script>
@endsection