<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use OpenApi\Annotations as OA;


/**
 * Class Product.
 *
 * @author  Juan Pedraza <juanpablo96.pedraza@gmail.com>
 *
 * @OA\Schema(
 *     description="Product model",
 *     title="Product model",
 *     required={"name", "slug", "description", "price", "stock", "keywords"},
 *     
 * )
 *
 *
 * @ORM\Entity(repositoryClass="ProductRepository")
 * @ORM\Table(name="products")
 */
class Product
{
     /**
     * 
     *
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @OA\Property(example="aspirina")
     *
     * @var string
     *
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @OA\Property(example="aspirinaespecial")
     *
     * @var string
     *
     *
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @OA\Property(example="para la fiebre")
     *
     * @var string
     *
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @OA\Property(example="200.5")
     *
     * @var double
     *
     *
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @OA\Property(example="4")
     *
     * @var int
     *
     *
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @OA\Property(example="analgesico")
     *
     * @var string
     *
     *
     * @ORM\Column(type="string")
     */
    private $keywords;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of keywords
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set the value of keywords
     *
     * @return self
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Iterate and transform to JSON
     *
     * @return string
     */
    public function toJson(): string
    {
        $json = $this->toArray();

        return json_encode($json);
    }

    /**
     * Iterate and transform to Array
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];
        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }

        return $array;
    }
}
