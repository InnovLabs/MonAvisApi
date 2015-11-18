<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 10:44
 */

namespace Entity;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;
use JsonSerializable;
use Utils\DataConverter;

class Commentaire implements JsonSerializable
{
    protected $id;

    protected $avis;

    protected  $user;

    protected $dateCreation;

    protected $contenu;

    protected $etat;

    /**
     * Commentaire constructor.
     */
    public function __construct()
    {
        $this->dateCreation = new  \DateTime("now", new \DateTimeZone("GMT"));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Avis
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * @param Avis $avis
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param \DateTime $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return Etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param Etat $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
    public static function loadMetadata(ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);
        $builder->createField('id', 'integer')->makePrimaryKey()->generatedValue()->build();
        $builder->addField('dateCreation', 'datetime');
        $builder->addField('contenu', 'string');
        $builder->addManyToOne('avis', 'Entity\\Avis');
        $builder->addManyToOne('user', 'Entity\\User');
        $builder->addManyToOne('etat', 'Entity\\Etat');
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        $dataConverter = new DataConverter();
        return $dataConverter->convertToJson($this);
    }


}