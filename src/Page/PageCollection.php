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
     * Return pages within a path.
     *
     * @return PageCollection
     */
    public function in($path)
    {
        $pages = [];

        $path = str_replace(['.'], '-', $path);

        /* @var Page $item */
        foreach ($this->items as $item) {

            $key = str_replace($path . '/', '', $item->getPath());

            /**
             * Skip index files because they
             * belong 1 level higher.
             */
            if (ends_with($key, '/index')) {
                continue;
            }

            if (strpos($key, '/') === false) {
                $pages[] = $item;
            }
        }

        return new static($pages);
    }
}
