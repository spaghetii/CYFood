<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CYFood-Restaurant</title>
    <!-- 網頁 icon -->
    <link rel="icon" href="/img/burger.ico" type="image/x-icon">
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
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    {{-- Topcss --}}
    <link rel="stylesheet" href="/css/clientTop.css">
    {{-- v-charts --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/v-charts/lib/index.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/v-charts/lib/style.min.css">
</head>
<body>
    <div class="container-fuild">
        <!-- top -->
        <div class="row no-gutters sticky-top" id="fixedDiv">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/newOrder/{{$id}}">
                    <div class="fixedItem rounded">
                        <img src="/img/client/neworder.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/processing/{{$id}}">
                    <div class="fixedItem rounded">
                        <img src="/img/client/processing.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/takeout/{{$id}}">
                    <div class="fixedItem rounded">
                        <img src="/img/client/takeout.png" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="/shop/user/{{$id}}">
                    <div class="fixedItem rounded">
                        <img src="/img/client/user.png" alt="">
                    </div>
                </a>
            </div>
        </div>

        {{-- bottom --}}
        @yield('content')

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    @yield('script')

</body>
</html>