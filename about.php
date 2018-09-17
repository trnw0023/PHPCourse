<?php
  $name = $nameerr = $email = $emailerr = $phone = $phoneerr = $comments = $commentserr = "";
  if($_SERVER['REQUEST_METHOD'] == "POST") {

    $valid = true;
    if(isset($_POST['register'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $comments = $_POST['comments'];
      $patternPhone = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/";
      $patternName = "/[a-zA-Z]/";

      if(empty($name)){
        $nameerr = "Please enter Name";
        $valid=false;
      } elseif(!preg_match($patternName, $name)){
        $nameerr = "Please enter name in Alphabets";
        $valid=false;
      } else {
        $nameerr = "";
      }

      if($email == ""){
        $emailerr = "Please enter Email";
        $valid=false;
      } elseif (!filter_input(INPUT_POST, 'Email', FILTER_VALIDATE_EMAIL)) {
        $emailerr = "Please enter valid email";
        $valid=false;
      } else {
        $emailerr = "";
      }

      if($phone == ""){
        $phoneerr = "Please enter Phone Number";
        $valid=false;
      } elseif(!preg_match($patternPhone, $phone)){
        $phoneerr = "Example: 416-444-4444";
        $valid=false;
      } else {
        $phoneerr = "";
      }

      if($comments == ""){
        $commentserr = "Please enter Comment";
        $valid=false;
      } else {
        $commentserr = "";
      }

      if($valid){
        header('location:display_results.php');
        exit();
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" media="all" href="media.css" />
  <title>Winston's Cafe</title>
</head>

<div id="wrapper">
  <?php require_once 'header.php'; ?>
  <?php include_once 'nav.php'; ?>

  <main>
    <div id="content">
    <h2>Questions or Concerns</h2>
    <form action="" method="post">

    <fieldset>
    <legend>Contact Information</legend>
        <label for="name">Name:</label> <br />
        <input type="text" name="name" value="<?php echo $name; ?>" class="textbox"/>
        <span class="error"><?php echo $nameerr; ?></span>
        <br /><br />

        <label for="email">Email:</label> <br />
        <input type="text" name="email" value="<?php echo $email; ?>" class="textbox"/>
        <span class="error"><?php echo $emailerr; ?></span>
        <br /><br />

        <label for="phone">Phone Number:</label> <br />
        <input type="text" name="phone" value="<?php echo $phone; ?>" class="textbox"/>
        <span class="error"><?php echo $phoneerr; ?></span>
        <br /><br />

        <label for="comments">Comments:</label> <br />
        <textarea name="comments" rows="4" cols="50" value="<?php echo $comments; ?>"></textarea>
        <span class="error"><?php echo $commentserr; ?></span>
    </fieldset>

    <input type="submit" value="Submit" name="register"/>

    </form>
    <br />
    </div>

  </main>

  <navigation>
    <?php include_once 'nav.php'; ?>
  </navigation>

  <footer>
    <?php include 'footer.php'; ?>
  </footer>

</body>
</html>
