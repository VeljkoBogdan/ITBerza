<?php
session_start();

require 'db-config.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email, $v_cod){

    require ('vendor/PHPMailer/PHPMailer/src/PHPMailer.php');
    require ('vendor/PHPMailer/PHPMailer/src/Exception.php');
    require ('vendor/PHPMailer/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '22c4c0da32c879';
        $mail->Password = '4a9ef2fd22f86a';

        $mail->setFrom('webmaster@example.com', 'Webmaster');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification for Your Account';
        $mail->Body    = "Thanks for registration.<br>click the link bellow to verify the email address
            <a href='http://localhost:8000/post-email/verify.php?email=$email&v_cod=$v_cod'>verify</a><br><hr><br>If this is not you, ignore this email.";
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "<script>
                alert('error');
</script>";
        return false;

    }
}

if (isset($_POST['login'])) {

    $email_username = $_POST['email'];
    $password_login = $_POST['password'];

    $sql="SELECT * FROM users WHERE email = '$email_username' AND password = '$password_login' AND verification_status = '1'";
    $result = $conn->query($sql);

    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['logged_in']=TRUE;
        $_SESSION['email']=$row['email'];
        header('location:index.php');
    }else{
        echo "
                <script>
                    alert('Please verify your account!');
                    window.location.href='login.php'
                </script>";
    }
}

if (isset($_POST['signup'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $telephone = $_POST['telephone'];

    $user_exist_query = "SELECT * FROM users WHERE email = '$email' ";
    $result = $conn->query($user_exist_query);

    if ($result) {
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row['email'] === $email) {
                echo "
                        <script>
                            alert('Email already taken!');
                            window.location.href='index.php'
                        </script>";
            }
        }
        else{
            try {
                $v_cod = bin2hex(random_bytes(16));
            } catch (\Exception $e) {
            }

            $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `telephone`, `biography`, `is_banned`, `verification_id`, `verification_status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $insertConfirmation = $stmt->execute([$firstName, $lastName, $email, $password, $telephone, 'null', 0, $v_cod, 0]);

            $mailConfirmation = sendmail($email,$v_cod);

            if ($insertConfirmation === TRUE && $mailConfirmation === TRUE) {
                echo "
                        <script>
                            alert('Register successful. Check your email and verify your account.');
                                window.location.href='index.php'
                        </script>";
            }else{
                echo "
                        <script>
                            alert('Couldn\'t send mail!');
                            window.location.href='index.php'
                        </script>";
            }
        }
    }else{
        echo "
            <script>
                alert('Couldn\'t retrieve emails!');
                window.location.href='index.php'
            </script>";
    }
}
