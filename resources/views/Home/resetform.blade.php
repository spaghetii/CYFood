<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CYFood</title>
    <!-- 網頁 icon -->
    <link rel="icon" href="img/burger.ico" type="image/x-icon">
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
    <style>
        .resetPassword {
            
            margin-top: 18%;
            padding: 20px 30px 30px 30px;
            /* border:1px solid rgba(255, 166, 0, 0.856) ; */
            background-color: rgba(255, 255, 255, 0.856) ;
            box-shadow: 0.5px 1px 2px 1px rgba(145, 139, 139, 0.7);
        }

        .title {
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
    <div class="container col-md-5">
        <div class="resetPassword">
            <h3 class="title">重置密碼</h3>
            <div class="reset-form  w-100  " id="reset-form">
                <form method="post" action="/reset/resetpassword/{{$token}}">
                    @csrf
                    <div class="form-group">
                        <label for="newPassword">輸入新密碼</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="form-group">
                        <label for="repeatPassword">再輸入一次新密碼</label>
                        <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">送出</button>
                    
                </form>
            </div>

        </div>
    </div>
</body>

</html>
