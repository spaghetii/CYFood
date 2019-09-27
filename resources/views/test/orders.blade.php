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
  <form class="form-horizontal" action="/orders" method="post">
    <fieldset>
    @csrf
    <!-- Form Name -->
    <legend>orders</legend>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="onum">OrdersNum</label>  
      <div class="col-md-4">
      <input id="onum" name="onum" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="odetails">OrdersDetails</label>  
      <div class="col-md-4">
      <input id="odetails" name="odetails" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>

    <div class="form-group row">
      <label for="col-md-4  example-datetime-local-input" class="col-md-4 control-label">OrdersCreate</label>
      <div class="col-md-4">
        <input class="form-control" name="ocreate" type="datetime-local" value="2019-10-19T13:45:00" id="ocreate" >
      </div>
    </div>

    <div class="form-group row">
      <label for="col-md-4  example-datetime-local-input" class="col-md-4 control-label">OrdersUpdate</label>
      <div class="col-md-4">
        <input class="form-control" name="oupdate" type="datetime-local" value="2019-10-19T14:00:00" id="oupdate" >
      </div>
    </div>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="ofinish">OrdersFinish</label>
      <div class="col-md-4">
        <select id="ofinish" name="ofinish" class="form-control">
          <option value="1">TRUE</option>
          <option value="0">FALSE</option>
        </select>
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="meid">MemberID</label>  
      <div class="col-md-4">
      <input id="meid" name="meid" type="text" placeholder="" class="form-control input-md">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mealid">MealID</label>  
      <div class="col-md-4">
      <input id="mealid" name="mealid" type="text" placeholder="" class="form-control input-md">
        
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