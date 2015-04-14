<?php
namespace Blog\User;

use App;
use Hash;
use Blog\Base\Repository as BaseRepository;

/**
 * Class Repository
 *
 * Abstracts database queries regarding users
 *
 * @package  Blog\User
 */
class Repository extends BaseRepository
{
    /**
     * The domain object class that is going to query for using
     * Eloquent methods.
     *
     * @var string
     */
    public $domainObject = 'Blog\User\User';

    /**
     * Finds a User by the given email
     *
     * @param  string $email User email
     *
     * @return User A User object or null.
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findBySlug($email)
    {
        $instance = App::make($this->domainObject);

        return $instance::where('email', $email)->firstOrFail();
    }

    /**
     * Create a new instance and persist at database.
     *
     * @param  array       $input
     * @param  Object User $user
     *
     * @return Blog\Cms\Page instance
     */
    public function createNew($input)
    {
        $user = App::make($this->domainObject);

        $user->name     = array_get($input, 'name');
        $user->email    = array_get($input, 'email');
        $user->password = Hash::make(
            array_get($input, 'password')
        );
        $user->save();

        return $user;
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
        $user = $this->findOrFail($id);

        $user->name     = array_get($input, 'name');
        $user->email    = array_get($input, 'email');
        $user->password = Hash::make(
            array_get($input, 'password')
        );
        $user->save();

        return $user;
    }
}
