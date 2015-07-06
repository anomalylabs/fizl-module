<?php namespace Anomaly\FizlModule\Page;

use Illuminate\View\FileViewFinder;

/**
 * Class PageFinder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageFinder extends FileViewFinder
{

    protected function getPossibleViewFiles($name)
    {
        return array_map(
            function ($extension) use ($name) {
                return str_replace('.', '.', $name) . '.' . $extension;
            },
            $this->extensions
        );
    }
}
