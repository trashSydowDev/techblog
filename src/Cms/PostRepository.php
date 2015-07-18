<?php
namespace Blog\Cms;

use App;

/**
 * Class PageRepository
 *
 * The Blog\Cms\PageRepository abstracts all the database queries regarding
 * Posts.
 *
 * @package  Blog\Cms
 */
class PostRepository extends PageRepository
{
    /**
     * The domain object class that is going to query for using
     * Eloquent methods.
     *
     * @var string
     */
    public $domainObject = 'Blog\Cms\Post';

    /**
     * Finds a Post and it's author by the given slug
     *
     * @param  string $slug Post slug
     *
     * @return Post A Post object with the author (User) eager loaded.
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findBySlug($slug)
    {
        $instance = App::make($this->domainObject);

        return $instance::with('author')
            ->where('slug', $slug)->firstOrFail();
    }

    /**
     * Create a new instance and persist at database.
     *
     * @param  array       $input
     *
     * @return Blog\Cms\Post instance
     */
    public function createNew($input)
    {
        $post = App::make($this->domainObject);

        $post->title        = array_get($input, 'title');
        $post->slug         = array_get($input, 'slug');
        $post->lean_content = array_get($input, 'lean_content');
        $post->content      = array_get($input, 'content');
        $post->author_id    = array_get($input, 'author_id');
        $post->save();

        return $post;
    }
}
