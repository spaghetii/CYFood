<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/backendorder.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="line1 col">CYFood</div>

            <!-- 下拉式選單 -->
            <div class="line1 col">
                <div class="select">
                    <select id="selectbasic" name="selectbasic" class="form-control">
                        <option value="1">連絡電話、會員名稱、電子郵件1</option>
                        <option value="2">連絡電話、會員名稱、電子郵件2</option>
                    </select>
                </div>
            </div>

            <!-- 搜索輸入框 -->
            <div class="line1 col">
                <input id="searchinput" name="searchinput" type="search" placeholder="我是輸入框......"
                    class="form-control input-md">
            </div>

            <!-- 開始查詢 -->
            <div class="line1 col">
                <button id="searchbutton" name="searchbutton" class="btn btn-primary">開始查詢</button>
            </div>
        </div>

        <hr>

        <div id="divleft">
            <div id="buttonleft">
                <button id="orderbutton" name="orderbutton" class="information-btn"
                    onclick="location.href='order.html'">訂單</button>
                <br>
                <br>
                <button id="restaurantbutton" name="restaurantbutton" class="information-btn"
                    onclick="location.href='restaurant.html'">餐廳</button>
                <br>
                <br>
                <button id="memberbutton" name="orderbutton" class="information-btn"
                    onclick="location.href='member.html'">會員</button>
                <br>
                <br>
                <button id="preferentialbutton" name="orderbutton" class="information-btn"
                    onclick="location.href='preferential.html'">優惠</button>
                <br>
                <br>
            </div>
        </div>
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
    </div>




</body>

</html>