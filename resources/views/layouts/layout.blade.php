<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CYfood</title>
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
    {{-- Vue --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- 網頁 css -->
    {{-- 大於575px --}}
    <link rel="stylesheet" media="screen and (min-width: 576px)" href="css/styleLarge.css">
    {{-- 小於575px --}}
    <link rel="stylesheet" media="screen and (max-width: 576px)" href="css/styleSmall.css">
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <header class="header navbar bg-light navbar-light navbar-expand fixed-top">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="img/logo.png" alt=""> <!-- logo -->
                </a>

                {{-- 隱藏式 header 地址搜尋 --}}
                @yield('headerSearchLarge')

                <div class="collapse navbar-collapse ">
                    <div class="navbar-nav collapse navbar-collapse justify-content-end" id="navbarItem">
                        <a class="nav-item nav-link ml-4" href=""><img src="img/user.png" alt="">&ensp;登入</a>
                        <!-- login -->
                        <!-- <a class="nav-item nav-link ml-4" href=""><img src="img/shopping-bag.png" alt=""></a> -->
                        <!-- 購物袋 -->
                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            @yield('content')
        </main>

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row footerTop">
                    <!-- footer 上區 -->
                    <div class="col-sm-5 col-12 mt-4">
                        <img src="img/logo.png" alt="">
                    </div>
                    <div class="col-sm-3 col-6 mt-4">
                        <p><a href="">關於 CY Food</a></p>
                        <p><a href="">意見箱</a></p>
                    </div>
                    <div class="col-sm-4 col-6 mt-4">
                        <p><a href="">常見 Q&A</a></p>
                        <p><a href="">關於我們</a></p>
                    </div>
                </div>
                <div class="row mt-4 footerBottom">
                    <!-- footer 下區 -->
                    <div class="col-sm-5 col-6">
                        <small>Copyright © 2019 CY food</small>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="https://www.facebook.com/groups/AI0101/"><img src="img/facebook.png" alt="" class="mr-3"></a>
                        <a href="https://github.com/spaghetii/CYFood"><img src="img/github.png" alt="" class="mr-3"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div> <!-- wrapper -->
</body>

</html>
