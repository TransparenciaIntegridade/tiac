<?php

namespace PostCartaz\Model;

use Zend\Db\TableGateway\TableGateway;

class PostCartazTable
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
    
    public function fetchAllInactive()
    {
    	;
    	$rowset = $this->tableGateway->select ( array (
    			'active' => 0
    	) );
    	 
    	return $rowset;
    }
    
    public function activateCartaz($id)
    {
    	$data = array(
    			'active' =>1,
    	);
    		if ($this->getCartaz($id)) {
    			$this->tableGateway->update($data, array('id_post' => $id));
    		
    	}
    }
    
    public function getCartaz($id)
    {
    	$id  = (int) $id;
    	$rowset = $this->tableGateway->select(array('id_post' => $id));
    	$row = $rowset->current();
    	if (!$row) {
    		return null;
    	}
    	return $row;
    }
    
    
    
    public function saveCartaz(array $postcartaz, $id_user, $id_lista,$date,$proximity) {
    
    	$data = array (
    			'ID_user' => $id_user,
    			'ID_cartaz' => $postcartaz['nome'],
    			'ID_lista' => $id_lista,
    			'data' => $date->getTimestamp(),
    			'image' => $date->getTimestamp().$postcartaz['fileupload'],
    			'morada' => $postcartaz['morada'],
    			'cor_x' => $postcartaz['cor_x'],
    			'cor_y' => $postcartaz['cor_y'],
    			'active' => 0,
    			'proximity' => $proximity,
    	);
    	
    	$this->tableGateway->insert ( $data );
    }
    
    public function getcartazbyIdLista($id)
    {
    	$id = ( int ) $id;
    	$rowset = $this->tableGateway->select ( array (
    			'ID_lista' => $id
    	) );
    	
    		return $rowset;
    }
    
    public function deleteCartaz($id)
    {
    	$this->tableGateway->delete(array('id_post' => $id));
    }
    
    public function deleteCartazByIdLista($id)
    {
    	$this->tableGateway->delete(array('id_lista' => $id));
    }

    
}