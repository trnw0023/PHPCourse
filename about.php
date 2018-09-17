<?php
//var_dump($_POST);
$passerr = $password = $email = $emailerr = $phone = $phoneerr = "";
$comments = $commentserr = $contact_via = $contacterr = "";

if(isset($_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];
    $contact_via = $_POST['contact_via'];
    $pattern = "/[a-zA-Z]{4,8}/";

    if(empty($password)){
        $passerr = "Please enter password";
    }elseif(!preg_match($pattern, $password)){
        $passerr = "Please enter password with letter only";
    }else {
        $passerr = "";
    }
    if($email == ""){
        $emailerr = "please enter email";
    } elseif(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
        $emailerr = "Please enter valid email";
    } else {
        $emailerr= '';
    }
    if($password == ""){
        $passerr = "please enter password";
    } elseif(!filter_input(INPUT_POST, 'password', FILTER_VALIDATE_PASSWORD)){
        $passerr = "Please enter valid password";
    } else {
        $passerr= '';
    }
    if($phone == ""){
        $phoneerr = "please enter phone";
    } else {
        $phoneerr= '';
    }
    if($comments == ""){
        $commentserr = "please enter your comment";
    } else {
        $phoneerr= '';
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
    <h2>Account Sign Up</h2>
    <form action="about.php" method="post">

    <fieldset>
    <legend>Account Information</legend>
        <label>E-Mail:</label>
        <input type="text" name="email" value="" class="textbox"/>
        <span><?php echo $emailerr; ?></span>
        <br />

        <label>Password:</label>
        <input type="text" name="password" value="<?php  echo $password; ?>" class="textbox"/>
        <span><?php echo $passerr; ?></span>
        <br />
        <label>Phone Number:</label>
        <input type="text" name="phone" value="" class="textbox"/>
        <span><?php echo $phoneerr; ?></span>
        <br />
    </fieldset>

    <fieldset>
    <legend>Settings</legend>

        <p>How did you hear about us?</p>
        <input type="radio" name="heard_from" value="Search Engine" />
        Search engine<br />
        <input type="radio" name="heard_from" value="Friend" />
        Word of mouth<br />
        <input type=radio name="heard_from" value="Other" />
        Other<br />

        <p>Would you like to receive announcements about new products
           and special offers?</p>
        <input type="checkbox" name="wants_updates"/>YES, I'd like to receive
        information about new products and special offers.<br />

        <p>Contact via:</p>
        <select name="contact_via">
                <option value="email">Email</option>
                <option value="text">Text Message</option>
                <option value="phone">Phone</option>
        </select>

        <p>Comments:</p>
        <textarea name="comments" rows="4" cols="50"></textarea>
        <span><?php echo $commentserr; ?></span>
        <br />
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
