<?php
namespace gb\mapper;

$EG_DISABLE_INCLUDES=true;
require( "gb/mapper/Mapper.php" );
require( "gb/domain/Chapter.php" );


class ChapterMapper extends Mapper {

    function __construct($uri) {
        parent::__construct();
        $this->selectStmt = "SELECT * FROM chapter WHERE book_uri = ?";
        $this->selectAllStmt = "SELECT * FROM chapter WHERE book_uri = ".$uri;
    } 
    
    function getCollection( array $raw ) {
        
        $customerCollection = array();
        foreach($raw as $row) {
            array_push($customerCollection, $this->doCreateObject($row));
        }
        
        return $customerCollection;
    }

    protected function doCreateObject( array $array ) {
        
        $obj = null;        
        if (count($array) > 0) {
            $obj = new \gb\domain\Chapter( $array['book_uri'] );

            $obj->setBook_uri($array['book_uri']);
            $obj->setChapter_number($array["chapter_number"]);
            $obj->setText($array['text']);            
        } 
        
        return $obj;
    }

    protected function doInsert( \gb\domain\DomainObject $object ) {
        /*$values = array( $object->getName() ); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );*/
    }
    
    function update( \gb\domain\DomainObject $object ) {
        //$values = array( $object->getName(), $object->getId(), $object->getId() ); 
        //$this->updateStmt->execute( $values );
    }

    function selectStmt() {
        return $this->selectStmt;
    }
    
    function selectAllStmt() {
        return $this->selectAllStmt;
    }
    
}


?>
