<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class BaseRepository
 * @package App\Repositories\Eloquent
 */
class Repository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all resources
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function all($columns = array('*'))
    {
        return $this->model->all();
    }

    /**
     * Store newly created resource
     *
     * @param array $data
     *
     * @return Model
     */
    public function store(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update specific resource.
     *
     * @param array $data
     * @param       $id
     *
     * @return bool
     */
    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Find specific resource
     *
     * @param       $id
     * @param array $columns
     *
     * @return Object
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    /**
     * Update or create specific resource.
     *
     * @param array $queryParams
     * @param array $data
     *
     * @return mixed
     */
    public function updateOrCreateByID($id, array $data)
    {
        return $this->model->updateOrCreate(["id" => $id], $data);
    }

    /**
     * Update or create specific resource.
     *
     * @param array $queryParams
     * @param array $data
     *
     * @return mixed
     */
    public function updateOrCreate(array $queryParams, array $data)
    {
        return $this->model->updateOrCreate($queryParams, $data);
    }

    /**
     * Delete specific resource
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Find specific resource by given attribute
     *
     * @param       $attribute
     * @param       $value
     * @param array $columns
     *
     * @return Object
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * Find specific model by given attributes or new model
     * @param array $attributes
     * @param $values
     * @return Builder|Model
     */
    public function firstOrNew($attributes = [], $values = [])
    {
        return $this->model->firstOrNew($attributes);
    }

    /**
     * Get paginated resources
     *
     * @param Request $request
     * @param array $columns
     *
     * @return Collection|Model[]
     */
    public function getPaginatedList(Request $request, $columns = array('*'))
    {
        return $this->model->paginate();
    }

    /**
     * Count model
     */
    public function count()
    {
        return $this->model->count();
    }
}
