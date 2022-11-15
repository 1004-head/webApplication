<?php
require_once("includes/travel-config.inc.php");
require_once("includes/exdb.php");



$filterCountries = readPopularCountries();
$filterCities = readFilterCities();

$images = readAllImages(); // ***remove this function call before make filter(Goal 1)


if ($_SERVER['REQUEST_METHOD'] == 'GET' && (isset($_GET['country']) || isset($_GET['city']))) {
   // Goal 1 - Make if, else if and else conditions for filters (use $_GET)(reference the functions in exdb.php)

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <title>Travel Template</title>
   <?php include 'includes/travel-head.inc.php'; ?>
</head>

<body>

   <?php include 'includes/travel-header.inc.php'; ?>

   <div class="container">
      <!-- start main content container -->
      <div class="row">
         <!-- start main content row -->
         <div class="col-md-3">
            <!-- start left navigation rail column -->
            <?php include 'includes/travel-left-rail.inc.php'; ?>
         </div> <!-- end left navigation rail -->

         <div class="col-md-9">
            <!-- start main content column -->
            <ol class="breadcrumb">
               <li><a href="#">Home</a></li>
               <li><a href="#">Browse</a></li>
               <li class="active">Images</li>
            </ol>

            <div class="well well-sm">
               <form class="form-inline" role="form" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="form-group">
                     <select class="form-control" name="city">
                        <option value="0">Filter by City</option>
                        <?php

                        // Goal 2 - make foreach & echo for options ($city[1])

                        ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <select class="form-control" name="country">
                        <option value="ZZZ">Filter by Country</option>
                        <?php

                        // Goal 2 -make foreach & echo for options ($country[4])

                        ?>
                     </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Filter</button>
               </form>
            </div> <!-- end filter well -->

            <div class="well">
               <div style="display: flex; justify-content: flex-start;" class="row">
                  <table>
                     <?php
                     $path = "images/travel/square/";
                     $i = 0;
                     echo '<tr>';
                     foreach ($images as $img) {
                        // echo utf8_encode($img[0]);
                        echo '<td><img style="background-color: #ffffff; padding: 5px 15px; margin: 5px 12px;" src="' . $path . $img[0] . '"></td>';
                        $i = $i + 1;
                        if ($i % 4 == 0) {
                           echo '</tr><tr>';
                        }
                     }
                     echo '</tr>';
                     ?>
                  </table>
               </div>
            </div> <!-- end images well -->

         </div> <!-- end main content column -->
      </div> <!-- end main content row -->
   </div> <!-- end main content container -->

   <?php include 'includes/travel-footer.inc.php'; ?>



   <!-- Bootstrap core JavaScript
 ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="bootstrap3_travelTheme/assets/js/jquery.js"></script>
   <script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script>
   <script src="bootstrap3_travelTheme/assets/js/holder.js"></script>
</body>

</html>