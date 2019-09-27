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
    <form class="form-horizontal" action="/shop" method="post" enctype="multipart/form-data">
      <fieldset>
      @csrf
      <!-- Form Name -->
      <legend>shop</legend>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="sname">ShopName</label>  
        <div class="col-md-4">
        <input id="sname" name="sname" type="text" placeholder="" class="form-control input-md" required="">
          
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="stype">ShopType</label>  
        <div class="col-md-4">
        <input id="stype" name="stype" type="text" placeholder="" class="form-control input-md" required="">
          
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="stime">Shiptime</label>  
        <div class="col-md-4">
        <input id="stime" name="stime" type="text" placeholder="" class="form-control input-md" required="">
          
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="saddress">ShopAddress</label>  
        <div class="col-md-4">
        <input id="saddress" name="saddress" type="text" placeholder="" class="form-control input-md" required="">
          
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="semail">ShopEmail</label>  
        <div class="col-md-4">
        <input id="semail" name="semail" type="text" placeholder="" class="form-control input-md">
          
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="sphone">ShopPhone</label>  
        <div class="col-md-4">
        <input id="sphone" name="sphone" type="text" placeholder="" class="form-control input-md">
          
        </div>
      </div>
      
      <!-- Password input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="spassword">ShopPassword</label>
        <div class="col-md-4">
          <input id="spassword" name="spassword" type="password" placeholder="" class="form-control input-md">
          
        </div>
      </div>
      
      <!-- File Button --> 
      <div class="form-group">
        <label class="col-md-4 control-label" for="simage">Shopimage</label>
        <div class="col-md-4">
          <input id="simage" name="simage" class="input-file" type="file">
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