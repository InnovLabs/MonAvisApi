<?php
/**
 * Created by PhpStorm.
 * User: Jean-Luc DJEKE
 * Date: 09/11/2015
 * Time: 09:21
 */

namespace Entity;

use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;
use JsonSerializable;
use Utils\DataConverter;

class Entreprise implements JsonSerializable
{
    protected $id;

    protected $libelle;

    protected $logo;

    protected $description;

    protected $longitude;

    protected $latitude;

    protected $dateAdd;

    protected $typeEntreprise;

    protected $categorie;

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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * @param mixed $dateAdd
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;
    }

    /**
     * @return mixed
     */
    public function getTypeEntreprise()
    {
        return $this->typeEntreprise;
    }

    /**
     * @param mixed $typeEntreprise
     */
    public function setTypeEntreprise($typeEntreprise)
    {
        $this->typeEntreprise = $typeEntreprise;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public static function loadMetadata(ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);
        $builder->createField('id', 'integer')->makePrimaryKey()->generatedValue()->build();
        $builder->addField('libelle', 'string');
        $builder->addField('description', 'string');
        $builder->addField('longitude', 'integer');
        $builder->addField('latitude', 'integer');
        $builder->addField('dateAdd', 'datetime');
        $builder->addManyToOne('typeEntreprise', "Entity\\TypeEntreprise");
        $builder->addManyToOne('categorie', "Entity\\Categorie");
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