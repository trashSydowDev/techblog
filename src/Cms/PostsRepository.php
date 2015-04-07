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
}
