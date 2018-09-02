<?php

namespace Fewdji\IICache\Http\Controllers;

use Illuminate\Routing\Controller;
use Fewdji\IICache\IICache;

class IICacheController extends Controller {

    public function cache($path, $preset, $filename) {
        $image = new IICache($path, $preset, $filename);
        $image->modify();
        $image->cache();
        $image->getResponse();
    }

}