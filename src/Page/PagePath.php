<?php namespace Anomaly\FizlModule\Page;

use Anomaly\Streams\Platform\Application\Application;

/**
 * Class PagePath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PagePath
{

    /**
     * The application instance.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new PagePath instance.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Transform a real path into a fizl one.
     *
     * @param $path
     * @return string
     */
    public function transform($path)
    {
        return 'fizl::content/' . $this->shorten($path);
    }

    /**
     * Shorten a path to an app relative one.
     *
     * @param $path
     * @return string
     */
    public function shorten($path)
    {
        return ltrim(
            str_replace(
                [
                    $this->application->getStoragePath('fizl/views/content/'),
                    $this->application->getStoragePath('fizl/views')
                ],
                '',
                str_replace('.twig', '', $path)
            ),
            '/'
        );
    }
}
