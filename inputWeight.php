<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
      <title>Food Wasted Input - Magic Bin </title>
      <meta name="description" content="Food waste input page for individuals who wish to know how they fair against other students on the campus."/>
      <meta name="copyright" content="Food Fighter. Copyright (c) 2014"/>

      <!-- Stylesheets -->
      <link rel="stylesheet" href="css/foundation.css" />
      <link rel="stylesheet" href="css/styles.css" />

      <!-- JavaScript -->
      <script src="js/vendor/modernizr.js"></script>
   </head>
   
   <body>
      <!-- Header Section  -->
      <br>
     <?php include 'header.php'; 

  
// Create connection
       $conn = new mysqli("localhost", "idk2008_fwAdmin", "food123", "idk2008_foodwaste");

// Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
       
                   $query = "SELECT InitialWeight, WasteWeight FROM  MagicBin WHERE  Date = curdate()";
                        $avResult = mysqli_query($conn, $query);
                        $avRow = mysqli_fetch_assoc($avResult);

$datelist=array();
                        while ($avRow != null) {
                            $line = array();
                            foreach ($avRow as $cell) {
                              //  echo $cell." ! ";

                                array_push($line, $cell);
                            }
                            array_push($datelist, $line);
                            unset($line);
                            $avRow = mysqli_fetch_assoc($avResult);
                        }
                       
$totalInitial=0;
$totalWaste=0;
foreach($datelist as $x){
$totalInitial+= $x[0];
$totalWaste+= $x[1];
}
$avg= $totalWaste/$totalInitial * 100;
 
 
$start = $_POST['startWeight'];
$end = $_POST['endWeight'];
if(preg_match('/^\d+$/',$start)&& preg_match('/^\d+$/',$end)){
    $sqlQuery = "INSERT INTO `magicbin`(`Entry`, `Date`, `Time`, `Location`, `InitialWeight`, `WasteWeight`) VALUES ('',curdate(),curtime(),null," . $start . "," . $end . ")"; 
    mysqli_query($conn, $sqlQuery);
    
}
 
 if ($start != 0) {
 $percent= $end/$start * 100;
 }
 

// Determine if the user is below or above the average
    if ($percent <= $avg) {
   $src= "img/ThumbsUp.png";
    }
    else{
    $src = "img/ThumbsDown.png";
}
  ?>

      <!-- User Input -->
      <div class="row">
         <!-- Individual Graph Result -->
         <div id="userResultSection" class="large-6 columns">
            <?php echo '<img src="' . $src . '" />'; ?>
            <!--<img src="http://placehold.it/500x500&text=Image"><br>-->
            <!-- Google Map -->
            <div id="individualResult"></div>
         </div><!--columns-->

         <!-- Instructions -->
         <div class="large-6 columns">
            <h3 class="show-for-small">Header<hr/></h3>
            <div class="panel">
               <h4 class="hide-for-small">Add Results<hr/></h4>
               <h5 class="subheader">
                  Add your food waste results and then see your
                  reduction goals and see how much waste you're saving as well as money.
                  <br> 
                  <br> 
                  Note: Results are entered in grams.
               </h5>
            </div><!--panel-->
         </div><!--columns-->

  

         <div class="large-6 columns">
            <div class="radius panel">
               <form action="inputWeight.php" method="POST">
                  <div class="row collapse">
                     <h4 class="hide-for-small">Add Start or End Weight<hr/></h4>
                     
                     <div class="large-12 small-12 columns">
                        <input id="startWeight" name="startWeight" placeholder="Start Weight (grams)" type="text"/>
                     </div><!--columns-->

                     <div class="large-12 small-12 columns">
                        <input id="wasteWeight" name="endWeight" placeholder="End Weight (grams)" type="text"/>
                     </div><!--columns-->
                  </div><!--columns-->
                  
                  <!-- Add button -->
                  <div class="row collapse">
                        <!--<a id="SubmitButton" href="#" class="postfix button expand" onclick='individualResult()'>Add</a>-->
                        <input type="submit" value="Submit">
                  </div><!--row-->
                  
               </form><!--forms-->
            </div><!--panel-->
         </div><!--columns-->
      </div><!--row-->

      <br>
      <br>

      <!-- Other Individual Information Header -->
      <div class="row">
         <div class="large-12 columns">
            <h3>Recent Wasters</h3>
         </div><!--columns-->
      </div>
      
      <!-- Other Individual Information Data --> 
      <?php
       $datalist = array();



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
                        
            $endPt=end($datalist);
            $percent= $endPt[5]/$endPt[4]*100;
            
           
 

    

