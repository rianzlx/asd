<?php
class Pessoa
{
    private $conn;
    private $id_pessoa;
    private $nome_pessoa;
    private $email_pessoa;
    private $cpf_pessoa;
    private $senha_pessoa;
    private $telefone_pessoa;

    // Construtor
    public function __construct($connp)
    {
        // Verifica se a conexão é um objeto PDO válido
        if ($connp instanceof PDO) {
            $this->conn = $connp;
        } else {
            throw new Exception("A conexão não é válida.");
        }
    }

    // Métodos Setters
    public function setid_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }

    public function setnome_pessoa($nome_pessoa)
    {
        $this->nome_pessoa = $nome_pessoa;
    }

    public function setemail_pessoa($email_pessoa)
    {
        $this->email_pessoa = $email_pessoa;
    }

    public function setcpf_pessoa($cpf_pessoa)
    {
        $this->cpf_pessoa = $cpf_pessoa;
    }

    public function setsenha_pessoa($senha_pessoa)
    {
        $this->senha_pessoa = $senha_pessoa;
    }

    public function settelefone_pessoa($telefone_pessoa)
    {
        $this->telefone_pessoa = $telefone_pessoa;
    }

    public function insert()
    {
        if (empty($this->nome_pessoa) || empty($this->email_pessoa) || empty($this->cpf_pessoa) || empty($this->senha_pessoa) || empty($this->telefone_pessoa)) {
            echo "Erro: Todos os campos são obrigatórios.";
            return;
        }

        // Query SQL para inserção
        $sql = "INSERT INTO pessoa (nome_pessoa, email_pessoa, cpf_pessoa, senha_pessoa, telefone_pessoa) 
                VALUES (:nome_pessoa, :email_pessoa, :cpf_pessoa, :senha_pessoa, :telefone_pessoa)";

        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nome_pessoa', $this->nome_pessoa);
            $stmt->bindParam(':email_pessoa', $this->email_pessoa);
            $stmt->bindParam(':cpf_pessoa', $this->cpf_pessoa);
            $stmt->bindParam(':senha_pessoa', $this->senha_pessoa);
            $stmt->bindParam(':telefone_pessoa', $this->telefone_pessoa);

            if ($stmt->execute()) {
                echo "Pessoa física inserida com sucesso!<br>";
            } else {
                echo "Erro ao inserir Pessoa física!<br>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    public function logar()
    {
        $sql = "SELECT id_pessoa FROM pessoa WHERE email_pessoa = '$this->email_pessoa' AND senha_pessoa = '$this->senha_pessoa'";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            $_SESSION['logado'] = true;
            header('location: index.php');
        } else {
            echo "Email ou Senha incorreto!";
        }

    }
}