<?php

namespace Fewdji\Iicache\Http\Controllers;

use Fewdji\Iicache\Iicache;
use Illuminate\Routing\Controller;

class IicacheController extends Controller {

    public function index($path, $preset, $filename) {
        $instance = new Iicache();
        $instance->cache($path, $preset, $filename);
    }
}