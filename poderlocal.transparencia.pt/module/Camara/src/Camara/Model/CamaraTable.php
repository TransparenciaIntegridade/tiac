<?php

namespace Camara\Model;

use Zend\Db\TableGateway\TableGateway;



class CamaraTable
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
    
    public function getCamara($id)
    {
    	$id  = (int) $id;
    	$rowset = $this->tableGateway->select(array('ID_camara' => $id));
    	$row = $rowset->current();
    	if (!$row) {
    		throw new \Exception("Could not find row $id"); 
    	}
    	return $row;
    }
    
    public function getCamaraByDistrito($id)
    {
    	$id  = (int) $id;
    	$rowset = $this->tableGateway->select(array('ID_distrito' => $id));
    	return $rowset;
    }
    
    public function getDistritoID($id)
    {
    	$id  = (int) $id;
    	$rowset = $this->tableGateway->select(array('ID_camara' => $id));
    	$row = $rowset->current();
    	return $row;
    }

    
    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}