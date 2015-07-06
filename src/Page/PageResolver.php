<?php namespace Anomaly\FizlModule\Page;

use Illuminate\View\Factory;

/**
 * Class PageResolver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageResolver
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * Create a new PageResolver instance.
     *
     * @param Factory $view
     */
    function __construct(Factory $view)
    {
        $this->view = $view;
    }

    /**
     * Resolve a path to a page.
     *
     * @param $path
     * @return Page
     */
    public function resolve($path)
    {
        return new Page($this->view->make($path));
    }
}
