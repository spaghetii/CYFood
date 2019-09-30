<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Microsoft JhengHei;
        }
        .container-fuild {
            width: 100%;
            height: 100%;
        }
        #fixedDiv{
            height: 20%;
            background-color: white;
        }
        .fixedItem{
            background-color: orange;
            width: 23%;
            height: 86%;
            margin: auto;
        }
        img {
            width: 25%;
            height: 74%;
            margin:6% auto;
            display: block;
        }
        #buttomDiv{
            width: 98%;
            margin:auto;
        }
        .nav-link{
            color: black;
            font-size: 26px;
            font-weight: bold;
        }
        .nav-link:hover{
            color:#d0d0d0;
        }
        /* 暫停接單 */
        .card{
            width: 70%;
            margin: 5% auto;
        }
        .card-header{
            font-size: 26px;
        }
        .card-body{
            font-size: 18px;
        }
        /* 歷史訂單 */
        .input-group{
            width: 30%;
            margin: 1% 1% auto auto ;
        }
        table {
            border-collapse: collapse;
            width: 98%;
            margin: 1% auto;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 20px;
        }
        th{
            background-color: whitesmoke;
        }
        td{
            color:#5b5b5b;
        }
        @media screen and (max-width:1200px) {
            #fixedDiv{
                height: 15%;
            }
        }
        @media screen and (max-width:768px) {
            #fixedDiv{
                height: 12%;
            }
            .nav-link{
                font-size: 22px;
            }
            th, td{
                font-size: 16px;
            }
            .card{
                width: 90%;
            }
        }
        @media screen and (max-width:576px) {
            #fixedDiv{
                height: 8%;
            }
            .nav-link{
                font-size: 18px;
            }
            th, td{
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fuild">
        {{-- top --}}
        <div class="row sticky-top no-gutters" id="fixedDiv">
            <div class="fixedItem rounded">
                <a href="/newOrder">
                    <img src="/img/client/neworder.png" alt="">
                </a>
            </div>
            <div class="fixedItem rounded">
                <a href="/processing">
                    <img src="/img/client/processing.png" alt="">
                </a>
            </div>
            <div class="fixedItem rounded">
                <a href="/takeout">
                    <img src="/img/client/takeout.png" alt="">
                </a>
            </div>
            <div class="fixedItem rounded">
                <a href="/user">
                    <img src="/img/client/user.png" alt="">
                </a>
            </div>   
        </div>
        {{-- bottom --}}
        <div class="no-gutters" id="buttomDiv">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">暫停接單</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">歷史訂單</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">餐廳資訊</a>
                </li>
            </ul>
            {{-- 標籤內容 --}}
            <div class="tab-content" id="myTabContent">
                {{-- 暫停接單 --}}
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {{-- 卡片 --}}
                    <div class="card text-center">
                        <div class="card-header">
                            停止受理新訂單
                        </div>
                        <div class="card-body">
                            您希望暫停多久？<br><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">30分鐘</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">60分鐘</label>
                            </div>       
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                                <label class="form-check-label" for="inlineRadio3">90分鐘</label>
                            </div>       
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option2">
                                <label class="form-check-label" for="inlineRadio4">120分鐘</label>
                            </div>       
                        </div>
                        <div class="card-footer text-muted">
                            <button type="button" class="btn btn-outline-dark">送出</button>
                        </div>
                    </div>
                </div>
                {{-- 歷史訂單 --}}
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    {{-- 搜尋 --}}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="yyyy/mm/dd" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">搜尋</button>
                        </div>
                    </div>
                    {{-- 表格 --}}
                    <table>
                        <tr>
                            <th>訂單編號</th>
                            <th>訂單日期</th>
                            <th>客戶名稱</th>
                            <th>訂單金額</th>
                            <th>訂單狀況</th>
                        </tr>
                        <tr>
                            <td>CY20190930001</td>
                            <td>2019/09/30</td>
                            <td>Jennifer</td>
                            <td>$9900</td>
                            <td>已送達</td>
                        </tr>
                        <tr>
                            <td>CY20190930002</td>
                            <td>2019/09/30</td>
                            <td>CYcompany</td>
                            <td>$66</td>
                            <td>已送達</td>
                        </tr>
                        <tr>
                            <td>CY20190930002</td>
                            <td>2019/09/30</td>
                            <td>Panda</td>
                            <td>$999</td>
                            <td>已送達</td>
                        </tr>
                    </table>
                </div>
                {{-- 餐廳資訊 --}}
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>