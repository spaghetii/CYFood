@extends('layouts.clientLayout')

@section('content')
<link rel="stylesheet" href="/css/clientProcessing.css">
<!-- buttom -->
<div class="row no-gutters" id="buttomDiv">
    <div class="col-4">
        <div id="leftButtom">
            <button type="button" class="btn btn-light btn-block" id="orderBtn" v-on:click="orderClick">
                @{{detailsTitle}}
            </button>
        </div>
    </div>
    <div class="col-8">
        <div id="rightButtom">
            <div class="jumbotron">
                <!-- 訂單標題 -->
                <div class="row" id="rowTop">
                    <div class="col-10" id="detailsTitle">
                        @{{detailsTitle}}
                    </div>
                    <div class="col-2 btn-group" id="detailsGroup">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            幫助
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" data-toggle="modal" data-target="#contactModal" href="#">✉ 聯絡顧客</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#delayModal" href="#">☹ 延遲訂單</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#cancelModal" href="#">✘ 取消訂單</a>
                        </div>
                    </div>
                    
                </div>
                <hr class="my-4">
                <!-- 訂單內容 -->
                <h3  id="detailsItem">
                    <div class="row">
                        <div class="col-1 text-center"><span class="badge badge-light">1</span></div>
                        <div class="col-2 text-left">
                            <span>@{{detailsCount}}x</span>
                        </div>
                        <div class="col-7 text-left">
                            <span>@{{detailsMeal}}</span>
                        </div>
                        <div class="col-2 text-right">
                            <span>$@{{detailsPrice}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 text-center"><span class="badge badge-light">2</span></div>
                        <div class="col-2 text-left">
                            <span>@{{detailsCount}}x</span>
                        </div>
                        <div class="col-7 text-left">
                            <span>@{{detailsMeal}}</span>
                        </div>
                        <div class="col-2 text-right">
                            <span>$@{{detailsPrice}}</span>
                        </div>
                    </div>
                </h3>
                <hr class="my-4">
                <h3>
                    <div class="row" id="detailsTotal">
                        <div class="col-9 text-right">Total</div>
                        <div class="col-3 text-right">$@{{totalPrice}}</div>
                    </div>
                </h3>
                <hr class="my-4">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-dark detailsBtn">☎ 呼叫外送員</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 聯絡顧客MODAL --}}
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Jennifer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">輸入訊息:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark">送出</button>
            </div>
        </div>
    </div>
</div>
{{-- 延遲訂單MODAL --}}
<div class="modal fade" id="delayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                    請問您需要額外準備幾分鐘？<br>
                    我們會通知客戶訂單有所延遲。
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">5分鐘</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">10分鐘</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                        <label class="form-check-label" for="inlineRadio3">15分鐘</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option2">
                        <label class="form-check-label" for="inlineRadio4">20分鐘</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark">送出</button>
            </div>
        </div>
    </div>
</div>
{{-- 取消訂單MODAL --}}
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                    請問您為什麼要取消訂單？
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option1">
                        <label class="form-check-label" for="inlineRadio5">提早打烊</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option2">
                        <label class="form-check-label" for="inlineRadio6">存貨不足</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option2">
                        <label class="form-check-label" for="inlineRadio7">餐廳問題</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark">送出</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var buttomDiv = new Vue({
        el:"#buttomDiv",
        data:{
            detailsTitle:"CY201909240001—Jennifer",
            detailsCount:"9",
            detailsMeal:"CY超值豪華A9和牛套餐",
            detailsPrice:"1000",
            totalPrice:"9000"
        },
        methods:{
            orderClick:function(){
                $(".jumbotron").css("display","block");
            }
        }
    })
</script>
@endsection