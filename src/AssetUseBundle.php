<?php
namespace boxhead\assetuse;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class AssetUseBundle extends AssetBundle
{
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = '@boxhead/assetuse/resources/dist';

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/main.js',
        ];

        $this->css = [
            'css/main.css',
        ];

        parent::init();
    }
}
