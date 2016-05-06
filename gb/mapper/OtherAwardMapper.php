<?php
namespace gb\mapper;

$EG_DISABLE_INCLUDES=true;
require_once( "gb/mapper/Mapper.php" );
require_once( "gb/domain/Award.php" );

class OtherAwardMapper extends Mapper{
    function getCollection(array $raw)
    {
        $awardCollection = array();
        foreach($raw as $row) {
            array_push($awardCollection, $this->doCreateObject($row));
        }
        return $awardCollection;
    }

    protected function doCreateObject(array $array)
    {
        $obj = null;
        if(count($array)>0){
            $obj = new \gb\domain\Award($array['uri']);
            
            $obj->setUri($array['uri']);
            $obj->setAwardName($array['name']);
            $obj->setDate($array['date']);
            $obj->setDescription($array['description']);
            //$obj->setCountryName($array['country']);
            //$obj->setGenre($array['genre']);
        }
        
        return $obj;
    }

    protected function doInsert(\gb\domain\DomainObject $object)
    {
        // TODO: Implement doInsert() method.
    }

    protected function selectStmt()
    {
        // TODO: Implement selectStmt() method.
    }

    function update(\gb\domain\DomainObject $object)
    {
        // TODO: Implement update() method.
    }


}