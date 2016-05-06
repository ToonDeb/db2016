<?php
namespace gb\domain;

require_once( "gb/domain/DomainObject.php" );

class Book extends DomainObject {    
      
    private $uri;
    private $name;
    private $description;
    private $original_language;
    private $first_publication_date;
	private $awards;
	private $chapters;

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
    
    function setBookName ( $name ) {
        $this->name = $name;
    }
    
    function getBookName () {
        return $this->name;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }
    
    function getDescription() {
        return $this->description;
    }
	
	function setOriginalLanguage($original_language) {
        $this->original_language = $original_language;
    }
    
    function getOriginalLanguage() {
        return $this->original_language;
    }
	
	function setFirstPublicationDate($first_publication_date) {
        $this->first_publication_date = $first_publication_date;
    }
    
    function getFirstPublicationDate() {
        return $this->first_publication_date;
    }
	
	function setAwards($awards) {
        $this->awards = $awards;
    }
    
    function getAwards() {
        return $this->awards;
    }

	function setChapters($chapters) {
        $this->chapters = $chapters;
    }
    
    function getChapters() {
        return $this->chapters;
    }
	
}

?>
