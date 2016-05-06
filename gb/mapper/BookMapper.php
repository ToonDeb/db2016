<?php
namespace gb\mapper;

$EG_DISABLE_INCLUDES=true;
require_once( "gb/mapper/Mapper.php" );
require_once( "gb/domain/Book.php" );


class BookMapper extends Mapper {

    function __construct() {
        parent::__construct();
        $this->selectStmt = "SELECT a.*, b.* from person a, writer b where a.uri = b.writer_uri and a.uri = ?";
        $this->selectAllStmt = "SELECT * from book";
    } 
    
    function getCollection( array $raw ) {
        $bookCollection = array();
        foreach($raw as $row) {
            array_push($bookCollection, $this->doCreateObject($row));
        }
        return $bookCollection;
    }

    protected function doCreateObject( array $array ) {
        
        $obj = null;        
        if (count($array) > 0) {
		
            $obj = new \gb\domain\Book( $array['uri'] );

            $obj->setUri($array['uri']);
            $obj->setBookName($array['name']);
            $obj->setDescription($array['description']);
            $obj->setAwards($array['awards']);
			$obj->setChapters($array['chapters']);
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
