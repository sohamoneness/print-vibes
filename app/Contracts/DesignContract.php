<?php

namespace App\Contracts;

/**
 * Interface DesignContract
 * @package App\Contracts
 */
interface DesignContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listDesigns(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findDesignById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createDesign(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDesign(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteDesign($id);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDesignStatus(array $params);

    /**
     * @param $id
     * @return mixed
     */
    public function detailsDesign($id);
}