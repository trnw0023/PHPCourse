<?php
  var_dump($_POST);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $comments = $_POST['comments'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="media.css">
    <meta charset="UTF-8">
    <title>Thank You</title>
</head>
<body>

<?php include 'header.php'; ?>
  <div id="content">
    <h2>Account Information</h2>
    <label>Name:</label>
    <span><?php echo htmlspecialchars($name); ?></span>
    <br />

    <label>Phone Number:</label>
    <span><?php echo htmlspecialchars($phone);?></span>
    <br />

    <label>Email:</label>
    <span><?php echo htmlspecialchars($email);?></span>
    <br />

    <label>Comments:</label>
    <span><?php echo htmlspecialchars($comments);?></span>
    <br />
  </div>
<?php include 'footer.php'; ?>

</body>

</html>
