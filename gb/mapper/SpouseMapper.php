<?php
/**
 * Created by PhpStorm.
 * User: LaptopToon
 * Date: 9/04/2016
 * Time: 16:06
 */

namespace gb\mapper;

require_once( "gb/mapper/Mapper.php" );
require_once(  "gb/domain/Spouse.php" );


class SpouseMapper extends Mapper
{

    function __construct() {
        parent::__construct();
        $this->selectStmt = "SELECT a.*, c.full_name from is_spouse_of a, writer b, person c  where a.person_uri = b.writer_uri and a.person_uri = c.uri and a.uri = ?";
        $this->selectAllStmt =
            "SELECT a.*, 
	            c.full_name AS person_name, 
                d.full_name AS writer_name  
              FROM is_spouse_of a, writer b, person c, person d
              WHERE a.person_uri = b.writer_uri 
                and c.uri = a.person_uri
                and d.uri = a.writer_uri";
    }

    function update(\gb\domain\DomainObject $object)
    {
        // TODO: Implement update() method.
    }

    function getCollection(array $raw)
    {
        $spouseCollection = array();
        foreach($raw as $row)
        {
            array_push($spouseCollection, $this->doCreateObject($row));
        }

        return $spouseCollection;
    }

    protected function doCreateObject(array $array)
    {
        $obj = null;
        if (count($array) > 0) {
            $obj = new \gb\domain\Spouse($array['writer_uri']);

            $obj->setFrom($array['from_time']);
            $obj->setTo($array['to_time']);
            $obj->setPersonUri($array['person_name']);
            $obj->setWriterUri($array['writer_name']);
        }
        
        return $obj;
    }

    protected function doInsert(\gb\domain\DomainObject $object)
    {
        // TODO: Implement doInsert() method.
    }

    function selectStmt()
    {
        return $this->selectStmt;
    }
    
    function selectAllStmt(){
        return $this->selectAllStmt;
    }
}