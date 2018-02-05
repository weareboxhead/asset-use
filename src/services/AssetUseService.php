<?php
/**
 * Asset Use plugin for Craft CMS 3.x
 *
 * See what assets are and aren't being used across your site
 *
 * @link      https://boxhead.io
 * @copyright Copyright (c) 2018 Boxhead
 */

namespace boxhead\assetuse\services;

use boxhead\assetuse\AssetUse;

use Craft;
use craft\base\Component;

/**
 * @author    Boxhead
 * @package   AssetUse
 * @since     1.0.0
 */
class AssetUseService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    private $thumbParams = array(
        'mode'      => 'crop',
        'width'     => 30,
        'height'    => 30,
    );

    public function getImageThumb($image)
    {
        // Inline the width and height here for svgs which we can't manipulate
        ?>

        <a href="<?php echo $image->getUrl(); ?>" target="_blank" title="View full image">
            <img
                class="thumb"
                src="<?php echo $image->getUrl($this->thumbParams); ?>"
                style="width: <?php echo $this->thumbParams['width']; ?>px; height: <?php echo $this->thumbParams['height']; ?>"
            >
        </a>

        <?php
    }


    public function getFormattedFilesize($asset)
    {
        $size = $asset->size;

        return Craft::$app->getView()->renderTemplate('asset-use/filters/_filesize', array('size' => $size));
    }


    public function getAllMatrixFieldsHandles()
    {
        $matrixFieldsHandles    = array();
        $fieldsService          = Craft::$app->getFields();

        foreach ($fieldsService->getAllFields() as $field)
        {
            if (strpos(get_class($field), 'Matrix' !== false))
            {
                $matrixFieldsHandles[] = $field->handle;
            }
        }

        return $matrixFieldsHandles;
    }
}
