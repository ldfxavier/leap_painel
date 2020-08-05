<?php

/**
 * CONFIGURAÇÃO GERAL DO HEADER
 **/
$header = [
    'titulo' => 'Leap',
    'descricao' => 'Painel administativo',
    'imagem' => '{{LINK}}/images/social.png',
    'robots' => 'noindex, nofollow',
    'keywords' => 'painel, admin, cpanel',
    'viewport' => true,
    'charset' => 'utf-8',
];

/**
 * CONFIGURAÇÕES GERIAS DO SITE
 **/
$config = [
    'erro' => true,
    'fuso' => 'America/Sao_Paulo',
    'https' => 'auto',
    'www' => 'auto',
    'emailsistema' => 'ldfxavier@gmail.com',
];

/**
 * CONFIGURAÇÃO DE IMAGENS PADRÕES DO SISTEMA
 **/
$imagem = [
    'logo' => '{{LINK}}/images/logo.png',
    'favicon' => '{{LINK}}/images/favicon.png',
];

/**
 * LINKS DO SISTEMA
 **/
$link = [
    'link' => array('localhost', 'painel.leap.art.br', 'leap.umprogramador.com.br'),
    'painel' => 'https://painel.leap.art.br/painel',
    'arquivo' => 'https://painel.leap.art.br/arquivos',
    'diretorio' => 'arquivos',
];

/**
 * CONFIGURAÇÃO DO PDO
 **/
$pdo = [
    'host' => 'localhost',
    'banco' => 'leap',
    'usuario' => 'leap',
    'senha' => 'Leap@1324',
];

/**
 * APIs DO GOOGLE
 **/
$google = [
    'analytics' => false,
    'client_id' => '',
    'client_key' => '',
];

/**
 * API DO FACEBOOK
 **/
$facebook = [
    'key' => '',
];

/**
 * LINK DAS REDES SOCIAIS
 **/
$social = [
    'google' => null,
    'facebook' => null,
    'instagram' => null,
    'twitter' => null,
    'pinterest' => null,
];

/**
 * DADOS OPCIONAIS DO SISTEMA
 **/
$opcionais = [];
