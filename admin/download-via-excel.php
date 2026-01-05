<?php
include './database/connectdb.php';
header('Content-Type:text/csv');
header('Content-Disposition: attachment;filename=guest.csv');

$output=fopen('php://output',"w");

if(isset($_GET['id'])){
$main_id=$_GET['id'];
fputcsv($output, [
    'S.No',
    'Registration No',
    'First Name',
    'Middle Name',
    'Last Name',
    'Email',
    'Country Code',
    'Phone',
    'Gender',
    'Age',
    'Country',
    'State',
    'City',
    'ID Proof Type',
    'ID Proof Number',
    'Total Guests',
    'Arrival Date',
    'Departure Date',
    'Address',
    'Hotel',
    'Submitted On'
]);

$query = mysqli_query($con, "SELECT * FROM req_query_table where id=$main_id");
$i = 1;

while ($row = mysqli_fetch_assoc($query)) {
    fputcsv($output, [
        $i++,
        $row['id'],
        $row['first_name'],
        $row['middle_name'],
        $row['last_name'],
        $row['email_id'],
        $row['country_code'],
        $row['phone_number'],
        $row['gender'],
        $row['age'],
        $row['country'],
        $row['state'],
        $row['city'],
        $row['id_proof_type'],
        $row['id_proof_number'],
        $row['total_people_attending'],
        $row['arrival_date'],
        $row['departure_date'],
        $row['address'],
        $row['hotel'],
        $row['submitted_on']
    ]);
}
    fputcsv($output,["This is the Coming Guest List"]);
    fputcsv($output, [
        'S.No',
        'Registration No',
        'Coming With',
        'First Name',
        'Middle Name',
        'Last Name',
        'Gender',
        'Age',
        'ID Proof Type',
        'ID Proof Number',
    ]);
    $guestquery=mysqli_query($con, "select * from req_people where request_id=$main_id");
    $i=1;
    while ($row = mysqli_fetch_assoc($guestquery)) {
    fputcsv($output, [
        $i++,
        $row['request_id']."_".$row['id'],
        $row['request_id'],
        $row['first_name'],
        $row['middle_name'],
        $row['last_name'],
        $row['gender'],
        $row['age'],
        $row['id_proof_type'],
        $row['id_proof_number']
    ]);
}
}
else{
fputcsv($output, [
    'S.No',
    'Registration No',
    'First Name',
    'Middle Name',
    'Last Name',
    'Email',
    'Country Code',
    'Phone',
    'Gender',
    'Age',
    'Country',
    'State',
    'City',
    'ID Proof Type',
    'ID Proof Number',
    'Total Guests',
    'Arrival Date',
    'Departure Date',
    'Address',
    'Hotel',
    'Submitted On'
]);

$query = mysqli_query($con, "SELECT * FROM req_query_table ORDER BY id DESC");
$i = 1;

while ($row = mysqli_fetch_assoc($query)) {
    fputcsv($output, [
        $i++,
        $row['id'],
        $row['first_name'],
        $row['middle_name'],
        $row['last_name'],
        $row['email_id'],
        $row['country_code'],
        $row['phone_number'],
        $row['gender'],
        $row['age'],
        $row['country'],
        $row['state'],
        $row['city'],
        $row['id_proof_type'],
        $row['id_proof_number'],
        $row['total_people_attending'],
        $row['arrival_date'],
        $row['departure_date'],
        $row['address'],
        $row['hotel'],
        $row['submitted_on']
    ]);
}
}




fclose($output);
exit;
?>