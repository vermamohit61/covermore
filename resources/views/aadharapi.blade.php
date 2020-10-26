<!DOCTYPE html>
<html>
<head>
<title>Aadhar Api</title>
 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
 
</head>
<body>
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Aadhar Api</div>
      <div class="card-body">
        <form action = "{{ route("aadharapi.store") }}" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="role" name="aadharapi" class="form-control" placeholder="Aadhar" required="required" autofocus="autofocus">
                  <label for="role">Aadhar</label>
                </div>
              </div>
              
            </div>
          </div>
         <input type = 'submit' class="btn btn-primary" value = "Aadhar"/>
        </form>        
      </div>
    </div>
  </div>

 
</body>
</html>