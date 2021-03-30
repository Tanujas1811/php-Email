<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
  <center>
    <h4 class="sent"></h4>
      <form id="myForm">
        <h2>Write an Email</h2>
        Name:
        <input type="text" id="name" ><br><br>
        Email:
        <input type="text" id="email" ><br><br>
        Subject:
        <input type="text" id="subject" ><br><br>
        <p> Message: </p>
        <textarea id="body" rows="5" placeholder="Type Message"></textarea><br><br>
        <button type="button" onclick="sendEmail()" value="Send an Email">Submit</button>
      </form></center>
      <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script type="text/javascript">
      function sendEmail() {
        var name=$("#name");
        var email=$("#email");
        var subject=$("#subject");
        var body=$("#body");
        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
          $.ajax({
            url: 'sendEmail.php',
            method:'POST',
            dataType:'json',
            data:{
              name: name.val(),
              email: email.val(),
              subject: subject.val(),
              body: body.val()
            }, success: function(response){
              $('#myForm')[0].reset();
              $('.sent').text("Message sent successfully.");
            }
          });
        }
      }
      function isNotEmpty(caller){
        if(caller.val()==""){
          caller.css('border','1px solid red');
          return false;
        }
        else{
          caller.css('border', '');
          return true;
        }
      }
      </script>
</body>
</html>
