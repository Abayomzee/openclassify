<?php namespace Visiosoft\ProfileModule\Adress;

use Visiosoft\ProfileModule\Adress\Contract\AdressRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class AdressRepository extends EntryRepository implements AdressRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var AdressModel
     */
    protected $model;

    /**
     * Create a new AdressRepository instance.
     *
     * @param AdressModel $model
     */
    public function __construct(AdressModel $model)
    {
        $this->model = $model;
    }

    public function getUserAddresses($userId = null)
    {
        $userId = $userId ? $userId : \auth()->id();

        return $this->findAllBy('user_id', $userId);
    }
}
