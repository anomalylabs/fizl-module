<?php namespace Anomaly\FizlModule\Page;

use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

/**
 * Class PageIterator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageIterator
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
     * Create a new PageIterator instance.
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
     * Return pages in a given path.
     *
     * @param $directory
     * @return PageCollection
     */
    public function map($directory)
    {
        $pages = new PageCollection();

        $files = $this->files->allFiles($this->application->getStoragePath('fizl/views/content/' . $directory));

        /* @var \SplFileInfo $file */
        foreach ($files as $file) {

            $path = $this->path->shorten($file->getRealPath());

            $key = trim(ltrim(str_replace($directory, '', $path), '/'), '/');

            if (ends_with($key, '/index')) {
                $key = dirname($key);
            }

            $pages->put($key, $this->factory->make($this->path->transform($path)));
        }

        return $pages;
    }
}
