<?php namespace Anomaly\FizlModule\Page;

use Anomaly\Streams\Platform\View\ViewTemplate;

/**
 * Class PageTemplate
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageTemplate
{

    /**
     * The page repository.
     *
     * @var PageRepository
     */
    protected $pages;

    /**
     * The view template.
     *
     * @var ViewTemplate
     */
    protected $template;

    /**
     * Create a new PageTemplate instance.
     *
     * @param PageRepository $pages
     * @param ViewTemplate   $template
     */
    public function __construct(ViewTemplate $template, PageRepository $pages)
    {
        $this->pages    = $pages;
        $this->template = $template;
    }

    /**
     * Load template data.
     *
     * @param Page $page
     */
    public function load(Page $page)
    {
        $this->template->set('page', $page);

        $this->template->set('title', array_get($page->getData(), 'title'));

        array_set($page, 'fizl', ['pages' => $this->pages->all()]);
    }
}
