<?php
declare(strict_types = 1);

/**
 * Class Logger
 *
 * @category   Bestit
 * @package    Bestit
 * @subpackage Bootstrap
 * @author     Marcel Thiesies <thiesies@bestit-online.dem>
 * @copyright  2016 best it GmbH & Co. KG
 * @license    http://www.bestit-online.de proprietary
 * @link       http://www.bestit-online.de
 */
class Shopware_Plugins_Frontend_Boilerplate_Bootstrap
    extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * Returns plugin meta data if file is available.
     *
     * @return mixed
     * @throws Exception
     */
    private function _getPluginJson()
    {
        $json = json_decode(
            file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'plugin.json'),
            true
        );

        if (is_array($json) === true) {
            return $json;
        } else {
            throw new Exception('Cannot find plugin.json file.');
        }
    }

    /**
     * Returns plugin information.
     *
     * @return array
     * @throws Exception
     */
    public function getInfo()
    {
        $json = $this->_getPluginJson();

        return array(
            'version' => $json['currentVersion'],
            'label' => $json['label']['de'],
            'copyright' => $json['copyright'],
            'author' => $json['author'],
            'supplier' => $json['supplier'],
            'description' => $json['description'],
            'support' => $json['support'],
            'link' => $json['link']
        );
    }

    /**
     * Get Plugin Version, check for version.
     *
     * @return mixed
     * @throws Exception
     */
    public function getVersion()
    {
        $json = $this->_getPluginJson();

        if ($json) {
            return $json['currentVersion'];
        } else {
            throw new Exception('The plugin has an invalid version file.');
        }
    }

    /**
     * Install plugin.
     *
     * @return mixed
     * @throws Exception
     */
    public function install()
    {
        $json = $this->_getPluginJson();
        $minVersion = $json['compatibility']['minimumVersion'];

        if (!$this->assertMinimumVersion($minVersion)) {
            throw new \RuntimeException(
                'At least Shopware ' . $minVersion . ' is required'
            );
        }

        return true;
    }

    /**
     * Uninstall plugin.
     *
     * @return bool
     */
    public function uninstall()
    {
        return true;
    }

    /**
     * Update plugin.
     *
     * @param string $oldVersion old plugin version
     *
     * @return boolean
     */
    public function update($oldVersion)
    {
        return true;
    }

    public function foobarTest()
    {
    }
}

