<?php



class Pessoa extends Sql
{
    private $idUser;
    private $login;
    private $senha;
    private $dataCadastro;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @param mixed $dataCadastro
     */
    public function setDataCadastro($dataCadastro): void
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function CarregamentoPorID($id){

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idUsuario = :ID", array(
            ":ID"=>$id
        ));

        if(count($result)>0) {
            $row = $result[0];
            $this->setIdUser($id);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setDataCadastro(new DateTime($row['date']));
        }

    }

    public function __toString(): string
    {
        return json_encode(array(
            "idusuario"=>$this->getIdUser(),
            "Login"=>$this->getLogin(),
            "Senha"=>$this->getSenha(),
            "DataCadastrato"=>$this->getDataCadastro()->format("d-m-Y H:i:s")
        ));
        // TODO: Implement __toString() method.
    }


}