<?php
namespace App\Http\Controllers\Frontend;

use App;
use Input;
use View;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    /**
     * Displays the blog post index for the given page
     *
     * @return Illuminate\Http\Response
     */
    public function indexPosts()
    {
        /**
         * The page
         *
         * @var integer
         */
        $page  = Input::get('page', 0);
        $repo  = App::make('Blog\Cms\PostRepository');
        $posts = $repo->all($page);

        return $this->render('front.posts.index', compact('posts'));
    }

    /**
     * Show a post by slug
     *
     * @param  string $slug The post slug
     *
     * @return Illuminate\Http\Response
     */
    public function showPost($slug)
    {
        $repo = App::make('Blog\Cms\PostRepository');

        $post = $repo->findBySlug($slug);

        if ($post) {
            $postPresenter = App::make('Blog\Cms\Presenter');
            $postPresenter->setInstance($post);

            return $this->render('front.posts.show', compact('postPresenter', 'post'));
        } else {
            App::abort(404);
        }
    }

    /**
     * Show a page by slug
     *
     * @param  string $slug The page slug
     *
     * @return Illuminate\Http\Response
     */
    public function showPage($slug)
    {
        $repo = App::make('Blog\Cms\PageRepository');

        $page = $repo->findBySlug($slug);

        if ($page) {
            $pagePresenter = App::make('Blog\Cms\Presenter');
            $pagePresenter->setInstance($page);

            return $this->render('front.pages.show', compact('pagePresenter'));
        } else {
            App::abort(404);
        }
    }
}
