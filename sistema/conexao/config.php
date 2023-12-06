<?php 
//arquivo de conexão com o banco de dados

define('HOST', 'localhost');

define('USER', 'root');

define('PASS','');

define('BASE', 'expressodivino');

$conexao = new MySQLi(HOST, USER, PASS, BASE);

