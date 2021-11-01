<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="5; url=https://school-timetable.vercel.app/S10-9010132/all">  -->

    <title>남해정보산업고등학교 급식표</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>

</head>

<body>

    <!-- PHP코드 -->
    <?php
    //error_reporting(E_ALL);
    //ini_set("display_errors", 1);


    // $date = date("Ymd", time() ' +1 day');
    $date = date("Ymd", time());
    $ScCode = 'S10';
    $SdCode = '9010132';
    $grade = NULL;
    $class = NULL;

    //if($grade == NULL) $grade = 2;
    //if($class == NULL) $class = 1;

    $table = [];
    $meal = [];
    require("Snoopy.class.php");

    $URL = "https://open.neis.go.kr/hub/mealServiceDietInfo?KEY=2d4fce9a93674075895a2c89338434c0&Type=json&ATPT_OFCDC_SC_CODE=$ScCode&SD_SCHUL_CODE=$SdCode&MLSV_YMD=$date";
    $snoopy = new Snoopy; // snoopy 생성
    $snoopy->fetch($URL);
    $return = json_decode($snoopy->results);
    $meal = explode("<br/>", $return->mealServiceDietInfo[1]->row[0]->DDISH_NM);

    ?>


    <div class="container-fluid text-center">
        <h1 style="padding-top: 15px;">남해정보산업고등학교</h1>
    </div>

        <div class="container-fluid text-center">
            <div class="row">

            
                <div class="col-lg-4">
                    <h1 class="text-center">급식표</h1>
                    <?php for ($i = 0; $i < sizeof($meal); $i++) {
                        echo '<p>' . preg_replace("/[0-9,.]/", "", $meal[$i]) . '</p>';
                    } ?>
                </div>


            </div>
        </div>

    <footer>
        <div class="footer-credit">
            <div class="center-wrap">
                <p class="footer-credit-content"><strong class="footer-credit-name">STAVE</strong>Producer : <a href="https://github.com/JoonsungUm">Joonsung Um</a>, <a href="https://github.com/STAVELEE">Jihwan Lee</a>
                </p>
                <div class="footer-credit-copyright">Copyright © Stave Lee. All Rights Reserved.</div>
            </div>
        </div>
    </footer>
</body>



</html>