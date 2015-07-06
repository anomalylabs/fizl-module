<?php namespace Anomaly\FizlModule;

use Anomaly\FizlModule\Page\PageMapper;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/**
 * Class FizlModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule
 */
class FizlModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The event listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Addon\Event\AddonsRegistered' => [
            'Anomaly\FizlModule\Listener\RegisterFizlNamespace'
        ]
    ];

    /**
     * Map additional routes.
     *
     * @param PageMapper $mapper
     * @param Router     $router
     * @param Request    $request
     */
    public function map(PageMapper $mapper, Router $router, Request $request)
    {
        $path = ltrim($request->getRequestUri(), '/');

        if ($path = $mapper->locate($path)) {
            $router->any(
                $request->getRequestUri(),
                [
                    'uses' => 'Anomaly\FizlModule\Http\Controller\FizlController@view',
                    'path' => $path
                ]
            );
        }
    }
}
