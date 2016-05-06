<?php
namespace gb\controller;

require_once("gb/controller/PageController.php");
require_once("gb/mapper/TopBookMapper.php" );
require_once( "gb/mapper/Mapper.php" );

class WonAwardsController extends PageController {
    private $selectedWriterUri;
    private $awards;

    function process() {
        if (isset($_POST["search"])) {
            $mapper = new \gb\mapper\TopBookMapper();
            $this->awards = $mapper->getTopBooksBy($_POST["writer"]);
        }
    }

    function getSearchResult() {
        return $this->awards;
    }
}

?>