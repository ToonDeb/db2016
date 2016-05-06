<?php
namespace gb\mapper;

$EG_DISABLE_INCLUDES=true;
require_once( "gb/mapper/Mapper.php" );
require_once( "gb/domain/TopBook.php" );


class TopBookMapper extends Mapper {

    function __construct() {
        parent::__construct();
//        $this->selectStmt = "SELECT b.name, count(wa.award_uri)
//  FROM book as b,
//	wins_award as wa,
//    writer as w,
//    writes as wb
//  WHERE w.writer_uri = wb.writer_uri AND
//	wb.book_uri = b.uri AND
//    wa.book_uri = b.uri AND
//    w.writer_uri = ?
//  GROUP BY b.name
//  LIMIT 10
//    ";
       // $this->selectAllStmt = "SELECT * from book";
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

            $obj = new \gb\domain\TopBook( $array['name'] );
            $obj->setUri($array['uri']);
            $obj->setBookName($array['name']);
            $obj->setAmount($array['amount']);

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

    function getTopBooksBy($writer_uri){
        $con = $this->getConnectionManager();
        $selectStmt = "SELECT b.name, count(wa.award_uri) as amount, b.uri
  FROM book as b, 
	wins_award as wa, 
    writer as w, 
    writes as wb
  WHERE w.writer_uri = wb.writer_uri AND
	wb.book_uri = b.uri AND
    wa.book_uri = b.uri AND
    w.writer_uri = " ."\"" . $writer_uri . "\"
  GROUP BY b.name
  ORDER BY amount DESC
  LIMIT 10
    ";
        $writers = $con->executeSelectStatement($selectStmt, array());
        return $this->getCollection($writers);
    }

}


?>
