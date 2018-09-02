<?php

namespace Fewdji\IICache;

use Exception;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class IICacheImageModifier
{
    protected $image;
    protected $preset;
    protected $params;

    public function __construct(Image $image, $preset)
    {
        $this->image = $image;
        $this->preset = $preset;
    }

    private function getParams()
    {
        $config = config('ii-cache.presets.'.$this->preset);
        if (!is_array($config)) {
            throw new Exception('Wrong config!');
        }
        $this->params = $config;
    }

    private function applyMods()
    {
        $quality = null;
        if (!is_array($this->params)) {
            throw new Exception('Wrong params!');
        }
        foreach ($this->params as $param => $value) {
                if ($param == 'watermark') {
                    $this->setWatermark();
                } elseif ($param == 'quality') {
                    $quality = $value;
                } else {
                    $this->image->$param(...(array)$value);
                }
        }
        $this->image->stream(null, $quality);
    }

    public function setWatermark()
    {
        $wm_config = config('ii-cache.watermarks.'.$this->params['watermark']);
        $manager = new ImageManager(['driver' => config('ii-cache.driver')]);
        $wm = $manager->make($wm_config['path']);

        $image_width = $this->image->width();

        $wm->widen($image_width * $wm_config['size'] / 100);
        $this->image->insert($wm, $wm_config['position']);
    }

    public function getResult()
    {
        $this->getParams();
        $this->applyMods();
        return $this->image;
    }

}