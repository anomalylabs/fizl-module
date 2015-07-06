<?php namespace Anomaly\FizlModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class FizlModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule
 */
class FizlModulePlugin extends Plugin
{

    /**
     * The plugin functions.
     *
     * @var FizlModulePluginFunctions
     */
    protected $functions;

    /**
     * Create a new FizlModulePlugin instance.
     *
     * @param FizlModulePluginFunctions $functions
     */
    public function __construct(FizlModulePluginFunctions $functions)
    {
        $this->functions = $functions;
    }

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('fizl_map', [$this->functions, 'map'])
        ];
    }
}
