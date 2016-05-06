<?php
namespace gb\domain;

require_once( "gb/domain/DomainObject.php" );

class Chapter extends DomainObject {
      
    private $book_uri;
    private $chapter_number;
    private $text;
   
    function __construct( $id=null ) {
        //$this->name = $name;
        parent::__construct( $id );
    }
    
    function setBook_uri($book_uri) {
        $this->book_uri = $book_uri;
    }
    function getBook_uri() {
        return $this->book_uri;
    }
       
    function setChapter_number ( $chapter_number ) {
        $this->chapter_number = $chapter_number;        
    }
    
    function getChapter_number() {
        return $this->chapter_number;
    }
    
    function setText( $text) {
        $this->text = $text;
    }
    
    function getText () {
        return $this->text;
    }
}

?>
