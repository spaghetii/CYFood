<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <form class="form-horizontal" action="/coupon" method="post">
        <fieldset>
        @csrf
        <!-- Form Name -->
        <legend>Coupon</legend>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="couponcode">CouponCode</label>  
          <div class="col-md-4">
          <input id="couponcode" name="code" type="text" placeholder="" class="form-control input-md" required="">
            
          </div>
        </div>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="coupontype">CouponType</label>
          <div class="col-md-4">
            <select id="coupontype" name="type" class="form-control">
              <option value="freeship">免運</option>
              <option value="discount">打折</option>
            </select>
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="coupondiscount">CouponDiscount</label>  
          <div class="col-md-4">
          <input id="coupondiscount" name="discount" type="text" placeholder="" class="form-control input-md">
            
          </div>
        </div>
    
        <div class="form-group row">
            <label class="col-md-4 control-label" class="col-2 col-form-label">CouponStart</label>
            <div class="col-md-4">
              <input class="form-control" type="date" value="2019-10-01" id="couponstart" name="start">
            </div>
          </div>
    
          <div class="form-group row">
            <label class="col-md-4 control-label" class="col-2 col-form-label">CouponDeadline</label>
            <div class="col-md-4">
              <input class="form-control" type="date" value="2019-10-30" id="coupondeadline" name="deadline">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="okOrCancel"></label>
            <div class="col-md-8">
              <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-success">OK</button>
              <button type="submit" id="okOrCancel" name="okOrCancel" class="btn btn-danger">Cancel</button>
            </div>
          </div>
        
        </fieldset>
        </form>
        
</body>
</html>