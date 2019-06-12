
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Selden K. Smith Foundation for Holocaust Education</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Importing fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Raleway:300,400,500i&display=swap" rel="stylesheet">
    <!-- Custon icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <header class="hef-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
            <a class="hef-header-logo text-dark" href="index.php">The Selden K. Smith Foundation for Holocaust Education</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="index.php">Home</a>
          <a class="p-2 text-muted" href="about.php">About</a>
          <a class="p-2 text-muted" href="board.php">Board</a>
          <a class="p-2 text-muted" href="donate.php">Donate</a>
          <!--<a class="p-2 text-muted" href="links.php">Links</a>-->
          <a class="p-2 text-muted active" href="contact.php">Contact</a>
        </nav>
      </div>
    </div>

<main role="main" class="container about-content">
  <div class="row">
    <div class="col-md-8 hef-main">

      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Contact Us
      </h3>
      <?php
      //Checking if form was submitted and the botcatcher is set
      if(isset($_POST['submit'])){
        if($_POST['catcher']!=""){
          echo "<p>There was a problem with your submission</p>";
        }else{
          //Trimming whitespace and stripping HTML tags
          $name=trim(strip_tags($_POST['name']));
          $email = trim(strip_tags($_POST['email']));
          $comments = trim(strip_tags($_POST['comments']));
          $to = $email;
          $subject = "Holocaust Education Foundation Contact Form";
          $message = "
            <html>
            <head>
            <title>Holocaust Education Foundation Contact Form</title>
            </head>
            <body>
            <p>Thank you for reaching out!  Here is a copy of your submission.</p>
            <table>
            <tr>
            <th>Name: </th>
            <td>".$name."</td>
            </tr>
            <tr>
            <th>Email: </th>
            <td>".$email."</td>
            </tr>
            <tr>
            <th>Comments: </th>
            <td>".$comments."</td>
            </tr>
            </table>
            </body>
            </html>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            /*$headers .= 'From: hedfd@hotmail.com' . "\r\n";
            $headers .= 'Bcc: hedfd@hotmail.com' . "\r\n";*/
            $headers .= 'From: cohlsson55@gmail.com' . "\r\n";
            $headers .= 'Bcc: cohlsson55@gmail.com' . "\r\n";

            mail($to,$subject,$message,$headers);
            echo "<p>Thank you for reaching out!</p>";
        }
      }else{
      ?>
      <div class="hef-post">
        <form action="" method="POST">
            <?php
            // This is just a hidden form field we will use for bot crawlers and try to prevent spam
            echo "<input type='hidden' name='catcher' id='catcher'>";
            ?>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Your Name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
          </div>
          <div class="form-group">
            <label for="comments">Comments</label>
            <textarea class="form-control" id="comments" name="comments" rows="3" required></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    <?php } ?>
    </div><!-- /.hef-main -->

    <aside class="col-md-4 hef-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="hef-mission-title">Mailing Address:</h4>
        <p class="mb-0 hef-mission-content">
          The Selden K. Smith Foundation for Holocaust Education<br>
          P.O. Box 25740<br>
          Columbia, SC 29224
        </p>
        <hr>
        <h4 class="hef-mission-title">Phone:</h4>
        <p class="mb-0 hef-mission-content">
          (803) 788-1280
        </p>
      </div>
    </aside><!-- /.hef-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="hef-footer">
  <p>The Selden K. Smith Foundation for Holocaust Education</p>
  <p><a href="https://www.facebook.com/seldensmitheducationfoundation/"><i style="font-size:24px" class="fa">&#xf082;</i></a></p>
</footer>
</body>
</html>
