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

        <!-- Hero Section -->   
        <div class="row">
            <div class="large-12 columns">
                <ul class="example-orbit orbitProperties" data-orbit>
                    <li>
                        <!-- Google Chart -->

                        <?php
                        $datalist = array();


// Create connection
                        $conn = new mysqli("localhost", "root", "", "idk2008_foodwaste");

// Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $query = "SELECT * FROM MagicBin ";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);

                        while ($row != null) {
                            $line = array();
                            foreach ($row as $cell) {
                                //echo $cell;

                                array_push($line, $cell);
                            }
                            array_push($datalist, $line);
                            //print_r( $line);
                            unset($line);
                            $row = mysqli_fetch_assoc($result);
                        }
                        ?>


                        <div id="visualization"></div>
                        <div class="orbit-caption">
                            <h1>Current Trends</h1>
                            <h3>As of today Creelman's waste has doubled</h3>
                        </div>
                    </li>
                    <li class="active">
                        <div class="crop">
                            <img src="img/foodwaste21.jpg" alt="slide 1" />
                        </div>
                        <div class="orbit-caption">
                            <h1>Number of Food Wasters</h1>
                            <h3>If you can't finish it then save it!</h3>
                        </div>

                    </li>
                    <li>
                        <div class="crop">
                            <img src="img/foodwaste21.jpg" alt="slide 1" />
                        </div>
                        <div class="orbit-caption">
                            <h1>Weekly Stat</h1>
                            <h3>Food waste over the week has been steady</h3>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="infoRow row">
            <div id="enterInfo" class="large-12 columns">
                <h1>Take a Stand!</h1>
                <h3>Help the University with reducing the amount of food waste.</h3>
                <a href="#">Read More</a>
            </div><!--columns-->
        </div><!--row-->

        <!-- Three Bars at the bottom -->
        <div class="row">
            <div class="large-4 columns">
                <img src="http://placehold.it/400x300&text=[img]"/>
                <h4>Get the Latest Information</h4>
                <p>
                    Curious about the amount of food wasted?  
                </p>
            </div>

            <div class="large-4 columns">
                <img src="http://placehold.it/400x300&text=[img]"/>
                <h4>Download the Data Set</h4>
                <p>
                    The raw data set of food wasted can be found here.
                </p>
            </div>

            <div class="large-4 columns">
                <img src="http://placehold.it/400x300&text=[img]"/>
                <h4>This is a content section.</h4>
                <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
            </div>

        </div>

        <!-- Bottom Advertisement -->
        <div class="row">
            <div class="large-12 columns">

                <div class="panel">
                    <h4>Get in touch!</h4>

                    <div class="row">
                        <div class="large-9 columns">
                            <p>We'd love to hear from you, you attractive person you.</p>
                        </div>
                        <div class="large-3 columns">
                            <a href="#" class="radius button right">Contact Us</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <?php include 'footer.php' ?>

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
        <script src="js/graph.js"></script>
        <script>
            $(document).foundation();

            var doc = document.documentElement;
            doc.setAttribute('data-useragent', navigator.userAgent);

            //Create Java/php variables
            var dataList = <?php echo json_encode($datalist) ?>;
            //console.log(dataList);
            drawVisualization(dataList);


        </script>
    </body>
</html>