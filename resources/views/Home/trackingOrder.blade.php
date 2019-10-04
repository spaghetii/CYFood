@extends('layouts.layout')

@section('content')
    <div class="container-fluid alignCenter" id="trackingOrderBgDiv">
        <div class="col-sm-6" id="blankDiv">
        </div>
        <div class="col-sm-4" id="trackingOrderDiv">
            <div class="d-flex flex-column">
                {{-- 抵達時間 --}}
                <div class="d-flex flex-row">
                    <div>
                       <h1 class="noMarg">12:15</h1>
                    </div>
                    <div class="ml-auto mt-auto">
                        <small>預計抵達時間</small>
                    </div>
                </div>
                {{-- progress bar --}}
                <div class="d-flex justify-content-center">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection