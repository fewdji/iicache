<?php

namespace Fewdji\IICache;

class IICacheImageLinkGenerator {

    protected $path;
    protected $filename;
    protected $preset;

    public function __construct($path, $filename, $preset)
    {
        $this->path = $path;
        $this->filename = $filename;
        $this->preset = $preset;
    }

    public function imageLink()
    {
        return config('ii-cache.image_path') . '/' . $this->path . '/' . $this->preset . '/' . $this->filename;
    }

    public function imageTag($args)
    {
        $attr_str = '';
        if (isset($args[3]) and is_array($args[3])) {
            foreach ($args[3] as $a => $v) {
                $attr_str .= ' ' . $a . '="' . $v . '"';
            }
        }
        return '<img src="' . $this->imageLink() . '"' . $attr_str . '/>';
    }
}
