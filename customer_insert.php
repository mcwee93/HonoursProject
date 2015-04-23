<?php
/* Set e-mail recipient */
$adminmail = "s.mcwee@hotmail.co.uk";
$subject = "New Customer Enquiry";

/* Check all form inputs using check_input function */
$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$message= $_POST['message'];


/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("E-mail address not valid");
}
/* Let's prepare the message for the e-mail */
$message1 = "

Name: $name
Telephone No.:$number
E-mail: $email

Message:
$message

";
$message2 = "

Thank you for getting in touch $name, our team at Gold! will work on getting back to you as soon as possible. Below is a copy of your message.

Name: $name
E-mail: $email

Message:
$message

";
/* Send the message using mail() function */
mail($adminmail, $subject, $message1);
mail($email, $subject, $message2);

/* Redirect visitor to the thank you page */
header('Location: success.php');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>
<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>
</body>
</html>
<?php
exit();
}
?>