<?php namespace Anomaly\FizlModule\Http\Controller;

use Anomaly\FizlModule\Page\PageResolver;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Routing\Route;
use Illuminate\View\Factory;

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
     * Return a routed view.
     *
     * @param Route   $route
     * @param Factory $view
     */
    public function view(PageResolver $resolver)
    {
        $view = $resolver->resolve();

        return $view->render();
    }
}
