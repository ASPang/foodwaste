
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
     <?php include file("header.php") ?>

      <br>

      <!-- User Input -->
      <div class="row">
         <!-- Individual Graph Result -->
         <div id="userResultSection" class="large-6 columns">
            <img id="thumbImg" src="img/blankImg.png" />
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
                  Note: Results are entered in pounds.
               </h5>
            </div><!--panel-->
         </div><!--columns-->

         <div class="large-6 columns">
            <div class="radius panel">
               <form>
                  <div class="row collapse">
                     <h4 class="hide-for-small">Add Start or End Weight<hr/></h4>
                     
                     <div class="large-12 small-12 columns">
                        <input id = searchBox placeholder="Start Weight (grams)" type="text"/>
                     </div><!--columns-->

                     <div class="large-12 small-12 columns">
                        <input id = searchBox placeholder="End Weight (grams)" type="text"/>
                     </div><!--columns-->
                  </div><!--columns-->
                  
                  <!-- Add button -->
                  <div class="row collapse">
                        <a id = search href="#" class="postfix button expand" onclick='individualResult()'>Add</a>
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
      <div class="row">
         <div class="large-3 small-6 columns">
            <div class="imgSize">
               <img id="pastResult1" src="http://placehold.it/500x500&text=Thumbnail">
            </div>
            <div class="panel">
               <p>Description</p>
            </div>
         </div><!--columns-->


         <div class="large-3 small-6 columns">
            <div class="">
               <img id ="pastResult1" src="http://placehold.it/500x500&text=Thumbnail">
            </div>
            <div class="panel">
               <p>Description</p>
            </div>
         </div><!--columns-->

         <div class="large-3 small-6 columns">
            <div class="imgSize">
               <img id ="pastResult1" src="http://placehold.it/500x500&text=Thumbnail">
            </div>
            <div class="panel">
               <p>Description</p>
            </div>
         </div><!--columns-->


         <div class="large-3 small-6 columns">
            <div class="imgSize">
               <img id ="pastResult1" src="http://placehold.it/500x500&text=Thumbnail">
            </div>
            <div class="panel">
               <p>Description</p>
            </div>
         </div><!--columns-->
      </div><!--row-->

      <!-- Footer -->
      <?php include file("footer.php") ?>


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
   </body>
</html>