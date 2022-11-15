<?php
require_once("includes/travel-config.inc.php");
require_once("includes/exdb.php");

$continents = readContinents();
$populars = readPopularCountries();
?>

<div class="panel panel-default">
  <div class="panel-heading">Search</div>
  <div class="panel-body">
    <form>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="search ...">
        <span class="input-group-btn">
          <button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </form>
  </div>
</div> <!-- end search panel -->

<div class="panel panel-info">
  <div class="panel-heading">Continents</div>
  <ul style="list-style: none;" class="list-group">

    <!-- ------------------------------------- -->
    <!-- Goal 3 - Make foreach loop for $continents as $conti -->
    <!-- ------------------------------------- -->

  </ul>
</div> <!-- end continents panel -->
<div class="panel panel-info">
  <div class="panel-heading">Popular Countries</div>
  <ul style="list-style: none;" class="list-group">

    <!-- ------------------------------------- -->
    <!-- Goal 3 - Make foreach loop for $populars as $popular -->
    <!-- ------------------------------------- -->

  </ul>
</div> <!-- end countries panel -->