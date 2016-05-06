<?php
namespace gb\domain;

require_once( "gb/domain/DomainObject.php" );

class Award extends DomainObject {

    private $uri;
    private $name;
    private $date;
    private $description;
    private $countryName;
    private $genre;

    function __construct( $id=null ) {
        //$this->name = $name;
        parent::__construct( $id );
    }

    function setUri( $uri ) {
        $this->uri = $uri;
    }

    function getUri( ) {
        return $this->uri;
    }

    function setAwardName ( $name ) {
        $this->name = $name;
    }

    function getAwardName () {
        return $this->name;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getDate() {
        return $this->date;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getDescription() {
        return $this->description;
    }

    function setCountryName($countryName) {
        $this->countryName = $countryName;
    }

    function getCountryName() {
        return $this->countryName;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function getGenre() {
        return $this->genre;
    }

}

?>