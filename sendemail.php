<?php
ini_set('memory_limit', '128M');

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

$firstname = isset($_POST['main_first_name']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_first_name']) : "";
$middlename = isset($_POST['main_middle_name']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_middle_name']) : "";
$lastname = isset($_POST['main_last_name']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_last_name']) : "";
$senderEmail = isset($_POST['main_email_id']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_email_id']) : "";
$userPhone = isset($_POST['main_phone_no'])? preg_replace("/[^0-9]/", "", $_POST['main_phone_no']): "";
$countryCode = isset($_POST['countryCode']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['countryCode']) : "";
$gender = isset($_POST['main_gender']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_gender']) : "";
$age = isset($_POST['main_age']) ? preg_replace("/[^0-9]/", "", $_POST['main_age']) : "";
$country = isset($_POST['country']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['country']) : "";
$state = isset($_POST['state']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['state']) : "";
$city = isset($_POST['city']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['city']) : "";
$idprooftype = isset($_POST['main_id_proof_type']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_id_proof_type']) : "";
$idno = isset($_POST['main_id_proof_no']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['main_id_proof_no']) : "";
$guest = isset($_POST['total_people']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['total_people']) : "";
$arrivaldate = isset($_POST['arrival_date']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['arrival_date']) : "";
$departuredate = isset($_POST['departure_date']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['departure_date']) : "";
$address = isset($_POST['address']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['address']) : "";
// $message = isset($_POST['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message']) : "";
// $subjectV = isset($_POST['subjectV']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['subjectV']) : "";
// $userPage = isset($_POST['userPage']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['userPage']) : "";
// $requirements = isset($_POST['requirements']) ? preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['requirements']) : "";

$phonenumber=mysqli_query($conn,"select id from req_query_table where phone_number=${userPhone}");
$phonerow=mysqli_fetch_assoc($phonenumber);

if($phonerow!=null){
  echo "<script>alert('This Mobile number already exist. Try to register from different number'); window.location='warning.html';</script>";
  exit();
}
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
$idallowedTypes = [
  'image/jpeg',
  'image/png',
  'application/pdf'
];
$photoallowedTypes = [
  'image/jpg',
  'image/jpeg',
  'image/png',
];

$idType = $_FILES['main_id_proof']['type'];
$photoType = $_FILES['main_photo']['type'];

if (!in_array($idType, $idallowedTypes)) {
    die("<script>alert('Invalid ID file type'); history.back();</script>");
}

if (!in_array($photoType, $photoallowedTypes)) {
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
$stmt = $conn->prepare("INSERT INTO req_query_table (first_name, middle_name, last_name, email_id, country_code, phone_number, gender, age, country, state, city, id_proof_type, id_proof_number,id_proof, total_people_attending, arrival_date, departure_date, photo,address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssssssssss", $firstname, $middlename, $lastname, $senderEmail, $countryCode, $userPhone, $gender, $age, $country, $state, $city, $idprooftype, $idno, $iddestination, $guest,$arrivaldate, $departuredate, $photodestination, $address);


if ($stmt->execute()) {
    echo " ";
} else {
    echo "Database Error: " . $stmt->error;
}


$request_id = $conn->insert_id;
$no_of_guest= isset($_POST['first_name']) ? count($_POST['first_name']) : 0;
$peopleIdFiles = [];
$peoplePhotoFiles = [];
if($no_of_guest!=null){
   for ($i = 0; $i < $no_of_guest; $i++) {
  
            $guestidFileName = time().'_'.$i.'_'.$_FILES['id_proof']['name'][$i];
            $guestidPath = "uploads/id/".$guestidFileName;
  
            move_uploaded_file($_FILES['id_proof']['tmp_name'][$i], $guestidPath);
  
            $guestphotoFileName = time().'_'.$i.'_'.$_FILES['photo']['name'][$i];
            $guestphotoPath = "uploads/photo/".$guestphotoFileName;
  
            move_uploaded_file($_FILES['photo']['tmp_name'][$i], $guestphotoPath);
  
            // save paths
            $peopleIdFiles[$i] = $guestidPath;
            $peoplePhotoFiles[$i] = $guestphotoPath;
          }

  for ($i = 0; $i <$no_of_guest; $i++) {
  
    $guestfirstname = $_POST['first_name'][$i];
    $guestmiddlename = $_POST['middle_name'][$i];
    $guestlastname = $_POST['last_name'][$i];
    $guestage = $_POST['age'][$i];
    $guestgender=$_POST['gender'][$i];
    $idType = $_POST['id_proof_type'][$i];
    $idNo = $_POST['id_proof_no'][$i];
  
  
    // insert person
    $stmt2 = $conn->prepare("
      INSERT INTO req_people
      (request_id, first_name, middle_name, last_name, gender, age, id_proof_type, id_proof_number, id_proof_file, photo)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)
    ");
  
    $stmt2->bind_param(
      "isssssssss",
      $request_id,
      $guestfirstname,
      $guestmiddlename,
      $guestlastname,
      $guestgender,
      $guestage,
      $idType,
      $idNo,
      $peopleIdFiles[$i],  
      $peoplePhotoFiles[$i] 
    );
  
  
    $stmt2->execute();
  }
}


$nid = mysqli_query(
  $conn,
  "SELECT id FROM req_query_table WHERE phone_number = '$userPhone'"
);

$row = mysqli_fetch_assoc($nid);
$id = $row['id'];
$stmt->close();
$conn->close();

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP(); // using SMTP protocol
        $mail->Host = 'mail.crmwala.com'; // SMTP host as gmail
        $mail->SMTPAuth = true;  // enable smtp authentication
        $mail->Username = 'emails@crmwala.com';  // sender gmail host
        $mail->Password = 'rkt.email@121'; // sender gmail host password
        $mail->SMTPSecure = 'ssl';  // for encrypted connection
        $mail->isHTML(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Port = 465;   // port for SMTP

      $AdminMessage=
        "<h3> New Registration of {$firstname}</h3>
        <h3>{$firstname} information</h3>
        <p><b>Name:</b> {$firstname} {$middlename} {$lastname}</p>
        <p><b>Country Code:</b> {$countryCode}</p>
        <p><b>Phone Number:</b> {$userPhone}</p>
        <p><b>Email Id:</b> {$senderEmail}</p>
        <p><b>Age:</b> {$age}</p>
        <p><b>Gender:</b> {$gender}</p>
        <p><b>Country:</b> {$country}</p>
        <p><b>State:</b> {$state}</p>
        <p><b>City:</b> {$city}</p>
        <p><b>Id Proof Submitted:</b> {$idprooftype}</p>
        <p><b>Id No:</b> {$idno}</p>
        <p><b>Total People Attending:</b> {$guest }</p>
        <p><b>Arrival Date:</b> {$arrivaldate}</p>
        <p><b>Departure Date:</b> {$departuredate}</p>
        <p><b>Address:</b> {$address}</p>
        
        "
        ;


        $peopleInfo = "<h3>Attending People</h3>";
        if($no_of_guest!=null){

                  for ($i = 0; $i < $no_of_guest; $i++) {
          
                    $peopleInfo .= "
                      <hr>
                      <p><b>Name:</b> {$_POST['first_name'][$i]} {$_POST['middle_name'][$i]} {$_POST['last_name'][$i]}</p>
                      <p><b>Age: </b>{$_POST['age'][$i]}</p>
                      <p><b>Gender: </b>{$_POST['gender'][$i]}</p>
                      <p><b>Id Proof:</b> {$_POST['id_proof_type'][$i]}</p>
                      <p><b>Id number:</b> {$_POST['id_proof_no'][$i]}</p>
                    ";
                    if (!empty($peopleIdFiles[$i]) && file_exists($peopleIdFiles[$i])) {
                      $mail->addAttachment(
                        $peopleIdFiles[$i],
                        $_POST['first_name'][$i]. $_POST['last_name'][$i] . "_ID_" . $_POST['id_proof_type'][$i] . ".pdf"
                      );
                    }
          
                    if (!empty($peoplePhotoFiles[$i]) && file_exists($peoplePhotoFiles[$i])) {
                      $mail->addAttachment(
                        $peoplePhotoFiles[$i],
                        $_POST['first_name'][$i]. $_POST['last_name'][$i] . "_Photo.jpg"
                      );
                    }
          
                  }
        }



      $mail->setFrom('emails@crmwala.com', "Ram Katha Samiti, Delhi");
      if ($isValidEmail) $mail->addReplyTo($senderEmail, $firstname);
      $mail->addAddress('emails@crmwala.com', "Admin");
      $mail->Subject = "New Registration";
      $mail->Body = $AdminMessage . $peopleInfo;
      $mail->addAttachment($iddestination, $firstname."_ID_" . $idprooftype . ".pdf");
      $mail->addAttachment($photodestination, $firstname. "_Photo.jpg");
      try {
        $mail->send();
        // echo 'Admin email sent successfully';
        } catch (Exception $e) {
            echo "Admin Mailer Error: " . $mail->ErrorInfo;
        }

      if($isValidEmail){
        $userMail = new PHPMailer(true);
        $userMail->isSMTP();
        $userMail->Host = 'mail.crmwala.com';
        $userMail->SMTPAuth = true;
        $userMail->Username = 'emails@crmwala.com';
        $userMail->Password = 'rkt.email@121';
        $userMail->SMTPSecure = 'ssl';
        $userMail->Port = 465;
        $userMail->isHTML(true);
        $userMail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
        
        $userMessage=
          "<p><b>Dear ${firstname} ${middlename} ${lastname}</b>,</p>
            <p>Your registration no. ${id} to attend Ram Katha in Delhi from ${arrivaldate} to ${departuredate} has been successfully completed.</p>
            <p>We welcome you to visit the Ram Katha Office for hotel confirmation.
            👉 Hotel allotment will be done on a first come, first basis.<br></p>
            <b>Please note:</b>
            <ul>
              <li>Accommodation will be provided on a sharing basis.</li>
              <li>Accommodation is subject to availability.</li>
              <li>The Ram Katha Samiti will try its best to accommodate maximum devotees.</li>
              <li>This registration is only for participation.</li>
              <li>Final accommodation allotment will be confirmed only after your arrival.</li>
            </ul>
            <p>We look forward to your presence and blessings.</p><br>
            <br><p>Jai Shri Ram 🙏<br><b>Ram Katha Samiti, Delhi</b></p>";
            
        $userMail->setFrom('emails@crmwala.com', "Ram Katha Samiti, Delhi");
        $userMail->addAddress($senderEmail, $firstname);
        $userMail->Subject = 'Your Registration is successful';
        $userMail->Body = $userMessage;
        try {
        $userMail->send();
        // echo 'User email sent successfully';
        } catch (Exception $e) {
            echo "User Mailer Error: " . $userMail->ErrorInfo;
        }
      }
      $otp=rand(1000,9999);
      $thanks_message="Dear ${firstname} ${middlename} ${lastname},
Your registration no. ${id} to attend Ram Katha in Delhi from ${arrivaldate} to ${departuredate} has been successfully completed. 

We welcome you to visit the Ram Katha Office for hotel confirmation.
👉 Hotel allotment will be done on a first come, first basis.

Please note:
  • Accommodation will be provided on a sharing basis.
  • Accommodation is subject to availability.
  • The Ram Katha Samiti will try its best to accommodate maximum devotees.
  • This registration is only for participation.
  • Final accommodation allotment will be confirmed only after your arrival.

We look forward to your presence and blessings.

Jai Shri Ram 🙏
Ram Katha Samiti, Delhi.";
      
      $Message = "&type=text&message=".urlencode($thanks_message);

      $url="https://chatbot.veloxn.com/api/send?number=91".$userPhone. $Message ."&instance_id=69562E7599185&access_token=6953c68f4d469";
      // $url = 'https://chatbot.veloxn.com/api/send?number=919315516129' . $Message . '&instance_id=6793404B6D5FB&access_token=6784c9e23c264';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
      }
      curl_close($ch);

// Send message to Whatsapp Code End

// echo "<script>alert('Thank you! Your message has been sent successfully.'); window.location='thankyou.html';</script>";
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
