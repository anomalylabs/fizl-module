<?php namespace Anomaly\FizlModule;

use Anomaly\FizlModule\Page\PageIterator;

/**
 * Class FizlModulePluginFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule
 */
class FizlModulePluginFunctions
{

    /**
     * The page iterator.
     *
     * @var PageIterator
     */
    protected $iterator;

    /**
     * Create a new FizlModulePluginFunctions instance.
     *
     * @param PageIterator $iterator
     */
    public function __construct(PageIterator $iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * Return the page map from a given path.
     *
     * @param $path
     * @return Page\PageCollection
     */
    public function map($path)
    {
        return $this->iterator->map($path);
    }
}
