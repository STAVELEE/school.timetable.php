<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5; url=https://school-timetable.vercel.app/S10-9010132/all"> 

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

    $grade = $_GET['g'];
    $class = $_GET['c'];

    //if($grade == NULL) $grade = 2;
    //if($class == NULL) $class = 1;

    $table = [];
    $meal = [];
    require("Snoopy.class.php");

    // const response = await fetch(`https://open.neis.go.kr/hub/hisTimetable?Type=json&KEY=${NEIS_OPEN_API_KEY}&pIndex=1&pSize=1000&ATPT_OFCDC_SC_CODE=${schoolCode.split('-')[0]}&SD_SCHUL_CODE=${schoolCode.split('-')[1]}&ALL_TI_YMD=${timeCode}`)

    // 시간표 api 받아오기
    // $URL = "https://open.neis.go.kr/hub/hisTimetable?KEY=2d4fce9a93674075895a2c89338434c0&Type=json&ATPT_OFCDC_SC_CODE=$ScCode&SD_SCHUL_CODE=$SdCode&ALL_TI_YMD=$date&GRADE=$grade&CLASS_NM=$class";
    $URL = "https://open.neis.go.kr/hub/hisTimetable?KEY=2d4fce9a93674075895a2c89338434c0&Type=json&pIndex=1&pSize=1000&ATPT_OFCDC_SC_CODE=$ScCode&SD_SCHUL_CODE=$SdCode&ALL_TI_YMD=$date";
    $snoopy = new Snoopy; // snoopy 생성
    $snoopy->fetch($URL);
    $return = json_decode($snoopy->results);
    $max = (int)$return->hisTimetable[0]->head[0]->list_total_count;
    // for($i=1; $i<=$max; $i++) $table[$i] = $return->hisTimetable[1]->row[$i-1]->ITRT_CNTNT;
    $grade1class1 = array();
    $grade1class2 = array();
    $grade2class1 = array();
    $grade2class2 = array();
    $grade3class1 = array();
    $grade3class2 = array();

    $school = array();
    echo '<script>';
    echo 'console.dir(' . json_encode($grade2class1) . ')';
    echo '</script>';
    for ($i = 0; $i <= count($return->hisTimetable[1]->row); $i++) {
        if ($return->hisTimetable[1]->row[$i - 1]->GRADE == 1 && $return->hisTimetable[1]->row[$i]->CLASS_NM == 1) {
            array_push($grade1class1, $return->hisTimetable[1]->row[$i - 1]->ITRT_CNTNT);
        }
        if ($return->hisTimetable[1]->row[$i - 1]->GRADE == 1 && $return->hisTimetable[1]->row[$i]->CLASS_NM == 2) {
            array_push($grade1class2, $return->hisTimetable[1]->row[$i - 1]->ITRT_CNTNT);
        }
        if ($return->hisTimetable[1]->row[$i]->GRADE == 2 && $return->hisTimetable[1]->row[$i]->CLASS_NM == 1) {
            switch ($return->hisTimetable[1]->row[$i]->PERIO) {
                case "1":
                    $grade2class1[0] = $grade2class1[0] == "" ? $return->hisTimetable[1]->row[$i]->ITRT_CNTNT : $grade2class1[0] . ', ' . $return->hisTimetable[1]->row[$i]->ITRT_CNTNT;
                    break;
                case "2":
                    $grade2class1[1] = $grade2class1[1] == "" ? $return->hisTimetable[1]->row[$i]->ITRT_CNTNT : $grade2class1[1] . ', ' . $return->hisTimetable[1]->row[$i]->ITRT_CNTNT;
                    break;
                case "3":
                    $grade2class1[2] = $grade2class1[2] == "" ? $return->hisTimetable[1]->row[$i]->ITRT_CNTNT : $grade2class1[2] . ', ' . $return->hisTimetable[1]->row[$i]->ITRT_CNTNT;
                    break;
                case "4":
                    $grade2class1[3] = $grade2class1[3] == "" ? $return->hisTimetable[1]->row[$i]->ITRT_CNTNT : $grade2class1[3] . ', ' . $return->hisTimetable[1]->row[$i]->ITRT_CNTNT;
                    break;
                case "5":
                    $grade2class1[4] = $grade2class1[4] == "" ? $return->hisTimetable[1]->row[$i]->ITRT_CNTNT : $grade2class1[4] . ', ' . $return->hisTimetable[1]->row[$i]->ITRT_CNTNT;
                    break;
                case "6":
                    $grade2class1[5] = $grade2class1[5] == "" ? $return->hisTimetable[1]->row[$i]->ITRT_CNTNT : $grade2class1[5] . ', ' . $return->hisTimetable[1]->row[$i]->ITRT_CNTNT;
                    break;
                case "7":
                    $grade2class1[6] = $grade2class1[6] == "" ? $return->hisTimetable[1]->row[$i]->ITRT_CNTNT : $grade2class1[6] . ', ' . $return->hisTimetable[1]->row[$i]->ITRT_CNTNT;
                    break;
            }
        }
        if ($return->hisTimetable[1]->row[$i]->GRADE == 2 && $return->hisTimetable[1]->row[$i]->CLASS_NM == 2) {
            array_push($grade2class2, $return->hisTimetable[1]->row[$i]->ITRT_CNTNT);
        }
        if ($return->hisTimetable[1]->row[$i]->GRADE == 3 && $return->hisTimetable[1]->row[$i]->CLASS_NM == 1) {
            array_push($grade3class1, $return->hisTimetable[1]->row[$i]->ITRT_CNTNT);
        }
        if ($return->hisTimetable[1]->row[$i]->GRADE == 3 && $return->hisTimetable[1]->row[$i]->CLASS_NM == 2) {
            array_push($grade3class2, $return->hisTimetable[1]->row[$i]->ITRT_CNTNT);
        }
        array_push($school, $return->hisTimetable[1]->row[$i]);
    }
    echo '<script>';
    echo 'console.dir(' . json_encode($school) . ')';
    echo '</script>';


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