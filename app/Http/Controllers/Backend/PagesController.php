<?php
namespace App\Http\Controllers\Backend;

use App;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Blog\Cms\PageRepository;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $pageRepository;

    /**
     * Injects dependencies into controller
     *
     * @param PageRepository $repo
     */
    public function __construct(PageRepository $repo)
    {
        parent::__construct();
        $this->pageRepository = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page = Input::get('page', 0);

        $pages = $this->pageRepository->all($page);

        return $this->render('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $page = App::make('Blog\Cms\Page');

        return $this->render('backend.pages.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $page  = $this->pageRepository->createNew($input);

        if (count($page->errors()) == 0) {
            return $this->goToAction(
                'App\Http\Controllers\Backend\PagesController@edit',
                ['id' => $page->id ]
           );
        } else {
            return $this->goToAction('App\Http\Controllers\Backend\PagesController@create')
                ->withInput($input)
                ->withErrors($page->errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $page = $this->pageRepository->findOrFail($id);

        return $this->render('backend.pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->pageRepository->findOrFail($id);

        return $this->render('backend.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $page  = $this->pageRepository->update($id, $input);

        if (! $page->errors()) {
            return $this->goToAction('App\Http\Controllers\Backend\PagesController@edit', ['id' => $page->id ])
                ->withInput($input);
        } else {
            return $this->goToAction('App\Http\Controllers\Backend\PagesController@edit', ['id' => $page->id ])
                ->withInput($input)
                ->withErrors($page->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deleted = $this->pageRepository->delete($id);

        return $this->goToAction('App\Http\Controllers\Backend\PagesController@index');
    }
}
