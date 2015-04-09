<?php
namespace App\Http\Controllers\Backend;

use App;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Blog\Cms\PostRepository;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $postRepository;

    /**
     * Injects dependencies into controller
     *
     * @param PostRepository $repo
     */
    public function __construct(PostRepository $repo)
    {
        parent::__construct();
        $this->postRepository = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $post = Input::get('post', 0);

        $posts = $this->postRepository->all($post);

        return $this->render('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $post = App::make('Blog\Cms\Post');

        return $this->render('backend.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $post  = $this->postRepository->createNew($input, $user);

        if (count($post->errors()) == 0) {
            return $this->goToAction(
                'Backend\PostsController@edit',
                ['id' => $post->id ]
           );
        } else {
            return $this->goToAction('Backend\PostsController@create')
                ->withInput($input)
                ->withErrors($post->errors());
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
        $post = $this->postRepository->findOrFail($id);

        return $this->render('backend.posts.show');
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
        $post = $this->postRepository->findOrFail($id);

        return $this->render('backend.posts.edit', ['post' => $post]);
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
        $post  = $this->postRepository->update($id, $input);

        if (! $post->errors()) {
            return $this->goToAction('Backend\PostsController@edit', ['id' => $post->id ])
                ->withInput($input);
        } else {
            return $this->goToAction('Backend\PostsController@edit', ['id' => $post->id ])
                ->withInput($input)
                ->withErrors($post->errors());
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
        $deleted = $this->postRepository->delete($id);

        return $this->goToAction('Backend\PostsController@index');
    }
}
