<?php
/**
 * Created by PhpStorm.
 * User: WILLY
 * Date: 31/08/2015
 * Time: 19:25
 */

namespace Entity;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;
use JsonSerializable;
use Utils\DataConverter;

class User implements JsonSerializable{

    protected $id;

    protected $nom;
	
	protected $prenoms;
	
	protected $photo;
	
	protected $mail;
	
	protected $idCompte;

    protected $dateAdd;


    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->dateAdd = new \DateTime("now", new \DateTimeZone("GMT"));

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
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * @param mixed $prenoms
     */
    public function setPrenoms($prenoms)
    {
        $this->prenoms = $prenoms;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getIdCompte()
    {
        return $this->idCompte;
    }

    /**
     * @param mixed $idCompte
     */
    public function setIdCompte($idCompte)
    {
        $this->idCompte = $idCompte;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * @param \DateTime $dateAdd
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;
    }


    public static function loadMetadata(ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);
        $builder->createField('id', 'integer')->isPrimaryKey()->generatedValue()->build();
        $builder->addField('nom', 'string');
        $builder->addField('prenoms', 'string');
        $builder->addField('photo', 'string');
        $builder->addField('mail', 'string');
        $builder->addField('idCompte', 'integer');
        $builder->addField('dateAdd', 'datetime');
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