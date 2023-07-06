<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>


        <?php

        // function evenAndOdd($number)
        // {

        //     if ($number % 2 == 0) {
        //         echo "$number is even number";
        //     } else {
        //         echo "$number is odd number";
        //     }
        // }

        // evenAndOdd(11);

        // function even($num){

        //     }
        // }

        // function newFunc($i)
        // {

        //     for ($i = 1; $i < 100; $i++) {
        //         if ($i % 2 == 0) {
        //             echo "$i is even <br>";
        //         }
        //     }
        // }

        // newFunc(100);

        // echo $_SERVER['PHP_SELF'];
        // echo '<br>';
        // echo $_SERVER['SERVER_NAME'];
        // echo '<br>';
        // echo $_SERVER['HTTP_HOST'];
        // echo '<br>';
        // echo $_SERVER['HTTP_REFERER'];
        // echo "<br>";
        // echo $_SERVER['HTTP_USER_AGENT'];
        // echo "<br>";
        // echo $_SERVER['SCRIPT_NAME'];


        // if (isset($_REQUEST['userName'])) {

        // }

        // if (isset($_REQUEST['userEmail'])) {

        // }



        // if (isset($_POST['formSubmit'])) {

        //     $name = $_POST['userName'];
        //     $email = $_POST['userEmail'];

        //     if (empty($name)) {
        //         echo "<span style ='color:red'>name required</span>";
        //     } elseif (empty($email)) {
        //         echo "email is required";
        //     } elseif (FILTER_VAR(FILTER_VALIDATE_EMAIL)) {
        //         echo "invalid email";
        //     }

        // }

        if (isset($_POST['submitForm'])) {

            $userName = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $userPhone = $_POST['number'];
            $userPass = $_POST['password'];
            $userCPass = $_POST['cPassword'];
            $message = $_POST['message'];
            $city = $_POST['city'];
            $gender = $_POST['gender'];
            $checkBox = isset($_POST['checkbox']);
            // echo $checkBox;

            if (empty($userName)) {
                $error = "Invalid user name";
            } elseif (empty($userEmail)) {
                $error = "Invalid user email";
            } elseif (!FILTER_VAR(FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email";
            } elseif (empty($userPhone)) {
                $error = "Invalid user number";
            } elseif (!is_numeric($userPhone)) {
                $error = "Please enter valid number";
            } elseif (strlen($userPhone) != 11) {
                $error = "Number must be 11 digit";
            }
            // elseif (!strlen($userPass) >= 5){
            //     $error = "Enter 8 char pass";
            // }

            elseif (strlen($userPass) <= 5 || strlen($userPass) > 8) {
                $error = "Please type 8 char pass";
            } elseif (empty($userPass) && empty($userCPass)) {
                $error = "Please enter pass";
            } elseif ($userPass !== $userCPass) {
                $error = "Password & Confirm Password must be same";
            } elseif ($checkBox != 1) {
                $error = "Please read and accept terms and conditions";
            } else {
                $to = 'razai.zim1@gmail.com';
                $subject = 'Test email send';
                $msg = 'Name: ' . $userName . "\r\n";
                $msg .= 'Email: ' . $userEmail . "\r\n";
                $msg .= 'Phone: ' . $userPhone . "\r\n";
                $msg .= 'Msg: ' . $message . "\r\n";
                $msg .= 'City: ' . $city . "\r\n";
                $msg .= 'Gender: ' . $gender . "\r\n";
                // echo $message;
                // echo $msg;

                $mail = mail($to, $subject, $msg);
                // echo $mail;
                if ($mail == true) {
                    $success = 'Mail Send successfully...';
                    unset($_POST);
                } else {
                    $error = 'Mail send fail!';
                }
            }
        }


        function setValue($name)
        {
            if (isset($_POST[$name])) {
                echo $_POST[$name];
            }
        }



        ?>

        <div class="container mt-4">
            <div class="col-md-7 offset-md-2">
                <h2 class="border-bottom pb-3 mb-3">Registration Form</h2>
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>

                            </div>
                        <?php endif; ?>

                        <?php if (isset($success)) : ?>
                            <div class="alert alert-success">
                                <?php echo $success; ?>
                            </div>
                        <?php endif; ?>


                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" value="<?php setValue('userName'); ?>" name="userName" id="name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" value="<?php setValue('userEmail'); ?>" name="userEmail" id="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone:</label>
                                <input type="number" class="form-control" value="<?php setValue('number'); ?>" name="number" id="number" placeholder="Number">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" value="<?php setValue('password'); ?>" name="password" id="name" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="cPassword" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" value="<?php setValue('cPassword'); ?>" name="cPassword" id="cPassword" placeholder="Confirm password">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message:</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Message"><?php setValue('message'); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="city" class="form-label">Select:</label>
                                    <select class="form-select form-select-lg" name="city" id="city">
                                        <?php if (isset($_POST['city'])) : ?>

                                            <option selected value="New Delhi"><?php echo $_POST['city']; ?></option>
                                        <?php endif; ?>
                                        <option>Select one</option>
                                        <option value="New Delhi">New Delhi</option>
                                        <option value="Istanbul">Istanbul</option>
                                        <option value="Jakarta">Jakarta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="select" class="form-label">Gender:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="female" name="gender" id="female" checked>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="male" name="gender" id="male">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="check" name="checkbox" checked>
                                    <label class="form-check-label" for="check">
                                        Accept terms and conditions
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input name="submitForm" type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>