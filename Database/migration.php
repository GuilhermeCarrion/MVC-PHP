<?php

require_once __DIR__ . '/Database.php';

$sql = <<<SQL

CREATE TABLE IF NOT EXISTS usuarios(
  id integer primary key not null,
  nome varchar(50) default('Usuario'),
  email varchar(100) unique not null,
  senha varchar(100) not null
);


CREATE TABLE IF NOT EXISTS livros(
  id integer primary key not null,
  titulo varchar(100) not null,
  autor varchar(100) not null,
  descricao text,
  nota integer default(0)
);
SQL;

Database::getInstance()->exec($sql);
echo "Tables criadas com sucesso!";
