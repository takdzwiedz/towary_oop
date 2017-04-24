<?php

abstract class DbConect{
    
    protected $db;
    
    function __construct() {
        
        $this->db = new mysqli(SERVER,USER,PASSWORD,DB);
        
    }
    
    function __destruct() {
        
        $this->db->close();
        
    }
    
}