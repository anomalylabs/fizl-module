<?php namespace Anomaly\FizlModule\Page;

use Illuminate\Http\Request;

/**
 * Class PageActivator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageActivator
{

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * Create a new PageActivator instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Active the page if active.
     *
     * @param Page $page
     */
    public function activate(Page $page)
    {
        if ($page->getPath() == ltrim(str_replace(['.'], '-', $this->request->getRequestUri()), '/')) {
            $page->setActive(true);
        }
    }
}
