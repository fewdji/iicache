<?php

namespace Fewdji\IICache;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class IICache {
    protected $source_path;
    protected $preset;
    protected $filename;
    protected $image;

    public function __construct($path, $preset, $filename)
    {
        $this->source_path = $path;
        $this->preset = $preset;
        $this->filename = $filename;
    }

    public function getSourceImage()
    {
        return Storage::get('private/'.config('ii-cache.images_path').'/'.$this->source_path.'/'.$this->filename);
    }

    public function makeInterventionImageInstance()
    {
        $manager = new ImageManager(['driver' => config('ii-cache.driver')]);
        return $manager->make($this->getSourceImage());
    }

    public function modify()
    {
        $modifier = new IICacheImageModifier($this->makeInterventionImageInstance(), $this->preset);
        $this->image = $modifier->getResult();
    }

    public function cache()
    {
        Storage::put('public/'.config('ii-cache.images_path').'/'.$this->source_path.'/'.$this->preset.'/'.$this->filename, $this->image);
    }

    public function getResponse()
    {
        $this->image->response();
    }
}
