<?php
namespace APIBundle\Provider\Services;

abstract class DBService 
{
    protected $db;

    public function __construct($db){
       $this->db = $db;
    }
}