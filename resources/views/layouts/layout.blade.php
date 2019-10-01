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
    @yield('login')
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <header class="header navbar bg-light navbar-light navbar-expand fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="img/logo.png" alt=""> <!-- logo -->
                </a>

                {{-- 隱藏式 header 地址搜尋 --}}
                @yield('headerSearchLarge')

                <div class="collapse navbar-collapse">
                    <div class="navbar-nav collapse navbar-collapse justify-content-end" id="navbarItem">
                        {{-- 登入 --}}
                        <a class="nav-item nav-link ml-4" href="/login"><img src="img/user.png" alt="">&ensp;登入</a>
                        {{-- 登入後資訊欄 --}}
                        <div class="dropdown show">
                            <a class="nav-item nav-link ml-4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="img/user.png" alt="">&ensp;User</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#"><img src="img/bill.png" alt="">&emsp;訂單</a>
                                    <a class="dropdown-item" href="#"><img src="img/user.png" alt="">&emsp;帳戶</a>
                                    <a class="dropdown-item" href="#"><img src="img/qa.png" alt="">&emsp;Q&A</a>
                                    <a class="dropdown-item" href="#"><img src="img/logout.png" alt="">&emsp;登出</a>
                                  </div>
                        </div>
                        {{-- 購物袋 --}}
                        <a class="nav-item nav-link ml-4" href="#" role="button" data-toggle="modal" data-target="#shoppingBagModal">
                            <img src="img/shopping-bag.png" alt="">
                            <span style="font-size:1.2rem;">1</span>
                        </a>
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
                    <div class="col-sm-5 col-12 mt-0 mt-sm-0">
                        <img src="img/logo.png" alt="">
                    </div>
                    <div class="col-sm-3 col-6 mt-4 mt-sm-0">
                        <p><a href="#">關於 CY Food</a></p>
                        <p><a href="#">意見箱</a></p>
                    </div>
                    <div class="col-sm-4 col-6 mt-4 mt-sm-0">
                        <p><a href="#">常見 Q&A</a></p>
                        <p><a href="#">關於我們</a></p>
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
    

    <!-- ShoppingBagModal -->
    <div class="modal right fade" id="shoppingBagModal" tabindex="-1" role="dialog" aria-labelledby="shoppingBagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shoppingBagModalLabel"><img src="img/shopping-bag.png" alt="">&emsp;您的訂單&nbsp;(1)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="img/close.png" alt=""></span>
                    </button>
                </div>
                <div class="modal-body" id="shoppingBagModalBody">
                    <ul>
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
                                                小籠包 Pork Xiaolongbao
                                            </div>
                                            <div class="float-right">
                                                $9,999
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
                <div class="modal-footer">
                    <a href="#" class="d-flex justify-content-between" id="shoppingBagModalCheckOutDiv">
                        <div id="shoppingBagModalCheckOutItem">99</div>
                        <div>下一步：結帳</div>
                        <div>$9,999</div>
                    </a>
                </div>
            </div> {{-- modal-content --}}
        </div> {{-- modal-dialog --}}
    </div> {{-- shoppingBagModal --}}
    
   
    @yield('script')
    
</body>

</html>