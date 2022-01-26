<?php

declare(strict_types=1);

namespace Zyra;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$log = new Logger(dirname(__FILE__) . DIRECTORY_SEPARATOR, 'zl');

$log->emergency('Acesso ao arquivo lista.txt sem permissão.');
$log->alert('Banco de dados indisponível.');
$log->critical('Não foi possível carregar o módulo de pagamento.');
$log->error('Não foi possível abrir o arquivo teste.txt.');
$log->warning('A imagem foto.png é maior do que 30MB. Isso causa problema de lentidão e performance.');
$log->notice('Usuário <username> realizou o login');
$log->info('O servidor está em execução desde 22/02/2020 10:30:25');
$log->debug('A função carregaImagem não apresentou problemas.');

$log->log('DEBUG', 'Tudo certo até aqui');

