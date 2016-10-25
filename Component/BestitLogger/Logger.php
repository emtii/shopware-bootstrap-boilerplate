<?php
declare(strict_types=1);

namespace Bestit\Logger;

/**
 * Class Logger
 *
 * @category   Bestit
 * @package    Bestit
 * @subpackage Logger
 * @author     Marcel Thiesies <thiesies@bestit-online.de>
 * @copyright  2016 best it GmbH & Co. KG
 * @license    http://www.bestit-online.de proprietary
 * @link       http://www.bestit-online.de
 */
class Logger
{
    /**
     * Helper method to log ether into /logs/ or browser console.
     * Choose by using proper properties.
     *
     * @param integer $logTarget  Log to File or Browser Console
     *      1 => file
     *      2 => browser console
     * @param string  $logType    type of log entry e.g. info/warn/error
     * @param string  $logMessage message you want to log
     *
     * @return void
     */
    public function log($logTarget, $logType, $logMessage)
    {
        if ($logTarget && $logType && $logMessage) {
            switch ($logTarget) {
            case 1:
                $this->_logToFile($logType, $logMessage);
                break;
            case 2:
                $this->_logToBrowserConsole($logMessage);
                break;
            default:
                $this->_logToFile($logType, $logMessage);
            }
        } else {
            return;
        }
    }

    /**
     * Little helper method, get used in log()
     *
     * @param integer $type type of log entry e.g. info/warn/error
     * @param string  $msg  message you want to log
     *
     * @return void
     */
    private function _logToFile($type, $msg)
    {
        if ($type && $msg) {
            switch ($type) {
            case 'info':
                Shopware()->PluginLogger()->info($msg);
                break;
            case 'warn':
                Shopware()->PluginLogger()->warning($msg);
                break;
            case 'error':
                Shopware()->PluginLogger()->error($msg);
                break;
            default:
                Shopware()->PluginLogger()->info($msg);
            }
        } else {
            return;
        }
    }

    /**
     * Little helper method, get used in log()
     *
     * @param string $msg message you want to log
     *
     * @return void
     */
    private function _logToBrowserConsole($msg)
    {
        if ($msg) {
            Shopware()->Debuglogger()->info($msg);
        } else {
            return;
        }
    }
}
