<?php
namespace Blog\Base;

use App;

/**
 * Abstract Class Repository
 *
 * Abstracts database interactions regarding the $domainObject
 *
 * @package  Blog\Base
 */
abstract class Repository
{
    /**
     * The domain object class that is going to query for using
     * Eloquent methods.
     *
     * @var string
     */
    public $domainObject = null;

    /**
     * Returns all the entities. Paginates results using the $pagination parameter
     *
     * @param  integer $pagination Pagination value
     *
     * @return Illuminate\Pagination\Paginator
     */
    public function all($pagination = 0)
    {
        $instance = App::make($this->domainObject);

        return $instance::paginate($pagination);
    }

    /**
     * Finds a Page by the given id
     *
     * @param  integer $id Page id
     *
     * @return Entity A Page object or null.
     */
    public function find($id)
    {
        $instance = App::make($this->domainObject);

        return $instance::find($id);
    }

    /**
     * Finds a Page by the given id or throw exception
     *
     * @param  integer $id Page id
     *
     * @return Page A Page object or null.
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail($id)
    {
        $instance = App::make($this->domainObject);

        return $instance::findOrFail($id);
    }

    /**
     * Create a new instance and persist at database.
     *
     * @param  array       $input
     * @param  Object User $user
     *
     * @return Entity instance
     */
    public abstract function createNew($input);

    /**
     * Update a entity resource given.
     *
     * @param  int   $id
     * @param  array $input
     *
     * @return null| Entity Object
     */
    public abstract function update($id, $input);
}
