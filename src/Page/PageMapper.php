<?php namespace Anomaly\FizlModule\Page;

use Illuminate\Http\Request;
use Illuminate\View\Factory;

/**
 * Class PageMapper
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageMapper
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * Create a new PageMapper instance.
     *
     * @param Factory $view
     * @param Request $request
     */
    function __construct(Factory $view, Request $request)
    {
        $this->view    = $view;
        $this->request = $request;
    }

    /**
     * Locate and return the page.
     *
     * @param $path
     * @return bool|string
     */
    public function locate($path)
    {
        $path = 'fizl::' . $path;

        if ($this->view->exists($path) || $this->view->exists($path .= '/index')) {
            return $path;
        }

        return false;
    }
}
