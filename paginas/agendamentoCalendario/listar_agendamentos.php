<?php
    session_start(); 
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
            header("Location: /sistema_agendamento/paginas/login/login.php"); 
            exit(); 
        } 
        error_reporting(E_ALL);
ini_set('display_errors', 1);

    header('Content-Type: application/json');
    require_once __DIR__ . '/../../db/conexao.php';
    $con = Conexao::getConexao();

    $query_scheduling = "SELECT 
        a.id,
        COALESCE(s.servico, p.nome) AS servico,
        a.cliente,
        a.descricao,
        a.telefone,
        a.start,
        a.end,
        a.valor,
        a.flagStatus
    FROM agendamentos a
    LEFT JOIN servicos s ON s.id = a.idServico
    LEFT JOIN pacotes p ON p.id = a.idPacote";

    $result_scheduling = $con->query($query_scheduling);

    $agendamentos = [];

    while($row_scheduling = $result_scheduling->fetch_assoc()) {

        $agendamentos[] = [
            'title' => $row_scheduling['servico'],
            'start' => $row_scheduling['start'],
            'end' => $row_scheduling['end'],
            'id' => $row_scheduling['id'],
            'cliente' => $row_scheduling['cliente'],
            'descricao' => $row_scheduling['descricao'],
            'telefone' => $row_scheduling['telefone'],
            'valor' => $row_scheduling['valor'],
            'flagStatus' => $row_scheduling['flagStatus'],
        ];
    }
    if (!$result_scheduling) {
    die("Erro na consulta SQL: " . $con->error);
}
    echo json_encode($agendamentos);

    $con->close();


//recuperar dados na query 
/*$query_scheduling = "SELECT 
    a.id,
    COALESCE(s.servico, p.nome) AS servico,
    a.cliente,
    a.descricao,
    a.telefone,
    a.start,
    a.end,
    a.valor,
    a.flagStatus
FROM agendamentos a
LEFT JOIN servicos s ON s.id = a.idServico
LEFT JOIN pacotes p ON p.id = a.idPacote";

//prepara a QUERY
$result_scheduling = $db->con->prepare($query_scheduling);

//executa a QUERY
$result_scheduling->execute();

//cria o array que recebe os eventos
$agendamentos = [];

//percorre a lista de registros retornado do banco de dados
while($row_scheduling = $result_scheduling->fetch()){
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
*/

?>