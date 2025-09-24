<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../db/conexao.php';

//recuperar dados na query 
$query_scheduling= "SELECT id, servico, cliente, descricao, telefone, start, end, valor, flagStatus FROM agendamentos";

//prepara a QUERY
$result_scheduling = $db->con->prepare($query_scheduling);

//executa a QUERY
$result_scheduling->execute();

//cria o array que recebe os eventos
$agendamentos = [];

//percorre a lista de registros retornado do banco de dados
while($row_scheduling = $result_scheduling->fetch(PDO::FETCH_ASSOC)){
    //extrair o array
    extract($row_scheduling);

    //pegar a variavel e receber um array conforme o conteudo estatico do custom, o JSON:
    $agendamentos[] = [
        //precisa ser em inglês para retornar para o javascript
        
        'title' => $servico, //aparece esse no calendário
        'start' => $start,
        'end' => $end,
        'id' => $id,
        'cliente' => $cliente,
        'descricao' => $descricao,
        'telefone' => $telefone,
        'valor' => $valor,
        'flagStatus' => $flagStatus,
    ];

}

echo json_encode($agendamentos);


?>