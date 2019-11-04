<!DOCTYPE html>
<html lang="en">
<head>
    <title>1!</title>
</head>
    <body>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<form action="">
    <div>
      <label for="name"></label>
      <input type="text" id="name" name="user_name" placeholder="  Full Name">
    </div>
    <div>
      <label for="mail"></label>
      <input type="email" id="mail" name="user_mail" placeholder="  Email Address">
    </div>
    <div>
      <label for="message"></label>
      <textarea name="user_message" id="message" cols="30" rows="10" placeholder="  Let me know what's on your mind"></textarea>
    </div>
    <div class="sendButton">
      <button class="btn" type="submit" disabled="disabled">Send</button>
    </div>
  </form>

<script>
  
  $("input[type='text'], textarea").on("input", function () {     
  canChangeColor();
});


function canChangeColor(){  
    
  var can = true;  

  $("input[type='text'], textarea").each(function(){
     if($(this).val()==''){
        can = false;
     }
  });
  
  if(can){
    $('.btn').css({background:'red'})
  }else{
    $('.btn').css({background:'transparent'})
  }

}
</script>
