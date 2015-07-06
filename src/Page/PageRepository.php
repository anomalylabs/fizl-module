<?php namespace Anomaly\FizlModule\Page;

use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

/**
 * Class PageRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageRepository
{

    /**
     * The page path utility.
     *
     * @var PagePath
     */
    protected $path;

    /**
     * The file system.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * The page factory.
     *
     * @var PageFactory
     */
    protected $factory;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected $application;

    /**
     * Create a new PageRepository instance.
     *
     * @param PagePath    $path
     * @param Filesystem  $files
     * @param PageFactory $factory
     * @param Application $application
     */
    function __construct(PagePath $path, Filesystem $files, PageFactory $factory, Application $application)
    {
        $this->path        = $path;
        $this->files       = $files;
        $this->factory     = $factory;
        $this->application = $application;
    }

    /**
     * Return all pages.
     *
     * @return PageCollection
     */
    public function all()
    {
        return new PageCollection(
            array_map(
                function (\SplFileInfo $file) {
                    return $this->factory->make($this->path->transform($file->getRealPath()));
                },
                $this->files->allFiles($this->application->getStoragePath('fizl/views/content'))
            )
        );
    }
}
