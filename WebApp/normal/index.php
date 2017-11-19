<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>


<div class="container">
  <h2>normal device</h2>
  
<label class="checkbox-inline">  
<input id="toggle-event1" type="checkbox" data-toggle="toggle">
<div id="desired-event1">Desired status: </div>
<div id="actual-event1">Actual status: </div>
</label> 

 
<label class="checkbox-inline" style="margin-left: 80px;">  
<input id="toggle-event2" type="checkbox" data-toggle="toggle">
<div id="desired-event2">Desired status: </div>
<div id="actual-event2">Actual status: </div>
</label> 

</div>


<script>

 
		
$(function() {
    $('#toggle-event1').change(function() {
      if ($(this).prop('checked') === true){
		  console.log('truess');
		  $.ajax({
		  url: 'http://52.178.91.17/normal/php_request.php?dev_id=0&status=1',
		  type: 'PUT',
		  success: function(data) {
			//play with data
		  }
		});
	  }else{
		  console.log('falsee');
		  $.ajax({
		  url: 'http://52.178.91.17/normal/php_request.php?dev_id=0&status=0',
		  type: 'PUT',
		  success: function(data) {
			//play with data
		  }
		});
	  }
		 	
	  
    })
	

  })
  $(function() {
    $('#toggle-event2').change(function() {
      if ($(this).prop('checked') === true){
		  console.log('truess');
		  $.ajax({
		  url: 'http://52.178.91.17/normal/php_request.php?dev_id=1&status=1',
		  type: 'PUT',
		  success: function(data) {
			//play with data
		  }
		});
	  }else{
		  console.log('falsee');
		  $.ajax({
		  url: 'http://52.178.91.17/normal/php_request.php?dev_id=1&status=0',
		  type: 'PUT',
		  success: function(data) {
			//play with data
		  }
		});
	  }
    })
  })
  
  setTimeout(function(){
   window.location.reload(1);
}, 5000);
</script>


</body>
</html>
