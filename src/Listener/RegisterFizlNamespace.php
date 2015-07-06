<?php namespace Anomaly\FizlModule\Listener;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Asset\Asset;
use Anomaly\Streams\Platform\Image\Image;
use Illuminate\View\Factory;

/**
 * Class RegisterFizlNamespace
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Listener
 */
class RegisterFizlNamespace
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The asset utility.
     *
     * @var Asset
     */
    protected $asset;

    /**
     * The image utility.
     *
     * @var Image
     */
    protected $image;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new RegisterFizlNamespace instance.
     *
     * @param Factory     $view
     * @param Asset       $asset
     * @param Image       $image
     * @param Application $application
     */
    function __construct(Factory $view, Asset $asset, Image $image, Application $application)
    {
        $this->view        = $view;
        $this->asset       = $asset;
        $this->image       = $image;
        $this->application = $application;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        $this->asset->addPath('fizl', $this->application->getStoragePath('fizl/resources'));
        $this->image->addPath('fizl', $this->application->getStoragePath('fizl/resources'));
        $this->view->addNamespace('fizl', $this->application->getStoragePath('fizl/views'));
    }
}
