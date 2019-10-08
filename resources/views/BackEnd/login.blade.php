<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CYFood-BackEnd</title>
    <!-- 網頁 icon -->
    <link rel="icon" href="/img/burger.ico" type="image/x-icon">
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
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/e4b794bd40.js" crossorigin="anonymous"></script>
    <style> 
        body{
            height: 100%;
            background:  no-repeat  url("/img/BE-5.jpg");
            background-size:cover;
            
        }
        .login {
            background:rgba(255, 255, 255, 0.5);
            border-style: solid;
            border-color: white;
            border-width: thick;
            width: 650px;
            height: 270px;
            margin: 80px 10px 0px 40%;
            padding: 10px 20px 20px 20px;
        }

        .loginform{
            margin-top: 10px;
            margin-left: 50px
        }

        .title{
            margin-bottom: 20px;
            /* color: orange; */
            text-shadow: 2px 3px 3px rgba(0,0,0,0.3);
        }

        .row{
            margin-bottom: 10px;
        }

        #inputArea {
            width: 500px;
            height: 40px;
            font-size: 20px;
        }

        .icon {
            width: 45px;
            height: 45px;
        }

        .btn{
            margin-right: 5px;
        }

    </style>
    
</head>

<body>
    <div class="login">
        <div class="loginform">
            <div class="title">
                <h1>CYFood 管理端</h1>
            </div>
            <form>
                <div class="row">
                    <span class="icon d-flex  align-items-center justify-content-center"><i class="far fa-user"></i></span>      
                    <input type="text" name="userName" placeholder="請輸入帳號" id="inputArea"><br><br>
                </div>
                <div class="row">
                    <span class="icon d-flex  align-items-center justify-content-center"><i class="fas fa-lock"></i></span>
                    <input type="password" name="pwd" placeholder="請輸入密碼" id="inputArea"><br><br>
                    </div>
                <div class="row ">
                    <input type="button" name="login" value="登入" class="btn btn-success" onclick="validate();">
                    <input type="reset" name="cancel" value="重置" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>

<body>
    
</body>
</html>