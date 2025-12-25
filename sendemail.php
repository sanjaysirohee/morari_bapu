<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if (isset($_POST['vercode'])) {
  if ((empty($_SESSION["vercode"])) || ($_SESSION["vercode"] != $_POST['vercode'])) {
    die("<script>alert('Invalid Verification Code'); history.back();</script>");
  }
}

require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Base files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Read the form values

$firstname = isset($_POST['first_name']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['first_name']) : "";
$middlename = isset($_POST['middle_name']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['middle_name']) : "";
$lastname = isset($_POST['last_name']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['last_name']) : "";
$senderEmail = isset($_POST['main_email_id']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_email_id']) : "";
$userPhone = isset($_POST['main_phone_no']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_phone_no']) : "";
$altuserphone = isset($_POST['alt_phone_no']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['alt_phone_no']) : "";
$country = isset($_POST['country']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['country']) : "";
$state = isset($_POST['state']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['state']) : "";
$city = isset($_POST['city']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['city']) : "";
$idprooftype = isset($_POST['main_id_proof_type']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_id_proof_type']) : "";
$idno = isset($_POST['main_id_proof_no']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_id_proof_no']) : "";
$attend = isset($_POST['attend']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['attend']) : "";
$totalpeople = isset($_POST['total_people']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['total_people']) : "";
$stay = isset($_POST['stay']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['stay']) : "";
$arrivaldate = isset($_POST['arrival_date']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['arrival_date']) : "";
$departuredate = isset($_POST['departure_date']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['departure_date']) : "";
$address = isset($_POST['address']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['address']) : "";
// $message = isset($_POST['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message']) : "";
// $subjectV = isset($_POST['subjectV']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['subjectV']) : "";
// $userPage = isset($_POST['userPage']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['userPage']) : "";
// $requirements = isset($_POST['requirements']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['requirements']) : "";

 $isValidEmail = !empty($senderEmail) && filter_var($senderEmail, FILTER_VALIDATE_EMAIL);
if (!isset($_FILES['main_id_proof']) || !isset($_FILES['main_photo'])) {
    die("Main ID or Photo not uploaded!");
}

$idTmpPath = $_FILES['main_id_proof']['tmp_name'];
$idName = $_FILES['main_id_proof']['name'];
$idError = $_FILES['main_id_proof']['error'];


$photoTmpPath = $_FILES['main_photo']['tmp_name'];
$photoName = $_FILES['main_photo']['name'];
$photoError = $_FILES['main_photo']['error'];
$allowedTypes = [
  'image/jpeg',
  'image/png',
  'application/pdf'
];

$idType = mime_content_type($idTmpPath);
$photoType = mime_content_type($photoTmpPath);

if (!in_array($idType, $allowedTypes)) {
  die("<script>alert('Invalid ID file type'); history.back();</script>");
}

if (!in_array($photoType, $allowedTypes)) {
  die("<script>alert('Invalid photo file type'); history.back();</script>");
}



if ($idError === 0 && $photoError === 0 ) {
    $iduploadDir = "uploads/id/";
    $photouploadDir = "uploads/photo/";

    if (!is_dir($iduploadDir)) {
      mkdir($iduploadDir, 0777, true);
    }

    if (!is_dir($photouploadDir)) {
      mkdir($photouploadDir, 0777, true);
    }

    $idFileName = time() . "_" . basename($idName);
    $photoFileName = time() . "_" . basename($photoName);

    $iddestination = $iduploadDir . $idFileName;
    $photodestination = $photouploadDir . $photoFileName;




// Save data to database
if (move_uploaded_file($idTmpPath, $iddestination) && move_uploaded_file($photoTmpPath,$photodestination)) {
$stmt = $conn->prepare("INSERT INTO req_query_table (first_name, middle_name, last_name, email_id, phone_number, other_number, country, state, city, id_proof_type, id_proof_number,id_proof, attending, total_people_attending, staying, arrival_date, departure_date, photo,address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssssssssss", $firstname, $middlename, $lastname, $senderEmail, $userPhone, $altuserphone, $country, $state, $city, $idprooftype, $idno, $iddestination, $attend, $totalpeople, $stay,$arrivaldate, $departuredate, $photodestination, $address);


if ($stmt->execute()) {
    echo "Data savsed to database successfully<br>";
} else {
    echo "Database Error: " . $stmt->error;
}


$request_id = $conn->insert_id;

for ($i = 0; $i < count($_POST['full_name']); $i++) {

  $name = $_POST['full_name'][$i];
  $email = $_POST['email_id'][$i];
  $phone = $_POST['phone_number'][$i];
  $idType = $_POST['id_proof_type'][$i];
  $idNo = $_POST['id_proof_no'][$i];

  // files
  $idFileName = time().'_'.$_FILES['id_proof']['name'][$i];
  move_uploaded_file(
    $_FILES['id_proof']['tmp_name'][$i],
    "uploads/id/".$idFileName
  );

  $photoFileName = time().'_'.$_FILES['photo']['name'][$i];
  move_uploaded_file(
    $_FILES['photo']['tmp_name'][$i],
    "uploads/photo/".$photoFileName
  );

  // insert person
  $stmt2 = $conn->prepare("
    INSERT INTO req_people
    (request_id, full_name, email, phone, id_proof_type, id_proof_number, id_proof_file, photo)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  ");

  $stmt2->bind_param(
    "isssssss",
    $request_id,
    $name,
    $email,
    $phone,
    $idType,
    $idNo,
    $idFileName,
    $photoFileName
  );

  $stmt2->execute();
}



$stmt->close();
$conn->close();

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP(); // using SMTP protocol
        $mail->Host = '103.133.214.192'; // SMTP host as gmail
        $mail->SMTPAuth = true;  // enable smtp authentication
        $mail->Username = 'ragini.k@veloxn.com';  // sender gmail host
        $mail->Password = 'kR.pwd@121'; // sender gmail host password
        $mail->SMTPSecure = 'tls';  // for encrypted connection
        $mail->isHTML(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Port = 587;   // port for SMTP

      $AdminMessage=
        "<h3> New Message from Veloxn Private Limited</h3>
        <h3> {$firstname} has a Query</h3>
        <p><b>Name:</b> {$firstname}</p>
        <p><b>Phone no:</b> {$userPhone}</p>
        <p><b>Email:</b> {$senderEmail}</p>";


      $mail->setFrom('ragini.k@veloxn.com', "Veloxn Private Limited");
      if ($isValidEmail) $mail->addReplyTo($senderEmail, $firstname);
      $mail->addAddress('ragini.k@veloxn.com', "Admin");
      $mail->Subject = "New Registration";
      $mail->Body = $AdminMessage;
      try {
        $mail->send();
        // echo 'Admin email sent successfully';
        } catch (Exception $e) {
            echo "Admin Mailer Error: " . $mail->ErrorInfo;
        }

      if($isValidEmail){
        $userMail = new PHPMailer(true);
        $userMail->isSMTP();
        $userMail->Host = '103.133.214.192';
        $userMail->SMTPAuth = true;
        $userMail->Username = 'ragini.k@veloxn.com';
        $userMail->Password = 'kR.pwd@121';
        $userMail->SMTPSecure = 'tls';
        $userMail->Port = 587;
        $userMail->isHTML(true);
        $userMail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
        $userMessage=
          "<p>Dear <b>{$firstname}</b>,</p>
            <p>Thank you for reaching out to <b>Veloxn Private Limited</b>. We have received your message and will get back to you soon.</p>
            <p><b>Your Message:</b><br></p>
            <br><p>Best regards,<br><b>Veloxn Private Limited Team</b></p>";
            
        $userMail->setFrom('ragini.k@veloxn.com', "Veloxn Private Limited");
        $userMail->addAddress($senderEmail, $firstname);
        $userMail->Subject = 'Welcome to Veloxn Private Limited';
        $userMail->Body = $userMessage;
        try {
        $userMail->send();
        // echo 'User email sent successfully';
        } catch (Exception $e) {
            echo "User Mailer Error: " . $userMail->ErrorInfo;
        }
      }


// Send message to Whatsapp Code End

echo "<script>alert('Thank you! Your message has been sent successfully.'); window.location='index.html';</script>";
        // echo 'Message has been sent';
} catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
  } else {
        echo "Error moving uploaded file!";
    }
 
}else {
    echo "File upload error!";
}

?>