<?php namespace App\Http\Controllers;

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

    /**
     * Make a view
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $viewData Data that will be passed to the View only, so it will not be visible in Json responses
     * @return Illuminate\Support\Contracts\RenderableInterface a renderable View or Response object
     */
    protected function render($view, $data = array(), $viewData = array())
    {
        return view($view, array_merge($data, $viewData));
    }

}
