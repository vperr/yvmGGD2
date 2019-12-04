<?php


namespace App\metier;


class UserT implements \JsonSerializable
{
    private $ID;
    private $NAME;
    private $EMAIL;
    private $PASSWORD;
    private $LAST_UPDATE;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getNAME()
    {
        return $this->NAME;
    }

    /**
     * @param mixed $NAME
     */
    public function setNAME($NAME): void
    {
        $this->NAME = $NAME;
    }

    /**
     * @return mixed
     */
    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    /**
     * @param mixed $EMAIL
     */
    public function setEMAIL($EMAIL): void
    {
        $this->EMAIL = $EMAIL;
    }

    /**
     * @return mixed
     */
    public function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    /**
     * @param mixed $PASSWORD
     */
    public function setPASSWORD($PASSWORD): void
    {
        $this->PASSWORD = $PASSWORD;
    }

    /**
     * @return mixed
     */
    public function getLASTUPDATE()
    {
        return $this->LAST_UPDATE;
    }

    /**
     * @param mixed $LAST_UPDATE
     */
    public function setLASTUPDATE($LAST_UPDATE): void
    {
        $this->LAST_UPDATE = $LAST_UPDATE;
    }

    /**
     * @return mixed
     */
    public function getUSERUPDATE()
    {
        return $this->USER_UPDATE;
    }

    /**
     * @param mixed $USER_UPDATE
     */
    public function setUSERUPDATE($USER_UPDATE): void
    {
        $this->USER_UPDATE = $USER_UPDATE;
    }
   private $USER_UPDATE;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}



