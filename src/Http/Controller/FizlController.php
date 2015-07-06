<?php namespace Anomaly\FizlModule\Http\Controller;

use Anomaly\FizlModule\Page\PageResponse;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Routing\Route;

/**
 * Class FizlController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Http\Controller
 */
class FizlController extends PublicController
{

    /**
     * Return a fizl page response.
     *
     * @param PageResponse $response
     * @param Route        $route
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function view(PageResponse $response, Route $route)
    {
        return $response->send(array_get($route->getAction(), 'path'));
    }
}
