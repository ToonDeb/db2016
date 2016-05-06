<?php
namespace gb\controller;

require_once("gb/controller/PageController.php");
require_once("gb/mapper/WriterMapper.php" );
require_once( "gb/mapper/Mapper.php" );

class SearchWritersController extends PageController {
    private $writers;
    
    function process() {
        if (isset($_POST["search_writer"])) {
            
            if ((strlen($_POST["full_name"]) > 0) &&
                    (strlen($_POST["date_of_birth"]) == 0) &&
                    (strlen($_POST["country"])== 0))
                {            
                // search by full name                
                $this->writers = $this->searchWriterByName($_POST["full_name"]);
            } else if ((strlen($_POST["full_name"]) > 0) &&
                        (strlen($_POST["date_of_birth"]) > 0) &&
                        (strlen($_POST["country"])== 0)) {
                // search by full name + date_of_birth
                $this->writers = $this->searchWriterByNameAndDoB($_POST["full_name"], $_POST["date_of_birth"]);
            } else if ((strlen($_POST["full_name"]) > 0) &&
                        (strlen($_POST["date_of_birth"]) > 0) &&
                        (strlen($_POST["country"]) > 0)) {
                // search by full name + date_of_birth + country
                $this->writers = $this->searchWriterByNameAndDoBAndCountry($_POST["full_name"],
                                            $_POST["date_of_birth"], $_POST["country"]);
                
            } else {
                // list all writers
                $this->writers = $this->listAllWriters();
            }
            
        } 
    }
    
    function searchWriterByName($name) {
        $mapper = new \gb\mapper\WriterMapper();
        return $mapper->getWritersByName($name);
    }
    
     function searchWriterByNameAndDoB($name, $date_of_birth) {  
		$mapper = new \gb\mapper\WriterMapper();
        $con = $mapper->getConnectionManager();
        $selectStmt = "SELECT a.*, b.* from person a, writer b where a.uri = b.writer_uri and a.full_name like " ."\"" . $name . "%" . "\"and a.birth_date like " ."\"" . "%" . $date_of_birth . "%" . "\"" ;        
        $writers = $con->executeSelectStatement($selectStmt, array()); 
        return $mapper->getCollection($writers);
		

        
    }
    
    function searchWriterByNameAndDoBAndCountry($name, $date_of_birth, $country) {
        $mapper = new \gb\mapper\WriterMapper();
        $con = $mapper->getConnectionManager();
        $selectStmt = "SELECT a.*, b.*,c.*,d.iso_code,d.name from person a, writer b, has_citizenship c, country d where a.uri = b.writer_uri and a.full_name like " ."\"" . $name . "%" . "\" and a.birth_date like " ."\"" .  "%" . $date_of_birth . "%" . "\" and a.uri = c.person_uri and c.country_iso_code = d.iso_code and c.country_iso_code like " ."\"" . $country . "\"";        
      	$writers = $con->executeSelectStatement($selectStmt, array()); 

        return $mapper->getCollection($writers);
    }
    
    function listAllWriters() {
        $mapper = new \gb\mapper\WriterMapper();
        $con = $mapper->getConnectionManager();
        $selectStmt = "SELECT a.*, b.* from person a, writer b where a.uri = b.writer_uri " ;        
        $writers = $con->executeSelectStatement($selectStmt, array()); 
        return $mapper->getCollection($writers);
    }
    function getSearchResult() {
        return $this->writers;
    }

    function searchWritersWithSpouseWriter(){
        $mapper = new \gb\mapper\SpouseMapper();
        $con = $mapper->getConnectionManager();
        $spouses = $mapper->findAll();
        
        return $spouses;
        
    }
}

?>