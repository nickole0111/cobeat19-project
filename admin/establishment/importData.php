<?php
// Load the database configuration file
include 'db.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id  = $line[0];
                $code   = $line[1];
                $name  = $line[2];
                $address  = $line[3];
                $city_id = $line[4];
                $zone_id = $line[5];
                $image_path = $line[6];
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM establishment WHERE code= '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE establishment SET id = '".$id."',code = '".$code."', name = '".$name."', address = '".$address."', city_id = '".$city_id."', zone_id = '".$zone_id."', image_path = '".$image_path."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO establishment (id, code, name, address, city_id, zone_id, image_path) VALUES ('".$id."','".$code."','".$name."','".$address."','".$city_id."','".$zone_id."','".$image_path."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: index.php".$qstring);