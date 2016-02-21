<?php

namespace User\Model;

use Zend\Db\TableGateway\TableGateway;
use User\Model\User;

class UserTable
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

    public function getUserId($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    
    public function addUser(User $user)
    {
        $data = array(
            'username' => $user->username,
            'password'  => md5($user->password),
        		'email' => $user->email,
        		'user_group' => 0,
        		'active'=> 0,
        		
        );
        $rowset = $this->tableGateway->select(array('username' => $user->username));
        $username = $rowset->current();
        //var_dump($user);
        if ($username == false) {
            $this->tableGateway->insert($data);
            
        } else {
                       
                return null;
            }
        }
    

    public function deleteUser($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}
