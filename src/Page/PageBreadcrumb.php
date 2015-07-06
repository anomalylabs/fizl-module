<?php namespace Anomaly\FizlModule\Page;

use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class PageBreadcrumb
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageBreadcrumb
{

    /**
     * The breadcrumb collection.
     *
     * @var BreadcrumbCollection
     */
    protected $breadcrumb;

    /**
     * Create a new PageBreadcrumb instance.
     *
     * @param BreadcrumbCollection $breadcrumb
     */
    public function __construct(BreadcrumbCollection $breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Build page breadcrumbs.
     *
     * @param Page $page
     */
    public function build(Page $page)
    {
        $this->breadcrumb->add(array_get($page->getData(), 'title'));
    }
}
