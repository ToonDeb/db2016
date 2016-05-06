<?php
namespace gb\domain;

require_once( "gb/domain/DomainObject.php" );

class TopBook extends DomainObject {


    private $name;
    private $amount;
    private $uri;
    

    function __construct( $id=null ) {
        //$this->name = $name;
        parent::__construct( $id );
    }

    function setBookName ( $name ) {
        $this->name = $name;
    }

    function getBookName () {
        return $this->name;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function getAmount() {
        return $this->amount;
    }
    
    function setUri($uri){
        $this->uri = $uri;
    }
    
    function getUri(){
        return $this->uri;
    }

}

?>