<?php
/**
 * Asset Use plugin for Craft CMS 3.x
 *
 * See what assets are and aren't being used across your site
 *
 * @link      https://boxhead.io
 * @copyright Copyright (c) 2018 Boxhead
 */

namespace boxhead\assetuse;

use boxhead\assetuse\services\AssetUseService;
use boxhead\assetuse\variables\AssetUseVariable;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class AssetUse
 *
 * @author    Boxhead
 * @package   AssetUse
 * @since     1.0.0
 *
 * @property  AssetUseServiceService $assetUseService
 */
class AssetUse extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var AssetUse
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('assetUse', AssetUseVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'asset-use',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
