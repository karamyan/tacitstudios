<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CRUDService\CRUDAbstract;
use Illuminate\Http\Request;

/**
 * Class CRUDController
 *
 * @package App\Http\Controllers\Api
 */
class CRUDController extends Controller
{
    /**
     * @var CRUDAbstract
     */
    private $crud;

    /**
     * CRUDController constructor.
     *
     * @param CRUDAbstract $crud
     */
    public function __construct(CRUDAbstract $crud)
    {
        $this->crud = $crud;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return $this->crud->list($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->crud->create($request);
    }

    /**
     * Retrieve the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function retrieve($id)
    {
        return $this->crud->retrieve($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->crud->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->crud->delete($id);
    }
}
