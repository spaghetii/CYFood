<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/burger.ico" type="image/x-icon">
    <!-- Bootstrap -->
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
    <title>CYFood</title>
    <style>
        body {
            background: center/cover no-repeat url("../img/buffet-counter-cozy-776538.jpg");
            font-family:"Microsoft JhengHei";
        }

        .register {

            margin-top: 9%;
            padding: 20px 30px 30px 30px;
            /* border:1px solid rgba(255, 166, 0, 0.856) ; */
            background-color: rgba(255, 255, 255, 0.856);
            box-shadow: 0.5px 1px 2px 1px rgba(145, 139, 139, 0.7);
        }

        .registertitle {
            color: #333;
            font-size: 2rem;
            line-height: 1em;
            padding: 16px 0;
            text-align: center;
            border-bottom: 1px solid #c2c2c2;
        }

        .btn {
            background-color: orange;
            border-color: orange;
            font-weight: bold;
            font-family: fantasy;
        }

        .btn:hover {
            background-color: rgba(255, 166, 0, 0.856);
            border-color: rgba(255, 166, 0, 0.856);
        }

    </style>
</head>

<body>
    <div class="container col-md-6">
        <div class="register">
            <h3 class=" registertitle">餐廳註冊</h3>
            <div class="register-form  w-100  ">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="rName">餐廳名稱</label>
                        <input type="text" class="form-control" id="rName" name="rName">
                    </div>
                    <div class="form-group">
                        <label for="rAddr">餐廳地址</label>
                        <input type="text" class="form-control" id="rAddr" name="rAddr">
                    </div>
                    <div class="form-group">
                        <label for="rType">餐廳種類</label>
                        <select class="form-control" id="rType" name="rType">
                            <option value="中式美食">中式美食</option>
                            <option value="台灣美食">台灣美食</option>
                            <option value="日式美食">日式美食</option>
                            <option value="美式美食">美式美食</option>
                            <option value="飲品">飲品</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rEmail">電子郵件</label>
                        <input type="email" class="form-control" id="rEmail" name="rEmail">
                    </div>
                    <div class="form-group">
                        <label for="rPhone">手機號碼</label>
                        <input type="text" class="form-control" id="rPhone" name="rPhone">
                    </div>
                    <div class="form-group">
                        <label for="rPassword">密碼</label>
                        <input type="password" class="form-control" id="rPassword" name="rPassword">
                    </div>
                    <div class="form-group">
                        <label for="rImage">餐廳照片</label>
                        <input type="file" class="form-control-file" id="rImage" name="rImage">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">註冊</button>
                    <button type="button" onclick="location.href='./login'"
                        class="btn btn-primary btn-block btn-lg">已有帳號? 前往登入</button>
                </form>
            </div>

        </div>
    </div>

</body>

</html>
