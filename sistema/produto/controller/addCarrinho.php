<?php

include('../../../sistema/conexao');
session_start();

$data = json_decode($_POST['data'], true);

$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();

// Variável que é alterada caso o produto exista no carrinho
$produto_existente = false;

// Verificação se o produto já existe no carrinho
// Percorre o carrinho
foreach ($carrinho as $item) {
    // Se o produto já existe, aumenta a quantidade
    if ($item['id'] == $data['id']) {
        $carrinho[$item['id']]['quantidade'] += 1;
        $produto_existente = true;
        break;
    }
}

// Se o produto não existir no carrinho, a gente adiciona aqui
if (!$produto_existente) {
    // Aqui eu adiciono o atributo 'quantidade' em produto (por padrão começa com 1)
    // Antes o valor de data comportava apenas os valores enviados por padrão, ex: $data = [nome, foto, descrição, valor, ...]
    // Com essa modificação que fiz agr, o valor em "quantidade" agr é: $data = [nome, foto, descrição, valor, ..., QUANTIDADE]
    $data['quantidade'] = 1;
    $carrinho[$data['id']] = $data;
}

// Atualiza a session 'carrinho' com os produtos atualizados
$_SESSION['carrinho'] = $carrinho;

