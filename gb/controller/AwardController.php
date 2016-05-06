<?php
namespace gb\controller;
require_once ("gb/controller/PageController.php");
require_once ("gb/mapper/OtherAwardMapper.php");

class AwardController extends PageController
{
    private $selectedBookUri;
    private $awards;
    
    function process()
    {
        if (isset($_GET["book_uri"])) {
            $this->selectedBookUri = $_GET["book_uri"];
        }
    }
    
    function getSelectedBookUri(){
        return $this->selectedBookUri;
    }
    
    function getAwardInfo(){
        $mapper = new \gb\mapper\OtherAwardMapper();
        $con = $mapper->getConnectionManager();
        $selectStmt = "
            SELECT 	a.*
                   
            FROM
                award a,

                wins_award wa

            WHERE
      
                a.uri = wa.award_uri AND
        
                wa.book_uri =  " ."\"" . $this->selectedBookUri . "\"
            ";
        $awards = $con->executeSelectStatement($selectStmt, array());
        $this->awards = $mapper->getCollection($awards);
        return $this->awards;
    }

//"
//            SELECT 	a.*,
//                    g.name as genre,
//                   c.name as country
 //           FROM
   //             award a,
     //           country c,
       //         wins_award wa,
         //       genre g
           // WHERE
 //               a.country_iso_code = c.iso_code AND
   //             a.uri = wa.award_uri AND
     //           wa.genre_uri = g.uri AND
       //         wa.book_uri =  " ."\"" . $this->selectedBookUri . "\"
         //   "

}