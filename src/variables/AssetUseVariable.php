<?php
/**
 * Asset Use plugin for Craft CMS 3.x
 *
 * See what assets are and aren't being used across your site
 *
 * @link      https://boxhead.io
 * @copyright Copyright (c) 2018 Boxhead
 */

namespace boxhead\assetuse\variables;

use boxhead\assetuse\AssetUse;
use boxhead\assetuse\services\AssetUseService;

use Craft;

/**
 * @author    Boxhead
 * @package   AssetUse
 * @since     1.0.0
 */
class AssetUseVariable
{
    // Public Methods
    // =========================================================================

    public function getImageThumb($image)
    {
        return AssetUse::$plugin->assetUseService->getImageThumb($image);
    }

    public function getFormattedFilesize($asset)
    {
        return AssetUse::$plugin->assetUseService->getFormattedFilesize($asset);
    }

    public function getAllMatrixFieldsHandles()
    {
        return AssetUse::$plugin->assetUseService->getAllMatrixFieldsHandles();
    }
}
