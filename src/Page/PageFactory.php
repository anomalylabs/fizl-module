<?php namespace Anomaly\FizlModule\Page;

/**
 * Class PageFactory
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageFactory
{

    /**
     * The page data loader.
     *
     * @var PageData
     */
    protected $data;

    /**
     * The page path resolver.
     *
     * @var PageResolver
     */
    protected $resolver;

    /**
     * The page template loader.
     *
     * @var PageTemplate
     */
    protected $template;

    /**
     * The page activator.
     *
     * @var PageActivator
     */
    protected $activator;

    /**
     * The page breadcrumb utility.
     *
     * @var PageBreadcrumb
     */
    protected $breadcrumb;

    /**
     * Create a new PageFactory instance.
     *
     * @param PageData       $data
     * @param PageResolver   $resolver
     * @param PageTemplate   $template
     * @param PageActivator  $activator
     * @param PageBreadcrumb $breadcrumb
     */
    public function __construct(
        PageData $data,
        PageResolver $resolver,
        PageTemplate $template,
        PageActivator $activator,
        PageBreadcrumb $breadcrumb
    ) {
        $this->data       = $data;
        $this->resolver   = $resolver;
        $this->template   = $template;
        $this->activator  = $activator;
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Make a page.
     *
     * @param $path
     * @return Page
     */
    public function make($path)
    {
        $page = $this->resolver->resolve($path);

        $this->data->load($page);
        $this->template->load($page);
        $this->breadcrumb->build($page);
        $this->activator->activate($page);

        return $page;
    }
}
