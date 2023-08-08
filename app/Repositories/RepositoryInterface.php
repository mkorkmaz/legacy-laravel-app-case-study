<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


/**
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * Get all resources
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function all($columns = array('*'));

    /**
     * Get paginated resources
     *
     * @param Request $request
     * @param array $columns
     *
     * @return LengthAwarePaginator|Collection
     */
    public function getPaginatedList(Request $request, $columns = array('*'));

    /**
     * Stores newly created resource
     *
     * @param array $data
     *
     * @return object
     */
    public function store(array $data);

    /**
     * Update specific resource.
     *
     * @param array $data
     * @param       $id
     *
     * @return bool
     */
    public function update($id, array $data);

    /**
     * Delete specific resource
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id);

    /**
     * Find specific resource
     *
     * @param       $id
     * @param array $columns
     *
     * @return object
     */
    public function find($id, $columns = array('*'));

    /**
     * Find specific resource by given attribute
     *
     * @param       $attribute
     * @param       $value
     * @param array $columns
     *
     * @return Object
     */
    public function findBy($attribute, $value, $columns = array('*'));

    /**
     * Find specific model by given attributes or new model
     *
     * @param array $attributes
     * @param $values
     * @return Builder|Model
     */
    public function firstOrNew($attributes, $values);


    /**
     * Count specific resource.
     *
     * @return integer
     */
    public function count();

}
