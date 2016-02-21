<?php

namespace Cartaz\Model;

use Zend\Db\TableGateway\TableGateway;



class CartazTable
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
    
    public function getCartazes()
    {
    	$resultSet = $this->fetchAll();
    	$arr = array();
    	$i=0;
    	foreach ($resultSet as $result)
    	{
    		$arr[$i]['value'] = $result->id;
    		$arr[$i++]['label'] = $result->tamanho;
    	}
    	 
    	return $arr;
    }
    
    public function getcartazbyId($id)
    {
    	$id = ( int ) $id;
    	$rowset = $this->tableGateway->select ( array (
    			'ID_cartaz' => $id
    	) );
    	
    	return $rowset;
    	 
    	
    }
    
    

    
}