// Determine if the user is below or above the average
    if ($percent <= $avg) {
   $src= "img/ThumbsUp.png";
    }
    else{
    $src = "img/ThumbsDown.png";
}
            
                                    
       ?>
      
      
           
      <div class="row">
         <div class="large-3 small-6 columns">
            <div class="imgSize">
            
               <?php echo '<img src="' . $src . '" />'; ?>
            </div>
            <div class="panel">
               <p><?php echo round($percent,2) ?>%</p>
            </div>
         </div><!--columns-->

<?php
            $endPt=prev($datalist);
            $percent= $endPt[5]/$endPt[4]*100;
            // Determine if the user is below or above the average
    if ($percent <= $avg) {
     $src= "img/ThumbsUp.png";
    }
    else{
    $src = "img/ThumbsDown.png";
}
          ?>

         <div class="large-3 small-6 columns">
            <div class="imgSize">
               <?php echo '<img src="' . $src . '" />'; ?>
            </div>
            <div class="panel">
               <p><?php echo round($percent,2) ?>%</p>
            </div>
         </div><!--columns-->


<?php
            $endPt=prev($datalist);
            $percent= $endPt[5]/$endPt[4]*100;
            // Determine if the user is below or above the average
    if ($percent <= $avg) {
    $src= "img/ThumbsUp.png";
    }
    else{
    $src = "img/ThumbsDown.png";
    }
          ?>

         <div class="large-3 small-6 columns">
            <div class="imgSize">
               <?php echo '<img src="' . $src . '" />'; ?>
            </div>
            <div class="panel">
               <p><?php echo round($percent,2) ?>%</p>
            </div>
         </div><!--columns-->


<?php
            $endPt=prev($datalist);
            $percent= $endPt[5]/$endPt[4]*100;
            // Determine if the user is below or above the average
    if ($percent <= $avg) {
      $src= "img/ThumbsUp.png";
    }
    else{
    $src = "img/ThumbsDown.png";
}
          ?>

         <div class="large-3 small-6 columns">
            <div class="imgSize">
               <?php echo '<img src="' . $src . '" />'; ?>
            </div>
            <div class="panel">
               <p><?php echo round($percent,2) ?>%</p>
            </div>
         </div><!--columns-->
      </div><!--row-->

      <!-- Footer -->
      <?php include 'footer.php' ?>


      <!-- JavaScripts -->
      <script src="./Foundation Framework/js/jquery-1.7.min.js"></script>
      <script src="./Foundation Framework/js/foundation.min.js"></script>

      <script>
         $(document).foundation();
      </script>

      <script src="js/jquery-1.7.min.js"></script>
      <script src="js/foundation/foundation.js"></script>

      <script>
         $(document).foundation();

         var doc = document.documentElement;
         doc.setAttribute('data-useragent', navigator.userAgent);
      </script>

      <script type="text/javascript" src="https://www.google.com/jsapi"></script>

      <script src="js/graph.js"></script>
      <script src="js/inputWeight.js"></script>
      
<script>      
      function individualResult() {
    var start = document.getElementById('startWeight').value;
    var end = document.getElementById('startWeight').value;
    var location = null;
    var date = null;
    var time = null;
    var dateTime = new Date();
    
    date = dateTime.getDate();
    console.log(date);
    
    console.log(dateTime);
    console.log(dateTime.Length);
    time = dateTime.substring(dateTime.length-8, dateTime.length-1);
    console.log(time);
    
    var sqlQuery = "INSERT INTO `magicbin`(`Entry`, `Date`, `Time`, `Location`, `InitialWeight`, `WasteWeight`) VALUES ('',curdate(),curtime(),null," + start + "," + end + ") ";
    
    
}
</script>
   </body>
</html>