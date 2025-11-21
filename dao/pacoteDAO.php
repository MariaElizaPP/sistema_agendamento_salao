<?php

require_once __DIR__ . '/../models/pacoteModel.php';
require_once __DIR__ . '/../db/conexao.php';

/*class PacoteDAO{

    public function salvar(Pacote $pacote)
    {
        $con =  Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO pacotes (nome, descricao, quantidade_sessoes, valor_total) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", 
            $pacote->getNome(),
            $pacote->getDescricao(),
            $pacote->getQtdSessoes(),
            $pacote->getValor()
        );
        $stmt->execute();
        $stmt->close();
        $con->close();
    }

    public function atualizar(Pacote $pacote){
        $con = Conexao::getConexao();

        $stmt = $con->prepare("UPDATE pacotes SET  nome=?, descricao=?, quantidade_sessoes=?, valor_total=? WHERE id=?");
        $stmt->bind_param(
            "ssdii",
            $pacote->getNome(),
            $pacote->getDescricao(),
            $pacote->getQtdSessoes(),
            $pacote->getValor(),
            $pacote->getId()
        );
            

        $stmt->execute();
        $stmt->close();
        $con->close();

    }

    public function excluir(Pacote $pacote)
    {
        $conn =  Conexao::getConexao();
        $stmt = $conn->prepare("DELETE FROM pacotes WHERE id=?");
        $stmt->bind_param("i", $pacote->getId());
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function listar()
    {
        $con =  Conexao::getConexao();
        $result = $con->query("SELECT id, nome, descricao, quantidade_sessoes, valor_total FROM pacotes");
        $pacotes = [];
        while ($row = $result->fetch_assoc()) {
            $pacote = new Pacote();
            $pacote->setId($row['id']);
            $pacote->setNome($row['nome']);
            $pacote->setValor($row['valor_total']);
            $pacote->setDescricao($row['descricao']);
            $pacote->setQtdSessoes($row['quantidade_sessoes']);
            $pacotes[] = $pacote;
        }
        $con->close();
        return $pacotes;
    }


}*/

class PacoteDAO {

    public function salvar(Pacote $pacote)
    {
        $con = Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO pacotes (nome, descricao, quantidade_sessoes, valor_total) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $con->error);
        }

        // nome (s), descricao (s), quantidade_sessoes (i), valor_total (d)
        $stmt->bind_param("ssid",
            $pacote->getNome(),
            $pacote->getDescricao(),
            $pacote->getQtdSessoes(),
            $pacote->getValorTotal()
        );

        if (!$stmt->execute()) {
            $err = $stmt->error;
            $stmt->close();
            $con->close();
            throw new Exception("Execute failed (salvar): " . $err);
        }

        $stmt->close();
        $con->close();
    }

    public function atualizar(Pacote $pacote){
        $con = Conexao::getConexao();

        $stmt = $con->prepare("UPDATE pacotes SET nome=?, descricao=?, quantidade_sessoes=?, valor_total=? WHERE id=?");
        $stmt->bind_param(
            "ssidi",
            $pacote->getNome(),
            $pacote->getDescricao(),
            $pacote->getQtdSessoes(),
            $pacote->getValorTotal(),
            $pacote->getId()
        );

        $stmt->execute();
        $stmt->close();
        $con->close();
    }

    public function excluir(Pacote $pacote)
    {
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare("DELETE FROM pacotes WHERE id=?");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("i", $pacote->getId());
        if (!$stmt->execute()) {
            $err = $stmt->error;
            $stmt->close();
            $conn->close();
            throw new Exception("Execute failed (excluir): " . $err);
        }
        $stmt->close();
        $conn->close();
    }

    public function listar()
    {
        $con = Conexao::getConexao();
        $result = $con->query("SELECT id, nome, descricao, quantidade_sessoes, valor_total FROM pacotes");
        if (!$result) {
            throw new Exception("Query failed (listar): " . $con->error);
        }
        $pacotes = [];
        while ($row = $result->fetch_assoc()) {
            $pacote = new Pacote();
            $pacote->setId($row['id']);
            $pacote->setNome($row['nome']);
            $pacote->setValorTotal($row['valor_total']);
            $pacote->setDescricao($row['descricao']);
            $pacote->setQtdSessoes($row['quantidade_sessoes']);
            $pacotes[] = $pacote;
        }
        $con->close();
        return $pacotes;
    }

    public function buscarPorId(int $id): ?Pacote
    {
        $con = Conexao::getConexao();
        $stmt = $con->prepare("SELECT id, nome, descricao, quantidade_sessoes, valor_total FROM pacotes WHERE id = ?");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $stmt->close();
        $con->close();

        if (!$row) return null;

        $pacote = new Pacote();
        $pacote->setId($row['id']);
        $pacote->setNome($row['nome']);
        $pacote->setDescricao($row['descricao']);
        $pacote->setQtdSessoes($row['quantidade_sessoes']);
        $pacote->setValorTotal($row['valor_total']);
        return $pacote;
    }
}


