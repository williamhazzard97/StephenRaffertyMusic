<?php

    $captcha;
    if(isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    }

    $secretKey = "6LefmrsaAAAAAD4_iSJpHOLQQLPfjzn1tYkD3cYY";

    $ip = $_SERVER['REMOTE_ADDR'];

    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);

    $response = file_get_contents($url);

    $responseKeys = json_decode($response,true);

    if($responseKeys["success"]) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $email_from = 'stephenraffertymusic.co.uk';

        $email_subject = "New Form Submission - stephenraffertymusic.co.uk";

        $email_body =   "Hi Stephen, \n".
                            "$message \n".
                                "From: $name \n".
                                    "Email: $email \n";

        $to = "stephenrafferty96@gmail.com";

        mail($to,$email_subject,$email_body);

        header("Location: /index.html");
    }

    else {
        echo '<h2>Verification Failed - Please check the box.</h2>';
    }
   

?>