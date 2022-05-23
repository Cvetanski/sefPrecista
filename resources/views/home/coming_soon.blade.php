<!DOCTYPE html>
<html lang="en">
<head>
    <title>Свештена Пречистанска Обител</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/coming-soon/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/coming-soon/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/coming-soon/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/main-coming-soon.css">
    <!--===============================================================================================-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">

    <style type="text/css">
        @font-face {
            font-family: mr_Miroslav;
            src: url('{{('/fonts/837-font.otf') }}');
        }
    </style>
</head>
<body>

<!--  -->
<div class="cover">
    <div class="cover-item bg-img1">
        <img src="{{ asset('/images/coverOriginal.jpeg') }}" style="margin-right: 50%" alt="tag">
    </div>
    <div class="simpleslide100-item bg-img1" style="background-image: url('images/bg02.jpg');"></div>
    <div class="simpleslide100-item bg-img1" style="background-image: url('images/bg03.jpg');"></div>
</div>
<div class="size1 overlay1">
    <!--  -->
    <div class="size1 flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-50">
        <h3 class="l1-txt1 txt-center p-b-25">
            Свештена Пречистанска Обител
        </h3>

        <p class="m2-txt1 txt-center p-b-48">
            Наскоро!
        </p>

        <div class="flex-w flex-c-m cd100 p-b-33">
            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 days">60</span>
                <span class="s2-txt1">Денови</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 hours">10</span>
                <span class="s2-txt1">Часови</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 minutes">30</span>
                <span class="s2-txt1">Минути</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
                <span class="l2-txt1 p-b-9 seconds">39</span>
                <span class="s2-txt1">Секунди</span>
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="vendor/coming-soon/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/coming-soon/bootstrap/js/popper.js"></script>
<script src="vendor/coming-soon/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/coming-soon/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/coming-soon/countdowntime/moment.min.js"></script>
<script src="vendor/coming-soon/countdowntime/moment-timezone.min.js"></script>
<script src="vendor/coming-soon/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="vendor/coming-soon/countdowntime/countdowntime.js"></script>
<script>
    $('.cd100').countdown100({
        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: 0,
        endtimeMonth: 0,
        endtimeDate: 60,
        endtimeHours: 10,
        endtimeMinutes: 30,
        endtimeSeconds: 0,
        timeZone: ""
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });
</script>
<!--===============================================================================================-->
<script src="vendor/coming-soon/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
