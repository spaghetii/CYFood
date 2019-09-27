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
  <form class="form-horizontal" action="/meal" method="post" enctype="multipart/form-data">
    <fieldset>
    @csrf
    <!-- Form Name -->
    <legend>Meal</legend>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mname">MealName</label>  
      <div class="col-md-4">
      <input id="mname" name="mname" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mdesc">MealDesc</label>  
      <div class="col-md-4">
      <input id="mdesc" name="mdesc" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mprice">MealPrice</label>  
      <div class="col-md-4">
      <input id="mprice" name="mprice" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mtype">MealType</label>  
      <div class="col-md-4">
      <input id="mtype" name="mtype" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mdetails">MealDetails</label>  
      <div class="col-md-4">
      <input id="mdetails" name="mdetails" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mquantity">MealQuantity</label>  
      <div class="col-md-4">
      <input id="mquantity" name="mquantity" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="sID">ShopID</label>  
      <div class="col-md-4">
      <input id="sID" name="sID" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- File Button --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="mimage">MealImage</label>
      <div class="col-md-4">
        <input id="mimage" name="mimage" class="input-file" type="file">
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