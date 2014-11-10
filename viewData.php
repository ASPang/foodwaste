<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Magic Bin for Food Waste</title>

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/styles.css" />

        <!-- JavaScript -->
        <script src="js/vendor/modernizr.js"></script>

        <!-- Google API Script (Needs to be loaded before "myscript.js") -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    </head>


    <body>
        <!--Header -->
        <?php include 'header.php' ?>

        <div class="row">
                <aside class="large-3 columns">
                    <h5>Data</h5>
                    <ul class="side-nav">
                        <li><a href="#dayResult">Today</a></li>
                        <li><a href="#weekResult">Weekly</a></li>
                        <li><a href="#monthResult">Monthly</a></li>
                    </ul>
                </aside>

            <div class="large-9 columns">
                <div class="row">
                    <div id="dayResult"></div>
                </div>
                <div class="row">
                    <div id="weekResult"></div>
                </div>
                <div class="row">
                    <div id="monthResult"></div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include 'footer.php' ?>


        <!-- Connect to Database -->
        <?php
            $datalist = array();
            
            // Create connection
            $conn = new mysqli("localhost", "idk2008_fwAdmin", "food123", "idk2008_foodwaste");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            //Script to get data
            $query = "SELECT * FROM MagicBin 
                        WHERE Date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
                        AND Date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
                        ORDER BY Date ASC ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            while ($row != null) {
                $line = array();
                foreach ($row as $cell) {
                    array_push($line, $cell);
                }
                array_push($datalist, $line);

                unset($line);
                $row = mysqli_fetch_assoc($result);
            }
        ?>

        <!-- Javascript -->
        <script>
            document.write('<script src=js/vendor/' +
                    ('__proto__' in {} ? 'zepto' : 'jquery') +
                    '.js><\/script>')
        </script>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
        <script src="js/foundation/jquery.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/viewData.js"></script>
        <script>
            $(document).foundation();

            var doc = document.documentElement;
            doc.setAttribute('data-useragent', navigator.userAgent);

            //Create Java/php variables
            var dataList = <?php echo json_encode($datalist) ?>;
            drawWeekData(dataList);


        </script>
        
        <!-- Day Data Query -->
        <?php unset($dataList) ?>
        
        <?php
            $dataListDay = array();
            
            //Script to get data
            $query = "SELECT * FROM MagicBin 
                WHERE Date = curdate() 
                ORDER BY Date ASC ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            while ($row != null) {
                $line = array();
                foreach ($row as $cell) {
                    array_push($line, $cell);
                }
                array_push($dataListDay, $line);

                unset($line);
                $row = mysqli_fetch_assoc($result);
            }
        ?>
        
        <script>
            $(document).foundation();

            var doc = document.documentElement;
            doc.setAttribute('data-useragent', navigator.userAgent);

            //Create Java/php variables
            
            var dataList = <?php echo json_encode($dataListDay) ?>;
            drawTodayData(dataList);
        </script>
        
        <!-- Month Data Query -->
        <?php unset($dataList) ?>
        
        <?php
            $dataListMonth = array();
            
            //Script to get data
            $query = "SELECT * FROM MagicBin 
                WHERE YEAR(date) = YEAR(CURDATE()) 
                ORDER BY Date ASC  ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            while ($row != null) {
                $line = array();
                foreach ($row as $cell) {
                    array_push($line, $cell);
                }
                array_push($dataListMonth, $line);

                unset($line);
                $row = mysqli_fetch_assoc($result);
            }
        ?>
        
        <script>
            $(document).foundation();

            var doc = document.documentElement;
            doc.setAttribute('data-useragent', navigator.userAgent);

            //Create Java/php variables
            
            var dataList = <?php echo json_encode($dataListMonth) ?>;
            drawMonthData(dataList);
        </script>
        
    </body>
</html>