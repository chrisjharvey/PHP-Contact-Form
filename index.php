<?php
    $msg = '';
    $msgClass = '';

if(filter_has_var(INPUT_POST , 'submit')){
    
    $name= $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

   if(!empty($email) && !empty($name) && !empty($message)) {
       // Passed 
       //Check Email
       if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
           // Failed
        $msg = 'Please use valid a valid email';
        $msgClass = 'alert-danger';
       } else {
            // Passed
            $toEmail = 'chris-harvey94@outlook.com';
            $subject = 'Contact Request From ' .$name;
            $body = '<h2>Contact Request</h2>
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Message/h4><p>'.$message.'</p>
            ';

            // Email Headers
            $headers  = "MIME-Version: 1.0" ."\r\n";
            $headers .= "Content-Type;text/html;charset=UTF-8" . "
            \r\n";

            //Additional Headers
            $headers .= "From: " .$name. "<".$email.">". "\r\n";

            if(mail($toEmail, $subject, $body, $headers)){
                // Email Sent
                $msg = 'Your Email has been sent';
                $msgClass = 'alert-success';
            } else { 
                $msg = 'Your Email was not sent';
                $msgClass = 'alert-danger';
       }
    }
   } else {
       // failed
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
   }

} 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar bg-dark navbar-dark mb-5">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">My Website</a>
            </div>
        </div>
    </nav>
    <div class="container">
            <?php if($msg != ''): ?>
                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
           
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : '' ?>" placeholder="Name">
            </div>
            <div class="form-group">
          
                <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : '' ?>" placeholder="Email">
            </div>
            <div class="form-group">
           
                <textarea name="message" class="form-control" placeholder="Message"><?php echo isset($_POST['message']) ? $message : '' ?></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>

