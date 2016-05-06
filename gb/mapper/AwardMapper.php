<?php
/**
 * Created by PhpStorm.
 * User: LaptopToon
 * Date: 11/04/2016
 * Time: 0:03
 */

namespace gb\mapper;
require_once( "gb/mapper/Mapper.php" );
require_once(  "gb/domain/CountryAward.php" );

class AwardMapper extends Mapper
{
    function __construct() {
        parent::__construct();
        $this->selectCountryAwards = "SELECT c.name AS CountryName,
                    COUNT(*) AS total
                FROM award a,
                    country c,
                    wins_award w
                WHERE a.uri = w.award_uri
                    and c.iso_code = a.country_iso_code
                GROUP BY c.name";
        $this->selectGenreAwards =
                    "SELECT g.name AS GenreName,
                COUNT(*) AS total
              FROM
                genre g,
                wins_award w
                WHERE g.uri = w.genre_uri
                GROUP BY g.name";
    }

    function update(\gb\domain\DomainObject $object)
    {
        // TODO: Implement update() method.
    }

     function getCollection(array $raw)
    {
        $awardCollection = array();
        foreach ($raw as $row){
            array_push($awardCollection, $this->doCreateObject($row));
        }
        return $awardCollection;
    }

    protected function doCreateObject(array $array)
    {
        $obj = null;
        if (count($array) > 0) {
			
	
			
			if (isset($array['CountryName'])){ 
			$obj = new \gb\domain\CountryAward($array['CountryName']);
			 $obj->setCountry($array['CountryName']);
		
	
			
            }else{
				$obj = new \gb\domain\CountryAward($array['GenreName']);
				$obj->setGenre($array['GenreName']);
			}
			
            $obj->setTotal($array['total']);
			
			
			
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
        return $this->selectGenreAwards;
    }
    
    function selectOtherStmt(){
        return $this->selectCountryAwards;
    }
}