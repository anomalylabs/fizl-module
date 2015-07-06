<?php namespace Anomaly\FizlModule;

use Anomaly\FizlModule\Page\PageRepository;

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
     * The page repository.
     *
     * @var PageRepository
     */
    protected $pages;

    /**
     * Create a new FizlModulePluginFunctions instance.
     *
     * @param PageRepository $pages
     */
    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Return Fizl pages.
     *
     * @param null $path
     * @return Page\PageCollection
     */
    public function pages($path = null)
    {
        $pages = $this->pages->all();

        if ($path) {
            return $pages->in($path);
        }

        return $pages;
    }
}
