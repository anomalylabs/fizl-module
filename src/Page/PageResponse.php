<?php namespace Anomaly\FizlModule\Page;

use Illuminate\Routing\ResponseFactory;

/**
 * Class PageResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageResponse
{

    /**
     * The page factory.
     *
     * @var PageFactory
     */
    protected $factory;

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new PageResponse instance.
     *
     * @param PageFactory     $factory
     * @param ResponseFactory $response
     */
    public function __construct(PageFactory $factory, ResponseFactory $response)
    {
        $this->factory  = $factory;
        $this->response = $response;
    }

    /**
     * Make the page response.
     *
     * @param $path
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function make($path)
    {
        $page = $this->factory->make($path);

        $response = $this->response->make();

        $response->setContent($page->render());

        return $response;
    }

    /**
     * Send the page response.
     *
     * @param $path
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function send($path)
    {
        $response = $this->make($path);

        return $response->send();
    }
}
