<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['nome']) && isset($_POST['email'])){
        $name = $_POST['nome'];
        $email = $_POST['email'];
        $subject = $_POST["Denuncia"];
        $body = $_POST['mensagem'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        $mail -> isSMTP();
        $mail -> Host = "smtp.gmail.com";
        $mail -> SMTPAuth = true;
        $mail -> Username = "contatopendoors@gmail.com";
        $mail -> Password = "openkey9700";
        $mail -> Port = 465;
        $mail -> SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("contatopendoors@gmail.com");
        $mail->Subject = ("$email ($subject)");
        $mail->Body = $body;

        if($mail->send()){
            echo '<script>' . 'alert ("enviado com sucesso!");' .  '</script>';
        }else{
            $status = "failed";
            $reponse = "Something is wrong: <br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "reponse" => $reponse)));
    }


?>