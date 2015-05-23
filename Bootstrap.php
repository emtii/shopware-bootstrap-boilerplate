<?php
/**
 * Shopware Plugin Bootstrap Boilerplate
 *
 * @author: emtii
 * @date: 23.05.15
 * @time: 01:21
 *
 */
class Shopware_Plugins_Frontend_Boilerplate_Bootstrap extends Shopware_Components_Plugin_Bootstrap {

    const PLUGIN_VERSION        = "";
    const PLUGIN_AUTHOR         = "";
    const PLUGIN_COPYRIGHT      = "";
    const PLUGIN_LABEL          = "";
    const PLUGIN_DESCRIPTION    = "";
    const PLUGIN_SUPPORT        = "";
    const PLUGIN_LINK           = "";

    const DEBUG                 = false;

    /*
     * Helper method to log ether into /logs/ or browser console.
     * Choose by using proper properties.
     *
     * @param integer $logTarget
     *      1 => file
     *      2 => browser console
     * @param string $logType e.g. info/warn/error
     * @param string $logMessage
     */
    private function log($logTarget, $logType, $logMessage) {
        if(self::DEBUG == true) {
            if($logTarget && $logType && $logMessage) {

                $logMessage .= "[" . self::PLUGIN_LABEL . "] " . $logMessage;

                switch ($logTarget) {
                    case 1:
                        $this->logToFile($logType, $logMessage);
                        break;
                    case 2:
                        $this->logToBrowserConsole($logMessage);
                        break;
                    default:
                        $this->logToFile($logType, $logMessage);
                }
            }
            else {
                return;
            }
        }
        else {
            return;
        }
    }

    /*
     * Little helper method, get used in log()
     *
     * @param integer $type
     * @param string $msg
     */
    private function logToFile($type, $msg) {
        if($type && $msg) {
            switch($type) {
                case "info":
                    Shopware()->PluginLogger()->info($msg);
                    break;
                case "warn":
                    Shopware()->PluginLogger()->warning($msg);
                    break;
                case "error":
                    Shopware()->PluginLogger()->error($msg);
                    break;
                default:
                    Shopware()->PluginLogger()->info($msg);
            }
        }
        else {
            return;
        }
    }

    /*
     * Little helper method, get used in log()
     *
     * @param string $msg
     */
    private function logToBrowserConsole($msg) {
        if($msg) {
            Shopware()->Debuglogger()->info($msg);
        }
        else {
            return;
        }
    }

} // End of Bootstrap

