<?php
  include("connect.php");

  // if( file_exists('/../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( '../assets/vendor/php-email-form/php-email-form.php' );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */


  // Email Penerima
  $receiver_email = "lexyp0359@gmail.com";

  // Nama pengirim
  $nama=$_POST["name"]; 

  // Nama Pengirim
  $sender_email=$_POST["email"];

  // Pesan yang dikirim
  $komen=$_POST["message"];

  // Keperluan Pengirim
  $keperluan=$_POST["subject"];

  $errors = [];

  if(empty($nama)) {
    $errors[] = "Nama kosong";
  }

  if(empty($email)) {
    $errors[] = "Email kosong";
  }

  if (empty($errors)) {
    $headers = ['From' => $sender_email, 'Reply-To' => $receiver_email, 'Content-type' => 'text/html; charset=utf-8'];
    $bodyParagraphs = ["Name: {$nama}", "Email: {$sender_email}", "Message:", $komen];
    $body = join(PHP_EOL, $bodyParagraphs);

    if (mail($receiver_email, $keperluan, $body, $headers)) {
        header('Location: index.html');
    } else {
        $errorMessage = 'Oops, something went wrong. Please try again later';
    }

  } else {

      $allErrors = join('<br/>', $errors);
      $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
  }

  $SQL="insert into kontak(nama,email,keperluan,pesan) values ('$nama','$sender_email','$keperluan','$komen')";
  mysqli_query($koneksi,$SQL);

  header('Location: ../index.html');
?>
