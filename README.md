# Zyra Logger

<!-- Project Shields -->
[![OpenSource](https://img.shields.io/badge/OPEN-SOURCE-green?style=for-the-badge)](https://opensource.org/)
[![GitHub license](https://img.shields.io/github/license/kaduvelasco/zyra-logger?style=for-the-badge)](https://github.com/kaduvelasco/zyra-logger/blob/main/LICENSE)
[![PHP7.4](https://img.shields.io/badge/PHP-7.4-blue?style=for-the-badge)](https://www.php.net/)
[![PSR-12](https://img.shields.io/badge/PSR-12-orange?style=for-the-badge)](https://www.php-fig.org/psr/psr-12/)

> Classe simples para trabalhar com log no PHP.

>- [Começando](#-começando)
>- [Pré-requisitos](#-pré-requisitos)
>- [Instalação](#-instalação)
>- [Utilização](#-utilização)
>- [Colaborando](#-colaborando)
>- [Versão](#-versão)
>- [Autores](#-autores)
>- [Licença](#-licença)

## 🚀 Começando

Esta é uma classe simples para trabalhar com log em PHP. Ela cria um arquivo por dia, no formato `prefixo_ANO-MES-DIA.log`.

## 📋 Pré-requisitos

- PHP 7.4 ou superior

## 🔧 Instalação

Utilizando um arquivo `composer.json`:

```json
{
    "require": {
        "kaduvelasco/zyra-logger": "^1"
    }
}
```

Depois, execute o comando de instalação.

```
$ composer install
```

OU execute o comando abaixo.

```
$ composer require kaduvelasco/zyra-logger
```

## 💻 Utilização

### Diretório para armazenar os logs

O diretório onde os logs serão armazenados deve existir no servidor e possuir a permissão de escrita.

### Utilizando a Zyra Logger em seu projeto

A utilização da classe é bem simples. Veja um exemplo:

```php
declare(strict_types=1);

namespace Zyra;

require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$log = new Logger('log_directory', 'optional_log_prefix');
```

#### Registrando ocorrências no log

A classe Zyra Logger permite definir oito tipos de mensagens de log, sendo elas:

| Nível     | Descrição                                                                                                                                                         |
|-----------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| EMERGENCY | Indica uma instabilidade no sistema.                                                                                                                              |
| ALERT     | Indica uma ação que deve ser tomada imediatamente. Exemplos: site fora do ar, banco de dados indisponível, etc.                                                   |
| CRITICAL  | Indica uma condição crítica como Componente indisponível, exceção inesperada, etc.                                                                                |
| ERROR     | Indica erros de tempo de execução que não exigem ação imediata, mas normalmente devem ser registrado e monitorado.                                                |
| WARNING   | Indica ocorrências excepcionais que não são erros. Exemplo: uso de APIs obsoletas, mau uso de uma API, coisas indesejáveis que não estão necessariamente errados. |
| NOTICE    | Indica eventos normais, mas significativos.                                                                                                                       |
| INFO      | Indica eventos interessantes.                                                                                                                                     |
| DEBUG     | Indica informações detalhadas de depuração.                                                                                                                       |

```php
# Usando o método genérico
$log->log('DEBUG', 'Tudo certo até aqui');

# Usando os métodos específicos
$log->emergency('Acesso ao arquivo lista.txt sem permissão.');
$log->alert('Banco de dados indisponível.');
$log->critical('Não foi possível carregar o módulo de pagamento.');
$log->error('Não foi possível abrir o arquivo teste.txt.');
$log->warning('A imagem foto.png é maior do que 30MB. Isso causa problema de lentidão e performance.');
$log->notice('Usuário <username> realizou o login');
$log->info('O servidor está em execução desde 22/02/2020 10:30:25');
$log->debug('A função carregaImagem não apresentou problemas.');
```

O arquivo de log gerado será:

```text
[2022-01-25 16:39:59] [EMERGENCY]: Acesso ao arquivo lista.txt sem permissão.
[2022-01-25 16:39:59] [ALERT]: Banco de dados indisponível.
[2022-01-25 16:39:59] [CRITICAL]: Não foi possível carregar o módulo de pagamento.
[2022-01-25 16:39:59] [ERROR]: Não foi possível abrir o arquivo teste.txt.
[2022-01-25 16:39:59] [WARNING]: A imagem foto.png é maior do que 30MB. Isso causa problema de lentidão e performance.
[2022-01-25 16:39:59] [NOTICE]: Usuário <username> realizou o login
[2022-01-25 16:39:59] [INFO]: O servidor está em execução desde 22/02/2020 10:30:25
[2022-01-25 16:39:59] [DEBUG]: A função carregaImagem não apresentou problemas.
[2022-01-25 16:39:59] [DEBUG]: Tudo certo até aqui
```

## 🤝 Colaborando

Por favor, leia o arquivo [CONDUCT.md][link-conduct] para obter detalhes sobre o nosso código de conduta e o arquivo [CONTRIBUTING.md][link-contributing] para detalhes sobre o processo para nos enviar pedidos de solicitação.

## 📌 Versão

Nós usamos [SemVer][link-semver] para controle de versão.

Para as versões disponíveis, observe as [tags neste repositório][link-tags].

O arquivo [VERSIONS.md][link-versions] possui o histórico de alterações realizadas no projeto.

## ✒ Autores

- **Kadu Velasco** / Desenvolvedor
  - [Perfil][link-profile]
  - [Email][link-email]

## 📄 Licença 

Esse projeto está sob licença MIT. Veja o arquivo [LICENSE][link-license] para mais detalhes ou acesse [mit-license.org](https://mit-license.org/).

[⬆ Voltar ao topo](#zyra-logger)

<!-- links -->
[link-conduct]:https://github.com/kaduvelasco/zyra-logger/blob/main/CONDUCT.md
[link-contributing]:https://github.com/kaduvelasco/zyra-logger/blob/main/CONTRIBUTING.md
[link-license]:https://github.com/kaduvelasco/zyra-logger/blob/main/LICENSE
[link-versions]:https://github.com/kaduvelasco/zyra-logger/blob/main/VERSIONS.md
[link-tags]:https://github.com/kaduvelasco/zara-phptools/tags
[link-semver]:http://semver.org/
[link-profile]:https://github.com/kaduvelasco
[link-email]:mailto:kadu.velasco@gmail.com
