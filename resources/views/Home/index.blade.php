@extends('layouts.layout')
@section('content')

            <div class="mainHead">
                <div class="mainSearchDiv">
                    <div>
                        <h1 class="mb-5">把您想吃的美食外送到府</h1>
                    </div>
                    <div class="container">
                        <!-- 區域選擇 -->
                        <div class="btn-group col-sm-2 col-12" id="selectArea">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                選擇區域
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">西區</a>
                                <a class="dropdown-item" href="">北區</a>
                                <a class="dropdown-item" href="">東區</a>
                                <a class="dropdown-item" href="">南區</a>
                                <a class="dropdown-item" href="">中區</a>
                                <a class="dropdown-item" href="">西屯區</a>
                                <a class="dropdown-item" href="">南屯區</a>
                                <a class="dropdown-item" href="">北屯區</a>
                            </div>
                        </div>
                        <!-- 類別篩選 -->
                        <div class="btn-group col-sm-2 col-12" id="selectCategory">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    選擇類別
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="">中式料理</a>
                                    <a class="dropdown-item" href="">日式料理</a>
                                    <a class="dropdown-item" href="">美式料理</a>
                                    <a class="dropdown-item" href="">韓式料理</a>
                                    <a class="dropdown-item" href="">泰式料理</a>
                                    <a class="dropdown-item" href="">義式料理</a>
                                    <a class="dropdown-item" href="">甜點</a>
                                    <a class="dropdown-item" href="">飲料</a>
                                </div>
                            </div>
                        <!-- 地址搜尋 -->
                        <div class="input-group col-sm-8 col-12" id="SearchAddress">
                            <input type="text" class="form-control" placeholder="請輸入地址" value="台中市南屯區公益路二段51號">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit" id="SearchAddressButton">Go</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                    $("#SearchAddressButton").on("click",function(){
                        alert('oops!');
                    });
            </script>
@endsection
