<?php
/**
 * Send Mails
 */
class Mail {

  private $_mail;
  private $_username = 'charunaent@gmail.com';

  public function __construct($mail) {
    $this->_mail = $mail;

    $this->_mail->SMTPDebug = 0; // Enable verbose debug output change this to 1 on production
    $this->_mail->isSMTP(); // Set mailer to use SMTP

    $this->_mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $this->_mail->SMTPAuth = true; // Enable SMTP authentication
    $this->_mail->Username = $this->_username; // SMTP username
    $this->_mail->Password = ''; // SMTP password
    $this->_mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $this->_mail->Port = 587;
  }

  public function sender_and_reciver($send_content, $recive_email, $recive_name = null, $reply_content) {
    $this->_mail->setFrom($this->_username, $send_content);
    $this->_mail->addAddress($recive_email, $recive_name); // Name is optional
    $this->_mail->addReplyTo($this->_username, $reply_content);
  }

  public function content($subject, $body) {
    $this->_mail->isHTML(true); // Set email format to HTML
    $this->_mail->Subject = $subject;
    $this->_mail->Body = $body;
  }

  public function send() {
    if($this->_mail->send()) {
      # Display Link to email account
      echo "<script>alert('Email Send')</script>";
    } else {
      # Error while sending email
    }
  }

}

 ?>
