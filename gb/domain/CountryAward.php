<?php
/**
 * Created by PhpStorm.
 * User: LaptopToon
 * Date: 9/04/2016
 * Time: 18:15
 */

namespace gb\domain;

require_once("gb/domain/DomainObject.php");

class CountryAward extends DomainObject
{
    private $total;
    private $country;
	private $genre;
    
    function __construct( $id=null ) {
        parent::__construct( $id );
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $name
     */
    public function setCountry($CountryName)
    {
        $this->country = $CountryName;
	
    }
	
	    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $name
     */
    public function setGenre($GenreName)
    {
	
        $this->genre = $GenreName;

    }
    
    
}