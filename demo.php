<?php
  
// Allow requests from your frontend domain
header("Access-Control-Allow-Origin: https://foodtechkerala.com");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// Include PHPMailer for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/vendor/autoload.php';

$name = $_POST['name'] ?? '';
$designation_name = $_POST['designation_name'] ?? '';
$company_name = $_POST['company_name'] ?? '';
$city = $_POST['city'] ?? '';
$country = $_POST['country'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$profile = $_POST['profile'] ?? '';
$interest = $_POST['interest'] ?? '';

// Validate required fields
$errors = [];

if (empty($name)) $errors['name'] = "Name is required.";
if (empty($designation_name)) $errors['designation_name'] = "Designation Name is required.";
if (empty($company_name)) $errors['company_name'] = "Company Name is required.";
if (empty($city)) $errors['city'] = "City is required.";
if (empty($country)) $errors['country'] = "Country is required.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Valid Email is required.";
if (empty($phone)) $errors['phone'] = "Phone is required.";

if (!empty($errors)) {
    echo json_encode(['errors' => $errors]);
    http_response_code(422);
    exit;
}



// $data = [
//     '$name' => $name , 
//     '$designation_name' => $designation_name , 
//     '$company_name' => $company_name , 
//     '$city' => $city , 
//     '$country' => $country , 
//     '$email' => $email , 
//     '$phone' => $phone , 
//         '$profile' => $profile ,
//             '$interest' => $interest ,
//     ] ;
    
//      echo json_encode(['abhiii data' => $data]);


try {
    include('config.php');
    
    // Get the last PRV number and increment
    $sql1 = "SELECT * FROM `visitors` ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();
    $total = $row['prv_number'] + 1;
 
    // Insert new visitor
    $sql = "INSERT INTO `visitors` (`id`, `name`, `designation_name`, `company_name`, `city`, `country`, `email`, `phone`, `profile`, `interest`,`prv_number`) VALUES
    (NULL, '$name', '$designation_name', '$company_name', '$city', '$country', '$email', '$phone', '$profile', '$interest','$total');";
    $conn->query($sql);
    
    // PHPMailer configuration
     $mail = new PHPMailer(true);

            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'asmitamdidm.info@gmail.com'; //    SMTPC EMAI' ID
            $mail->Password = 'meqokvozsvsheciz'; //    SMTPC PASSSWQOEESSDD
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($email, $name); // thsi is for whaer can emaIL SEND NAME AND EMAIL
            $mail->addAddress('abhichavda2004@gmail.com'); // this is email wher email was sending which email

    // $mail->addCC('asmitamdidm.info@gmail.com'); // CC
    // $mail->addCC('asmitaMDIDM.info@gmail.com');   // CC
    $mail->addReplyTo('info@foodtechkerala.com', 'FoodTech Kerala 2025');
    $mail->isHTML(true);
    $mail->Subject = 'Registration Confirmation - FoodTech Kerala 2025';

    // Updated Email Body as requested
    $mail->Body = "
    <html>
    <head>
        <title>FoodTech Kerala 2025</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { text-align: center; margin-bottom: 20px; }
            .content { line-height: 1.6; }
            .footer { margin-top: 30px; font-size: 12px; color: #666; }
            .badge-id { font-weight: bold; font-size: 18px; color: #0066cc; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>FOODTECH KERALA 2025</h2>
            </div>
            
            <div class='content'>
                <p>Dear $name,</p>
                
                <p>This is your registration confirmation for <strong>FoodTech Kerala 2025</strong></p>
                
                <p>Pre-Registered Visitor Badge ID – <span class='badge-id'>PVR $total</span></p>
                
                <p>On behalf of Team Cruz Expos, we hereby express our sincere gratitude for registering to attend the highly anticipated FoodTech Kerala 2025. We are thrilled to have you join us for this unique event in Kerala for the Food Processing Sector.</p>
                
                <p>We are pleased to inform that the exhibition will be held from 22nd to 24th May 2025, from 11.00 AM to 8.00 PM, at J. N. Intl Stadium, Kaloor, Cochin. With an extensive line up of exhibitors, technical sessions, and HT Kerala, FT Kerala 2025 promises to be a premier platform for networking, collaboration, and business opportunities.</p>
                
                <p>To ensure smooth access to the exhibition hall, you can pick-up your Pre-Registered Visitor Badge at the venue. Kindly reach out to our dedicated support staff at the venue for any assistance during your entry to the show.</p>
                
                <p>We are eagerly looking forward to your presence at FoodTech Kerala 2025.</p>
                
                <p>Thank you once again for registering for the show and we value your participation and look forward to welcoming you at the exhibition.</p>
            </div>
            
            <div class='footer'>
                <p><strong>Best Regards,</strong></p>
                <p>Team Cruz Expos<br>
                Cochin-682020<br>
                <strong>Mob:</strong> 8893304450, 8891304450</p>
            </div>
        </div>
    </body>
    </html>";

    // Send email
    // $mail->send();

    // // Send notification to admin
    // $adminMail = new PHPMailer(true);
    // $adminMail->isSMTP();
    // $adminMail->Host = 'smtp.gmail.com';
    // $adminMail->SMTPAuth = true;
    // $adminMail->Username = 'asmitamdidm.info@gmail.com';
    // $adminMail->Password = 'meqokvozsvsheciz';
    // $adminMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $adminMail->Port = 587;

    // $adminMail->setFrom('info@foodtechkerala.com', 'FoodTech Kerala 2025');
    // $adminMail->addAddress('asmitajethva51@gmail.com');
    // $adminMail->addAddress('asmitaMDIDM.info@gmail.com');
    // $adminMail->Subject = 'New Visitor Registration: ' . $name;
    
    // $adminMail->Body = "
    // <html>
    // <head>
    //     <title>New Visitor Registration</title>
    // </head>
    // <body>
    //     <h2>New Visitor Registration Details</h2>
    //     <p><strong>Name:</strong> $name</p>
    //     <p><strong>Designation:</strong> $designation_name</p>
    //     <p><strong>Company:</strong> $company_name</p>
    //     <p><strong>Email:</strong> $email</p>
    //     <p><strong>Phone:</strong> $phone</p>
    //     <p><strong>City:</strong> $city, $country</p>
    //     <p><strong>Visitor Profile:</strong> $profile</p>
    //     <p><strong>Area of Interest:</strong> $interest</p>
    //     <p><strong>PRV Number:</strong> $total</p>
    //     <p><strong>Registration Date:</strong> " . date('Y-m-d H:i:s') . "</p>
    // </body>
    // </html>";
    
    // $adminMail->isHTML(true);
    // $adminMail->send();
    
    

    echo json_encode(['success' => true, 'prv_number' => $total]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>