<?php
namespace gb\controller;

require_once("gb/controller/PageController.php");


class WinAwardController extends PageController {
	
	private $awardsGenre;
	private $awardsCountry;
    function process() {
        if (isset($_POST["search"])) {
			
			if (!empty($_POST["from_time"])&&!empty($_POST["to_time"])){
            $this->awardsGenre = $this->searchGenreAwardsBetween($_POST["from_time"],$_POST["to_time"]);
			 $this->awardsCountry = $this->searchCountryAwardsBetween($_POST["from_time"],$_POST["to_time"]);
			
			echo "Results for time period from " .$_POST["from_time"]." to ".$_POST["to_time"]." "."<br>";
			}else{
				echo"Please specify a time period."."<br>";
			}
			}
    }


    function searchCountryAwardsBetween($from,$to) {
    $mapper = new \gb\mapper\AwardMapper();
        $con = $mapper->getConnectionManager();
        $selectStmt = "SELECT c.name AS CountryName, COUNT(*) AS total 
                FROM award a, country c, wins_award w 
                WHERE a.uri = w.award_uri and c.iso_code = a.country_iso_code and
				a.date >= "."\"" . $from ."\"" . "and a.date <= "."\"" . $to ."\"" ." 
				GROUP BY c.name";
       $awardsGenre = $con->executeSelectStatement($selectStmt, array()); 

        return $mapper->getCollection($awardsGenre);
}

  function searchGenreAwardsBetween($from,$to) {
    $mapper = new \gb\mapper\AwardMapper();
        $con = $mapper->getConnectionManager();
	   $selectStmt = "SELECT g.name AS GenreName, COUNT(*) AS total 
                FROM award a, genre g, wins_award w
                WHERE a.uri = w.award_uri and g.uri = w.genre_uri and
				a.date >= "."\"" . $from ."\"" . "and a.date <= "."\"" . $to ."\"" ."
				GROUP BY g.name";
       $awardsCountry = $con->executeSelectStatement($selectStmt, array()); 
	 
        return $mapper->getCollection($awardsCountry);
}

function getSearchResultGenres() {
        return $this->awardsGenre;
    }
	
	function getSearchResultCountries() {
        return $this->awardsCountry;
    }




}
?>