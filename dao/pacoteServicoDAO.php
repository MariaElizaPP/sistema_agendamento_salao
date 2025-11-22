<?php
require_once __DIR__ . '/../db/conexao.php';
require_once __DIR__ . '/../models/Servico.php';

class PacoteServicoDAO{

    public function adicionarServicos($idPacote, $servicos){
        $con = Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO pacote_servicos (id_pacote, id_servico) VALUES (?,?)");
        foreach ($servicos as $idServico){
            $stmt->bind_param("ii", $idPacote, $idServico);
            $stmt->execute();
        }
        $stmt->close();
        $con->close();
    }

    public function buscarServicosPacotes($idPacote){
        $con = Conexao::getConexao();
        $stmt = $con->prepare("
            SELECT s.id, s.servico, s.valor, s.duracao, s.descricao, s.status
            FROM servicos s
            INNER JOIN pacote_servicos ps ON ps.id_servico = s.id
            WHERE ps.id_pacote = ?
        ");
        $stmt->bind_param("i", $idPacote);
        $stmt->execute();
        $result = $stmt->get_result();
        $lista = [];
        while($row = $result->fetch_assoc()){
            $s =  new Servico();
            $s->setId($row['id']);
            $s->setServico($row['servico']);
            $s->setValor($row['valor']);
            $s->setDuracao($row['duracao']);
            $lista[] = $s;
        }
        $stmt->close();
        $con->close();
        return $lista;
    }


}