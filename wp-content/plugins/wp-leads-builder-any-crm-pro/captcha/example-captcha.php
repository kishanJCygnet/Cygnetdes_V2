<html>
  <body>
    <form action="" method="post">
<?php

/******************************************************************************************
 * Copyright (C) Smackcoders 2016 - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * You can contact Smackcoders at email address info@smackcoders.com.
 *******************************************************************************************/

require_once('recaptchalib.php');
$publickey = "6Ldi69ESAAAAAIijH1t2um6ULYt0HTAFbN9nMA9T";
$privatekey = "6Ldi69ESAAAAAPZ6H0lWtwmnxdII9t6iDw4Vykve";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        sanitize_text_field($_POST["recaptcha_challenge_field"]),
                                        sanitize_text_field($_POST["recaptcha_response_field"]));

print($_SERVER["REMOTE_ADDR"]."<br/>".sanitize_text_field($_POST["recaptcha_challenge_field"])."<br/>".sanitize_text_field($_POST["recaptcha_response_field"]));
        if ($resp->is_valid) {
                echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
    <br/>
    <input type="submit" value="submit" />
    </form>
  </body>
</html>
