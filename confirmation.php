<?php
session_start();
require 'db-config.php';

$options = [
    'cost' => 10
];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_cod){

    require ('vendor/PHPMailer/PHPMailer/src/PHPMailer.php');
    require ('vendor/PHPMailer/PHPMailer/src/Exception.php');
    require ('vendor/PHPMailer/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
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
        $mail->Body    = "Thanks for registration.<br>Click the link to verify your email address:<br>
            <a href='http://localhost:63342/ITBerza/verify.php?email=$email&v_cod=$v_cod'>Verify</a><br><hr><br>If this is not you, ignore this email.";
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "<script>
                alert('Exception thrown');
</script>";
        return false;

    }
}
function passwordChange($email, $v_cod){

    require ('vendor/PHPMailer/PHPMailer/src/PHPMailer.php');
    require ('vendor/PHPMailer/PHPMailer/src/Exception.php');
    require ('vendor/PHPMailer/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '22c4c0da32c879';
        $mail->Password = '4a9ef2fd22f86a';

        $mail->setFrom('webmaster@example.com', 'Webmaster');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Forgot Password';
        $mail->Body    = "Click the link to change your password:<br>
            <a href='http://localhost:63342/ITBerza/change-password.php?email=$email&v_cod=$v_cod'>Change password</a><br><hr><br>If this is not you, ignore this email.";
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "<script>
                alert('Exception thrown');
</script>";
        return false;

    }
}

if (isset($_POST['login'])) {

    $email_username = $_POST['email'];
    $password_login = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email AND verification_status = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email_username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password_login, $row['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $row['email'];
        header('location: index.php');
    } else {
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
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options) ;
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

            $mailConfirmation = sendMail($email,$v_cod);

            if ($insertConfirmation === TRUE && $mailConfirmation === TRUE) {
                echo "
                        <script>
                            alert('Register successful. Check your email and verify your account.');
                                window.location.href='index.php'
                        </script>";
            }else{
                echo "
                        <script>
                            alert('Couldn\'t send mail! Contact an administrator!');
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
if (isset($_POST['forgot-password'])) {
    $email_username = trim($_POST['forgot-password-email']) ;

    $user_exist_query = "SELECT * FROM users WHERE email = '$email_username' ";
    $result = $conn->query($user_exist_query);

    if ($result) {
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if ($row['email'] == $email_username) {
                try {
                    $v_cod = $row['verification_id'];
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

                $mailConfirmation = passwordChange($email_username, $v_cod);

                if ($mailConfirmation === TRUE) {
                    echo "<script>
                            alert('Check your email and reset your password.');
                                window.location.href='index.php'
                        </script>";
                }else{
                    echo "<script>
                            alert('Couldn\'t send mail! Contact an administrator!');
                            window.location.href='index.php'
                        </script>";
                }
            }
        }
        else{
            echo "<script>
                      alert('This user doesn\'t exist!');
                      window.location.href='change-password-form.php'
                 </script>";
        }
    }
    else{
        echo "<script>
                alert('Couldn\'t retrieve emails!');
                window.location.href='index.php'
            </script>";
    }
}
if (isset($_POST['request-new-password'])) {
    $email_username = $_GET['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    $update = "UPDATE users SET password='$password' WHERE email = '$email_username'";
    $confirmation = $conn->query($update);
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email_username;
    header('location: index.php');
}