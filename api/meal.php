<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="10; url=https://school-timetable.vercel.app/S10-9010132/all">

    <title>남해정보산업고등학교 급식표</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    date_default_timezone_set("Asia/Seoul");
    $toDay = date('Ymd');
    $ScCode = 'S10';
    $SdCode = '9010132';

    $table = [];
    $meal = [];
    require("Snoopy.class.php");

    $URL = "http://open.neis.go.kr/hub/mealServiceDietInfo?KEY=2d4fce9a93674075895a2c89338434c0&Type=json&ATPT_OFCDC_SC_CODE=$ScCode&SD_SCHUL_CODE=$SdCode&MLSV_YMD=$toDay";

    $snoopy = new Snoopy;
    $snoopy->fetch($URL);
    $return = json_decode($snoopy->results);

    $lunch = explode("<br/>", $return->mealServiceDietInfo[1]->row[0]->DDISH_NM);
    $dinner = isset($return->mealServiceDietInfo[1]->row[1])
        ? explode("<br/>", $return->mealServiceDietInfo[1]->row[1]->DDISH_NM)
        : [];
    ?>

    <style>
        @import url('https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css');

        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', Pretendard, Roboto, 'Noto Sans KR', 'Segoe UI', 'Malgun Gothic', sans-serif;

        }

        .lead {
            font-size: 28px;
            font-weight: 600;
        }
    </style>

    <div class="px-4 py-5 my-5 text-center">
        <h3 style="font-size: 18px;">남해정보산업고등학교</h3>
        <h1 class="display-5 fw-bold">급식표</h1>
        <br>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
            <div class="col-lg-6 mx-auto feature col">
                <h2 class="display-6 fw-bold">점심</h2>
                <?php for ($i = 0; $i < sizeof($lunch); $i++) {
                    echo '<p class="lead">' . preg_replace("/[0-9,.@#]/", "", $lunch[$i]) . '</p>';
                } ?>
            </div>
            <br>
            <?php if (sizeof($dinner) > 1) : ?>
                <div class="col-lg-6 mx-auto feature col">
                    <h2 class="display-6 fw-bold">저녁</h2>
                    <?php for ($i = 0; $i < sizeof($dinner); $i++) {
                        echo '<p class="lead">' . preg_replace("/[0-9,.@#]/", "", $dinner[$i]) . '</p>';
                    } ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <span class="text-muted">© 2021 Stave, Lee</span>
            </div>


        </footer>
    </div>
</body>



</html>