<?php namespace
App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * BaseController Class
 *
 * Contains behavior that is common to all controllers
 */
abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    public function __construct()
    {

    }

    /**
     * Make a view
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $viewData Data that will be passed to the View only, so it will not be visible in Json responses
     *
     * @return Illuminate\Support\Contracts\RenderableInterface a renderable View or Response object
     */
    protected function render($view, $data = array(), $viewData = array())
    {
        return view($view, array_merge($data, $viewData));
    }

    /**
     * Create a new redirect response to the given path.
     *
     * @param  string  $path
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function goToUrl($path, $status = 302, $headers = array(), $secure = null)
    {
        return redirect($path, $status, $headers, $secure);
    }
    /**
     * Create a new redirect response to a controller action.
     *
     * @param  string  $action
     * @param  array   $parameters
     * @param  int     $status
     * @param  array   $headers
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function goToAction($action, $parameters = array(), $status = 302, $headers = array())
    {
        return redirect()->action($action, $parameters, $status, $headers);
    }

}
