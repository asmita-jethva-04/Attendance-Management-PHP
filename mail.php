
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require 'vendor/autoload.php';

        if (isset($_POST['SubmitButton'])) { // Check if form was submitted

            // this is for get post data form, inquaRY FORMMMMMMMMM

            $from = $_POST['from'];

            $to = $_POST['to'];

            $subject = $_POST['subject'];

            $description = $_POST['description'];

            //

            $mail = new PHPMailer(true);

            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'asmitajethva51@gmail.com'; //    SMTPC EMAI' ID
            $mail->Password = 'wicofzmxmpgekuvv'; //    SMTPC PASSSWQOEESSDD
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($from, $to, $subject, $description); // thsi is for whaer can emaIL SEND NAME AND EMAIL
            $mail->addAddress('asmitajethva51@gmail.com'); // this is email wher email was sending which email

            $mail->isHTML(true);
            $mail->Subject = 'Inquiry Website';
            $mail->Body = '
            <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mail Template</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>    
            <style>
                .header{
                    background-color:#000F17;
                    border-bottom:5px solid #D3EB7C;
                }
                .header i{
                    color:#D3EB7C;
                }
                .index{
                    background-image: url("images/bg.jpeg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    position: relative;
                    overflow: hidden;
                }
                .index h1{
                    font-size:80px;
                }
                .index i{
                    font-size:100px;
                    color:#D3EB7C;
                }
                .index .fa-tasks{
                    font-size:30px;
                    padding-top:30px;
                }
                .index span{
                    font-size:80px;
                }
                .index button{
                    background-color:#D3EB7C;
                }
                .detail{
                    background-color:#02151C;
                    color:white;
                }
                .detail span,h3{
                    color:#D3EB7C;
                }
                .detail .btn1{
                    background-color:#D3EB7C;
                    color:dark;
                }
            </style>
        </head>
        <body>
            <div classs="cotainer-fluid">
                <div class="row">
                    <div class="col-md-12 header text-center text-white py-4">
                       <center> <h1>Your<i>logo</i></h1> </center>
                    </div>
                    <div class="col-md-12 index text-center text-white py-5">
                        <center><i class="fa fa-tasks text-white" aria-hidden="true"></i>
                        <h1>Here is your</h1>
                        <h2><i>monthly bill</i></h2>
                        <span>****</span>
                        <p class="h1 mb-5">Date 5/10/202X</p>
                        <button class="btn text-black py-2 px-3">PRINT INVOICE</button></center>
                    </div>
                    <div class="col-md-12 text-right  detail px-5">
                        <p class="pt-5">Date 5/10/2024.<span>Invoice#98765</span></p>
                        <h3>Invoiced to:</h3>
                        <p>CLEARLY EYES</p>
                        <i>123 High Street,London,W1C 2HS</i>
                        <table class="table table-bordered mt-5 mb-5 ">
                            <thead>
                                <th>
                                    <td colspan="3">FULL PLAN PREMIUM</td>
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:20%">Unlimited deliveries</td>
                                    <td style="width:20%">1</td>
                                    <td>60$</td>
                                </tr>
                                <tr>
                                    <td>Unlimited subscribers</td>
                                    <td>1</td>
                                    <td>60$</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>TOTAL PRICE:</td>
                                    <td>120$</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pb-5">
                            <button class="btn btn1">DOWNLOAD INVOICE</button>
                            <button class="btn border-light text-light">HELP WITH INVOICE</button>
                        </div>
                    </div>   
                </div>
            </div>
        </body>
    </html>';
            // $mail->Body = '<strong> From :- </strong>' . $from . ' <br> <strong> To:- </strong> ' . $to . ' <br>  <strong> Subject:- </strong> ' . $subject . ' <br>  <strong> Description:- </strong> ' . $description;
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            if ($mail->send()) {
                echo '<script>

        alert("Thank you for visiting our website... we will contect you soon ... ");

      </script>';
            } else {
                echo '<script>

        alert("There was Internal error ... please try again .. ");

      </script>';
            }
        }

        ?>
