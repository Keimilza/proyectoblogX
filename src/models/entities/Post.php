<?php

namespace App\models\entities;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */

class Post extends Entity{

   /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */

    public $id;

    /**
     * @ORM\Column(type="string")
         */

    public $title;

    /**
     * @ORM\Column(type="string")
 
     */

    public $body;

       /**
     * @ORM\Column(type="integer")

     */

    public $id_user;

    /**
     * @ORM\Column(type="datetime")
     */

    public $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
     
    public $updated_at;

    public function __construct()
    {
        $this->created_at = new \Datetime('now');
        $this->updated_at = new \Datetime('now');
    }
}