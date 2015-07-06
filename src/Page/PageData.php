<?php namespace Anomaly\FizlModule\Page;

use Symfony\Component\Yaml\Yaml;

/**
 * Class PageData
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class PageData
{

    /**
     * The YAML parser.
     *
     * @var Yaml
     */
    protected $yaml;

    /**
     * Create a new PageData instance.
     *
     * @param Yaml $yaml
     */
    function __construct(Yaml $yaml)
    {
        $this->yaml = $yaml;
    }

    /**
     * Load page's data.
     *
     * @param Page $page
     */
    public function load(Page $page)
    {
        $contents = file_get_contents($page->getViewPath());

        if (starts_with($contents, '{#')) {
            foreach ($this->yaml->parse(substr($contents, 2, strpos($contents, '#}'))) as $key => $value) {
                $page[$key] = $value;
            }
        }
    }
}
