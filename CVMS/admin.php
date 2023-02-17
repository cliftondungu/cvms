<?php
// Include config file
require_once "./dummy/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

   $subject_input = trim($_POST["subject"]);
   $message_input = trim($_POST["message"]);


  $sql = "SELECT email FROM userdetails";
  $result = $mysqli->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //echo $row["email"];
    $recipients[] = $row["email"];
    }
   
    
  } else {
    echo "0 results";
  }

  $to = implode(",", $recipients);
  $subject = $subject_input;

  $message = $message_input ;

  
  $headers = "From: no-reply@gmail.com";

  
  $retval = mail($to, $subject, $message, $headers);

  if( $retval == true ) {
    
    $msg =  "Announcement sent successfully...";
    header("location: success.php?message=$msg");
    
   }else {

    $msg =  "Announcement could not be sent...";
    //redirect to a custom error page
   }

  $mysqli->close();

}
  ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background: #555;
}

.content {
  max-width: 700px;
  margin: auto;
  background: white;
  padding: 10px;
}
</style>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="content">

<br>

<div class="w3-card-4">
  
  <div class="w3-container w3-brown">
    
    <h2>Announcements</h2>
  </div>
  <form class="w3-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <p>      
    <label class="w3-text-brown"><b>Subject</b></label>
    <input class="w3-input w3-border w3-sand" name="subject" type="text"></p>
    <p>      
    <label class="w3-text-brown"><b>Message</b></label>
    <input class="w3-input w3-border w3-sand" name="message" type="text"></p>
    <p>
    <button class="w3-btn w3-brown">Send</button></p>
  </form>
</div>
</div>

</body>
</html>
