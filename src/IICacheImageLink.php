<?php

namespace Fewdji\IICache;

class IICacheImageLink {

    public function link($type, $args = [])
    {
        $image = new IICacheImageLinkGenerator(...$args);

        if ($type == 'link') {
            return $image->imageLink();
        }

        return $image->imageTag($args);
    }
}
