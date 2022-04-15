<?php
$pdo = new PDO('mysql:host=dhqm1449.odns.fr;dbname=dhqm1449_steve;charset=utf8',
'dhqm1449_steve','McSU2VaSTMEO',
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$query = $pdo->prepare("select * from user");
$query->execute();

$data = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($data);