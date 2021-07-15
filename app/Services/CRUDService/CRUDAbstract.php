<?php

declare(strict_types=1);

namespace App\Services\CRUDService;

use Illuminate\Http\Request;

/**
 * Class CRUDAbstract
 *
 * @package App\Services\CRUDService
 */
abstract class CRUDAbstract
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return $this->repository->all();
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->repository->create($request->all());
    }

    /**
     * Retrieve the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function retrieve(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->repository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
