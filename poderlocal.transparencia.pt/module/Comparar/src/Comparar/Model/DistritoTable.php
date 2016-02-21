<?php

namespace Distrito\Model;

use Zend\Db\TableGateway\TableGateway;



class DistritoTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)  
    {
        $this->tableGateway = $tableGateway;
    } 

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    public function getDistrito($id)
    {
    	$id  = (int) $id;
    	$rowset = $this->tableGateway->select(array('ID_distrito' => $id));
    	$row = $rowset->current();
    	if (!$row) {
    		throw new \Exception("Could not find row $id"); 
    	}
    	return $row;
    }
    
   	
    
    

    
}