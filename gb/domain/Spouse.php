<?php
/**
 * Created by PhpStorm.
 * User: LaptopToon
 * Date: 9/04/2016
 * Time: 16:10
 */

namespace gb\domain;

require_once ("gb/domain/DomainObject.php");

class Spouse extends DomainObject
{

    private $person_uri;
    private $writer_uri;
    private $from;
    private $to;

    function __construct( $id=null ) {
        parent::__construct( $id );
    }

    /**
     * @return mixed
     */
    public function getPersonUri()
    {
        return $this->person_uri;
    }

    /**
     * @param mixed $person_uri
     */
    public function setPersonUri($person_uri)
    {
        $this->person_uri = $person_uri;
    }

    /**
     * @return mixed
     */
    public function getWriterUri()
    {
        return $this->writer_uri;
    }

    /**
     * @param mixed $writer_uri
     */
    public function setWriterUri($writer_uri)
    {
        $this->writer_uri = $writer_uri;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
    
    
}