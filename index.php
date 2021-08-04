<?php 

require './files/countries.php';


/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';
require '';*/

if(isset($_POST['name'],$_POST['gender'],$_POST['email'],$_POST['country'],$_POST['subject'])){

    $name = htmlspecialchars(strip_tags(trim($_POST['name'])),ENT_QUOTES);
    $gender = htmlspecialchars(strip_tags(trim($_POST['gender'])),ENT_QUOTES);
    $mail = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $country = htmlspecialchars(strip_tags(trim($_POST['country'])),ENT_QUOTES);
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])),ENT_QUOTES);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])),ENT_QUOTES);

    
    if(!empty($name) && !empty($gender) && !empty($mail) && !empty($country) && !empty($message)){

            $to = "roosalain17@yahoo.fr";
            $mailserver = "web2020.alain@gmail.com";
            
            $headers = 'From: ' . $mailserver . "\r\n" . 
                        'Reply-to: ' . $mail . "\r\n" . 
                        'X-Mailer: PHP/' . phpversion();
                           
            $send = @mail( $to,$subject, $message,$headers);



            if($send){
                echo "<div class='container-fluid mt-5 pt-5>
                            <div class='row text-center mt-5'>
                                <div class='alert alert-success text-center mx-auto'>
                                    <h2 class='display-4'>Your email has been sent</h2>
                                    <a href='' class='h3'>Back to form</a>
                                </div>
                            </div>
                        </div>";
            }
            else{
                echo "<div class='container-fluid mt-5 pt-5>
                            <div class='row text-center mt-5'>
                                <div class='alert alert-danger text-center mx-auto'>
                                    <h2 class='display-4'>The email could not be sent. Try again</h2>
                                    <a href='' onclick='window.history.go(-1); return false' class='h3'>Back to form</a>
                                </div>
                            </div>
                        </div>";
            }
    }
    else{
        echo "<div class='container-fluid mt-5 pt-5>
                <div class='row text-center mt-5'>
                    <div class='alert alert-danger text-center mx-auto'>
                    <h2 class='display-4'>All the fields are required</h2>
                    <a href='' onclick='window.history.go(-1); return false' class='h3'>Back to form</a>
                    </div>
                </div>
            </div>";
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital@1&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>heckers</title>
</head>
<body>
    <div class="container">
    <header class>
        <?php 

        require "./files/header.php";

        ?>
        <h1 class="mt-5">CONTACT US</h1>
    </header>
    <div class="container mt-3 mb-5">
        <form action="" method="POST" class="mt-5 pt-5">
            <div class="mb-3">
                <label for="name" class="form-label">Name and last name *</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name and last name" placeholder="John Doe">
            </div>
            <div class="mb-3">
                <select class="form-select" id="gender" name="gender" multiple aria-label="select a gender">
                    <option selected>select your gender *</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address *</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email address" placeholder="john.doe@domain.com" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your country *</label>
                <select class="form-select" id="country" name="country" multiple aria-label="select a country">
                    <option selected>Belgium</option>
                    <?php 
                    foreach($countries as $country){?>
                    <option value="<?php echo $country?>"><?php echo $country?></option>
                    <?php 
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Subject of your enquiry </label>
                <select class="form-select" id="subject" name="subject" multiple aria-label="select a subject">
                    <option selected>select a subject</option>
                    <option value="My account">My account</option>
                    <option value="My bill">My bill</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your message *</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                <p class="small">* Required</p>
            </div>
            <div class="mb-3 text-center mt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>