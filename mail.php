<?php

  $admin_email = "sankarks@intellyze.com";
  // $admin_email = "sankarks@intellyze.com";
  $name=$_REQUEST['name'];
  // $place=$_REQUEST['place'];

  // $email = $_POST['email'];
  $email = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "testmail";
  $subject = 'Contact Info';
  $comment = $_REQUEST['message'];

$headers ="From: Contact Request ". strip_tags($email) ." <$email> \r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";





  if ($admin_email ){
  // $success  = mail($headers , $admin_email, "$subject", "Name:" . $name."\n".  "Place:" . $place."\n". "Email:" . $email . "\n". "Phone" .$number. "\n". "Comment:" . $comment, "From:" . $admin_email);
 $success = $ok = @mail('sankarks@intellyze.com', $subject, "Name: &nbsp " . $name."<br/>". "Email: &nbsp " . $email .  "Comment: &nbsp " . $comment, $headers);
  if ( $success )
        {
  print "
        <div class='alert alert-success' role='alert' data-out='bounceOut'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>

             Sending <strong>Success</strong> <br />

        </div>
    ";
         }

   else
  {

   print "
        <div id='failed' class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            Sorry your message <strong>failed</strong> to send. check the connection!<br />
        </div>
        " ;

   }

   }

   else
  {

   print "
        <div id='failed' class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            Sorry your message <strong>failed</strong> to send.invalidmail !<br />
        </div>
    ";

   }
?>
