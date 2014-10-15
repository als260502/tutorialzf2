<?php
 
// namespace de localizacao do nosso model
namespace Contato\Model;

use Exception;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
 
// import Zend\Db

 
class ContatoTable
{
    protected $tableGateway;
 
    /**
* Contrutor com dependencia da classe TableGateway
*
* @param TableGateway $tableGateway
*/
public function __construct(TableGateway $tableGateway)
{
    $this->tableGateway = $tableGateway;
}
 
    /**
     * Recuperar todos os elementos da tabela contatos
     *
     * @return ResultSet
     */
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
 
    /**
     * Localizar linha especifico pelo id da tabela contatos
     *
     * @param type $id
     * @return Contato
     * @throws Exception
     */
    public function find($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row)
            throw new Exception("Não foi encontrado contado de id = {$id}");
 
        return $row;
    }
}