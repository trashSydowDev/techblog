<?php
namespace Blog\Cms;

use Blog\User\User;

/**
 * Post Class
 *
 * The Post class is the Entity that represents a blog post entry.
 * It extends the Blog\Cms\Page since the blog post have the same behavior
 * that cms pages have.
 *
 * @package Blog\Cms
 */
class Post extends Page {

    /**
     * Retrieves the author of the post
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
