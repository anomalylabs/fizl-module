<?php namespace Anomaly\FizlModule\Page;

use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class Page
 *
 * @method getData()
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FizlModule\Page
 */
class Page implements \ArrayAccess
{

    /**
     * The active flag.
     *
     * @var bool
     */
    protected $active = false;

    /**
     * The response object.
     *
     * @var null|Response
     */
    protected $response = null;

    /**
     * The page view.
     *
     * @var View
     */
    protected $view;

    /**
     * Create a new Page instance.
     *
     * @param View $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * Render the path.
     *
     * @return string
     */
    public function render()
    {
        return $this->view->render();
    }

    /**
     * Check for an offset.
     *
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->view->getData());
    }

    /**
     * Get an offset.
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return array_get($this->view->getData(), $offset);
    }

    /**
     * Set an offset value.
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->view[$offset] = $value;
    }

    /**
     * Unset an offset value.
     *
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->view, $offset);
    }

    /**
     * Return the active flag.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Set the active flag.
     *
     * @param $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the response.
     *
     * @return null|Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param Response $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get the page path.
     *
     * @return string
     */
    public function getPath()
    {
        $needle = 'fizl/views/content/';

        return trim(
            str_replace(
                ['index.twig', '.twig'],
                '',
                substr($this->view->getPath(), strpos($this->view->getPath(), $needle) + strlen($needle))
            ),
            '/'
        );
    }

    /**
     * Get the page view.
     *
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Get the page's view path.
     *
     * @return string
     */
    public function getViewPath()
    {
        return $this->view->getPath();
    }

    /**
     * Map calls to the page's view object.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return call_user_func_array([$this->view, $name], $arguments);
    }
}
