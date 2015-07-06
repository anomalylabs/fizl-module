<?php namespace Anomaly\FizlModule\Page;

use Anomaly\Streams\Platform\Support\Collection;

/**
 * Class PageCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageCollection extends Collection
{

    /**
     * Return only pages.
     *
     * @return PageCollection
     */
    public function pages($path)
    {
        $pages = [];

        $path = str_replace(['.'], '-', $path);

        /* @var Page $item */
        foreach ($this->items as $item) {

            $key = str_replace($path . '/', '', $item->getPath());

            if (strpos($key, '/') === false || $path == $item->getPath()) {
                $pages[] = $item;
            }
        }

        return new static($pages);
    }
}
