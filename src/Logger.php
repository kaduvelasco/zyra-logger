<?php

/**
 * Zyra Logger
 *
 * @package  Logger
 * @author   Kadu Velasco (@kaduvelasco) <kadu.velasco@gmail.com>
 * @url      <https://github.com/kaduvelasco/zyra-logger>
 * @license  The MIT License (MIT) - <http://opensource.org/licenses/MIT>
 */

declare(strict_types=1);

namespace Zyra;


class Logger
{
    protected string $log_path;

    /**
     * @var array|string
     */
    private array $log_levels = ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG'];

    /**
     * Construtor da classe. Responsável por criar o arquivo de log caso ele não exista.
     *
     * @param string $log_dir
     * @param string $log_prefix
     */
    public function __construct(string $log_dir, string $log_prefix = '')
    {
        // Verifica se o diretório é válido
        if (!is_dir($log_dir)) {
            die('Log directory does not exist or is invalid');
        }

        // Verifica se já existe um arquivo de log para a data atual, se não existir um é criado.
        if (DIRECTORY_SEPARATOR !== substr($log_dir, -1)) {
            $log_dir .= DIRECTORY_SEPARATOR;
        }

        $this->log_path = $log_dir . $log_prefix . '_' . date('Y-m-d') . '.log';
    }

    /**
     * Impede o clone da classe.
     */
    private function __clone()
    {
        die('Clone não é permitido.');
    }

    /**
     * Adiciona um registro no log.
     *
     * @param string $level
     * @param string $message
     *
     * @return void
     */
    public function log(string $level, string $message): void
    {
        if (in_array($level, $this->log_levels)) {
            $this->writeInLog($level, $message);
        } else {
            $this->writeInLog('CRITICAL', 'Log level is not valid / ' . $level . ' / ' . $message);
        }
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível EMERGENCY.
     *
     * @param $message
     *
     * @return void
     */
    public function emergency($message): void
    {
        $this->writeInLog('EMERGENCY', $message);
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível ALERT.
     *
     * @param $message
     *
     * @return void
     */
    public function alert($message): void
    {
        $this->writeInLog('ALERT', $message);
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível CRITICAL.
     *
     * @param $message
     *
     * @return void
     */
    public function critical($message): void
    {
        $this->writeInLog('CRITICAL', $message);
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível ERROR.
     *
     * @param $message
     *
     * @return void
     */
    public function error($message): void
    {
        $this->writeInLog('ERROR', $message);
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível WARNING.
     *
     * @param $message
     *
     * @return void
     */
    public function warning($message): void
    {
        $this->writeInLog('WARNING', $message);
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível NOTICE.
     *
     * @param $message
     *
     * @return void
     */
    public function notice($message): void
    {
        $this->writeInLog('NOTICE', $message);
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível INFO.
     *
     * @param $message
     *
     * @return void
     */
    public function info($message): void
    {
        $this->writeInLog('INFO', $message);
    }

    /**
     * Adiciona uma linha no arquivo de log com o nível DEBUG.
     *
     * @param $message
     *
     * @return void
     */
    public function debug($message): void
    {
        $this->writeInLog('DEBUG', $message);
    }

    /**
     * Escreve uma linha no arquivo de log.
     *
     * @param string $level
     * @param string $message
     *
     * @return void
     */
    private function writeInLog(string $level, string $message): void
    {
        $log_content = sprintf('[%s] [%s]: %s%s', date('Y-m-d H:i:s'), $level, $message, PHP_EOL);

        file_put_contents($this->log_path, $log_content, FILE_APPEND);
    }

}