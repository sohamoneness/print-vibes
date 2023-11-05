<?php

namespace App\Contracts;

/**
 * Interface ArtistContract
 * @package App\Contracts
 */
interface ArtistContract
{
    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function followeList($start_date,$end_date);

    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function transactions($start_date,$end_date);

    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function artistOrders($start_date,$end_date);

    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function notifications($start_date,$end_date);
}