<?php
namespace Blog\Cms;

use App;
use Blog\Base\Repository as BaseRepository;

/**
 * Class PageRepository
 *
 * The Blog\Cms\PageRepository abstracts all the database queries regarding
 * Pages.
 *
 * @package  Blog\Cms
 */
class PageRepository extends BaseRepository
{
    /**
     * The domain object class that is going to query for using
     * Eloquent methods.
     *
     * @var string
     */
    public $domainObject = 'Blog\Cms\Page';

    /**
     * Finds a Page by the given slug
     *
     * @param  string $slug Page slug
     *
     * @return Page A Page object or null.
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findBySlug($slug)
    {
        $instance = App::make($this->domainObject);

        return $instance::where('slug', $slug)->firstOrFail();
    }

    /**
     * Create a new instance and persist at database.
     *
     * @param  array       $input
     *
     * @return Blog\Cms\Page instance
     */
    public function createNew($input)
    {
        $page = App::make($this->domainObject);

        $page->title        = array_get($input, 'title');
        $page->slug         = array_get($input, 'slug');
        $page->lean_content = array_get($input, 'lean_content');
        $page->content      = array_get($input, 'content');
        $page->save();

        return $page;
    }

    /**
     * Update a page resource given.
     *
     * @param  int   $id
     * @param  array $input
     *
     * @return null| Page Object
     */
    public function update($id, $input)
    {
        $page = $this->findOrFail($id);

        $page->title        = array_get($input, 'title');
        $page->slug         = array_get($input, 'slug');
        $page->lean_content = array_get($input, 'lean_content');
        $page->content      = array_get($input, 'content');
        $page->save();

        return $page;
    }
}
