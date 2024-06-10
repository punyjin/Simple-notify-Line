<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scan System</title>

    <!-- กำหนด font template-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <!-- เรียกใช้ฟังชั่น Register (ถ้ามี)-->
    <script src="/assets/js/custom.js"></script>
    <!-- เรียกใช้ css template -->
    <link href="fonts/font.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="js/sweetalert.js"></script>
    <link href="css/sweetalert.css" rel="stylesheet">
    <style>
        .qr-code-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100%;
        }

        .spacer {
            flex-grow: 1;
        }
    </style>
</head>

<body class="bg-gradient-primary" style="background-image: url('https://img.freepik.com/free-vector/watercolor-international-cat-day-background_23-2149506124.jpg?size=626&ext=jpg&ga=GA1.1.1518270500.1717286400&semt=ais_user');">

    <div class="container">
        <!-- แถวนอก -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <br>
                        <div class="text-center">
                            <center>
                                <img src="img/logo.jpg" class="img-responsive" style="width:150px;"> <br>
                                <!-- <img src="img/banner.png" class="img-responsive" style="width:250px;"> -->
                                <br>
                                <div id="timeClock" style="font-size:30px;"></div>
                            </center>
                            <!-- Script เวลา -->
                            <script>
                                function myTimer() {
                                    var d = new Date();
                                    var options = {
                                        timeZone: 'Asia/Bangkok',
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        second: '2-digit',
                                        hour12: false
                                    };
                                    var timeString = d.toLocaleTimeString('en-GB', options);
                                    document.getElementById("timeClock").innerHTML = timeString;
                                }
                                var myVar = setInterval(myTimer, 1000);
                            </script>
                            <!-- End Script -->
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <?php if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <div>
                                            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <i class="fas fa-check-circle"></i>
                                        <div>
                                            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <form class="user" action="scan.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                style="font-size:42px;text-align:center;padding:30px;"
                                                placeholder="รหัสนักศึกษา..." name="stu_code" maxlength="5" pattern="\d{1,5}"
                                                title="ต้องเป็นตัวเลข 1 ถึง 5 ตัว" autofocus required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            ตกลง
                                        </button>
                                        <hr>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Core -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
</body>

</html>
