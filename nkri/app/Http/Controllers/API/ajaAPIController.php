<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateajaAPIRequest;
use App\Http\Requests\API\UpdateajaAPIRequest;
use App\Models\aja;
use App\Repositories\ajaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ajaController
 * @package App\Http\Controllers\API
 */

class ajaAPIController extends AppBaseController
{
    /** @var  ajaRepository */
    private $ajaRepository;

    public function __construct(ajaRepository $ajaRepo)
    {
        $this->ajaRepository = $ajaRepo;
    }

    /**
     * Display a listing of the aja.
     * GET|HEAD /ajas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ajaRepository->pushCriteria(new RequestCriteria($request));
        $this->ajaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ajas = $this->ajaRepository->all();

        return $this->sendResponse($ajas->toArray(), 'Ajas retrieved successfully');
    }

    /**
     * Store a newly created aja in storage.
     * POST /ajas
     *
     * @param CreateajaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateajaAPIRequest $request)
    {
        $input = $request->all();

        $ajas = $this->ajaRepository->create($input);

        return $this->sendResponse($ajas->toArray(), 'Aja saved successfully');
    }

    /**
     * Display the specified aja.
     * GET|HEAD /ajas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var aja $aja */
        $aja = $this->ajaRepository->findWithoutFail($id);

        if (empty($aja)) {
            return $this->sendError('Aja not found');
        }

        return $this->sendResponse($aja->toArray(), 'Aja retrieved successfully');
    }

    /**
     * Update the specified aja in storage.
     * PUT/PATCH /ajas/{id}
     *
     * @param  int $id
     * @param UpdateajaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateajaAPIRequest $request)
    {
        $input = $request->all();

        /** @var aja $aja */
        $aja = $this->ajaRepository->findWithoutFail($id);

        if (empty($aja)) {
            return $this->sendError('Aja not found');
        }

        $aja = $this->ajaRepository->update($input, $id);

        return $this->sendResponse($aja->toArray(), 'aja updated successfully');
    }

    /**
     * Remove the specified aja from storage.
     * DELETE /ajas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var aja $aja */
        $aja = $this->ajaRepository->findWithoutFail($id);

        if (empty($aja)) {
            return $this->sendError('Aja not found');
        }

        $aja->delete();

        return $this->sendResponse($id, 'Aja deleted successfully');
    }
}
