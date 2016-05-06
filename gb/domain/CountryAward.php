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
    private $name;
    
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    
}