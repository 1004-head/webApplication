<?php
function setConnectionInfo($values = array())
{
   $connString = $values[0];
   $user = $values[1];
   $password = $values[2];

   $pdo = new PDO($connString, $user, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   return $pdo;
} // db 연결 함수

function runQuery($pdo, $sql, $parameters)
{
   $parameter = [];
   if (is_array($parameters)) {
      $parameter = array($parameters);
   }
   $statement = null;
   if (count($parameter) > 0) {
      $statement = $pdo->prepare($sql);
      $executedOk = $statement->execute($parameter[0]);
      if (!$executedOk) {
         throw new PDOExecption;
      }
   } else {
      $statement = $pdo->query($sql);
      if (!$statement) {
         throw new PDOException;
      }
   }

   return $statement;
} // db 쿼리 함수

function readContinents()
{
   $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
   $statement = runQuery($pdo, "select * from geocontinents order by ContinentName;", null);
   return $statement;
}

function readPopularCountries()
{
   $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
   $statement = runQuery($pdo, "select * from `geocountries` where `ISO` in (select `CountryCodeISO` from `travelimagedetails` where `ImageID` in (select `ImageID` from `travelimagerating` order by 'Rating' desc) group by `CountryCodeISO`) order by `CountryName`;", null);
   return $statement;
}

function readFilterCities()
{
   $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
   $statement = runQuery($pdo, "select * from `geocities` where `GeoNameID` in (select `CityCode` from `travelimagedetails`) ORDER BY `geocities`.`AsciiName` ASC;", null);
   return $statement;
}

function readAllImages()
{
   $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
   $statement = runQuery($pdo, "select `Path` from `travelimage`;", null);
   return $statement;
}

function readImageCities($city)
{
   $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
   $statement = runQuery($pdo, "select `Path` from `travelimage` where `ImageID` in (select `ImageID` from `travelimagedetails` where `CityCode` in (select `GeoNameID` from `geocities` where `AsciiName` like ?));", array($city));
   return $statement;
}

function readImageCountries($country)
{
   $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
   $statement = runQuery($pdo, "select `Path` from `travelimage` where `ImageID` in (select `ImageID` from `travelimagedetails` where `CountryCodeISO` in (select `ISO` from `geocountries` where `CountryName` like ?));", array($country));
   return $statement;
}
