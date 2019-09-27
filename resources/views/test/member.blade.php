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
    <form class="form-horizontal" action="/member" method="post">
        <fieldset>
        @csrf
        <!-- Form Name -->
        <!-- Form Name -->
        <legend>Member</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name">MemberName</label>  
          <div class="col-md-4">
          <input id="name" name="registerName" type="text" placeholder="" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">MemberE-mail</label>  
          <div class="col-md-4">
          <input id="email" name="registerEmail" type="text" placeholder="" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="phone">MemberPhone</label>  
          <div class="col-md-4">
          <input id="phone" name="registerPhone" type="text" placeholder="" class="form-control input-md" required="">
            
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password">MemberPassword</label>
          <div class="col-md-4">
            <input id="password" name="registerPassword" type="password" placeholder="" class="form-control input-md" required="">
            
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