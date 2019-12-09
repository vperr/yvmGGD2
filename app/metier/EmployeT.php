<?php

namespace App\metier;

class EmployeT implements \JsonSerializable
{
    private $MATRICULE;
    private $NOM;
    private $PRENOM;
    private $TEL;
    private $CODEFONC;

    /**
     * @return mixed
     */
    public function getMATRICULE()
    {
        return $this->MATRICULE;
    }

    /**
     * @param mixed $MATRICULE
     */
    public function setMATRICULE($MATRICULE): void
    {
        $this->MATRICULE = $MATRICULE;
    }

    /**
     * @return mixed
     */
    public function getNOM()
    {
        return $this->NOM;
    }

    /**
     * @param mixed $NOM
     */
    public function setNOM($NOM): void
    {
        $this->NOM = $NOM;
    }

    /**
     * @return mixed
     */
    public function getPRENOM()
    {
        return $this->PRENOM;
    }

    /**
     * @param mixed $PRENOM
     */
    public function setPRENOM($PRENOM): void
    {
        $this->PRENOM = $PRENOM;
    }

    /**
     * @return mixed
     */
    public function getTEL()
    {
        return $this->TEL;
    }

    /**
     * @param mixed $TEL
     */
    public function setTEL($TEL): void
    {
        $this->TEL = $TEL;
    }

    /**
     * @return mixed
     */
    public function getCODEFONC()
    {
        return $this->CODEFONC;
    }

    /**
     * @param mixed $CODEFONC
     */
    public function setCODEFONC($CODEFONC): void
    {
        $this->CODEFONC = $CODEFONC;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
