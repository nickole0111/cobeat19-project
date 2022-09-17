<?php
// Load the database configuration file
include 'db.php';
 
$filename = "people_" . date('Y-m-d') . ".csv";
$delimiter = ",";
 
// Create a file pointer
$f = fopen('php://memory', 'w');
 
// Set column headers
$fields = array('Code', 'First Name','Middle Name','Last Name', 'Email', 'Address', 'Zone_id', 'City_id', 'Contact', 'Image Path', 'Vaccination Path');
fputcsv($f, $fields, $delimiter);
 
// Get records from the database
$result = mysqli_query($con,"SELECT * FROM people ORDER BY id DESC");
if(mysqli_num_rows($result) > 0){
// Output each row of the data, format line as csv and write to file pointer
while($row = mysqli_fetch_assoc($result)){
$lineData = array($row['code'], $row['firstname'], $row['middlename'], $row['lastname'], $row['email'], $row['address'], $row['zone_id'], $row['city_id'], $row['contact'], $row['image_path'], $row['vax_path']); 
}
}
 
// Move back to beginning of file
fseek($f, 0);
 
// Set headers to download file rather than displayed
header('Content-Type:text/csv');
header('Content-Disposition:attachment;filename="'.$filename.'";');
 
// Output all remaining data on a file pointer
fpassthru($f);
 
// Exit from file
exit();