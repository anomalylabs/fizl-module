<?php namespace Anomaly\FizlModule\Page;

use Illuminate\Routing\Route;
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
     * The route instance.
     *
     * @var Route
     */
    protected $route;

    /**
     * Create a new PageResolver instance.
     *
     * @param Factory $view
     * @param Route   $route
     */
    function __construct(Factory $view, Route $route)
    {
        $this->view  = $view;
        $this->route = $route;
    }

    /**
     * Locate and return the page.
     *
     * @return \Illuminate\View\View
     */
    public function resolve()
    {
        return $this->view->make(array_get($this->route->getAction(), 'path'));
    }
}
