<?php

namespace Candidatura\Model;

use Zend\Db\TableGateway\TableGateway;

class CandidaturaTable {
	protected $tableGateway;
	
	
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	
	public function fetchAll() {
		$resultSet = $this->tableGateway->select ();
		return $resultSet;
	}
	
	
	
	public function getCandidatura($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'ID_lista' => $id 
		) );
		$row = $rowset->current ();
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
		return $row;
	}
	
	
	public function getCamaraByListaID($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'ID_lista' => $id
		) );
		$row = $rowset->current ();
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
		return $row;
	}
	
	public function getCandidaturaByCamaraID($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'ID_camara' => $id 
		) );
		
		return $rowset;
	}
	
	
	
	
	
	public function saveCandidatura(Candidatura $candidatura, $id, $color) {
				
		$data = array (
				'ID_camara' => $id,
				'nome' => $candidatura->nome,
				'cor' => $color 
		);
		$records = ($this->getCandidaturaByCamaraID ( $id ));
		foreach ( $records as $rec ) {
			
			if ($candidatura->nome == $rec->nome)
			return null;
		}
		$this->tableGateway->insert ( $data );
	}
	
	
	
	public function deleteCandidatura($id) {
		$this->tableGateway->delete ( array (
				'ID_lista' => $id 
		) );
	}
	
	
}