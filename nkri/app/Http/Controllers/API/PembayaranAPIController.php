<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePembayaranAPIRequest;
use App\Http\Requests\API\UpdatePembayaranAPIRequest;
use App\Models\Pembayaran;
use App\Repositories\PembayaranRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PembayaranController
 * @package App\Http\Controllers\API
 */

class PembayaranAPIController extends AppBaseController
{
    /** @var  PembayaranRepository */
    private $pembayaranRepository;

    public function __construct(PembayaranRepository $pembayaranRepo)
    {
        $this->pembayaranRepository = $pembayaranRepo;
    }

    /**
     * Display a listing of the Pembayaran.
     * GET|HEAD /pembayarans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pembayaranRepository->pushCriteria(new RequestCriteria($request));
        $this->pembayaranRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pembayarans = $this->pembayaranRepository->all();

        return $this->sendResponse($pembayarans->toArray(), 'Pembayarans retrieved successfully');
    }

    /**
     * Store a newly created Pembayaran in storage.
     * POST /pembayarans
     *
     * @param CreatePembayaranAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePembayaranAPIRequest $request)
    {
        $input = $request->all();

        $pembayarans = $this->pembayaranRepository->create($input);

        return $this->sendResponse($pembayarans->toArray(), 'Pembayaran saved successfully');
    }

    /**
     * Display the specified Pembayaran.
     * GET|HEAD /pembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pembayaran $pembayaran */
        $pembayaran = $this->pembayaranRepository->findWithoutFail($id);

        if (empty($pembayaran)) {
            return $this->sendError('Pembayaran not found');
        }

        return $this->sendResponse($pembayaran->toArray(), 'Pembayaran retrieved successfully');
    }

    /**
     * Update the specified Pembayaran in storage.
     * PUT/PATCH /pembayarans/{id}
     *
     * @param  int $id
     * @param UpdatePembayaranAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembayaranAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pembayaran $pembayaran */
        $pembayaran = $this->pembayaranRepository->findWithoutFail($id);

        if (empty($pembayaran)) {
            return $this->sendError('Pembayaran not found');
        }

        $pembayaran = $this->pembayaranRepository->update($input, $id);

        return $this->sendResponse($pembayaran->toArray(), 'Pembayaran updated successfully');
    }

    /**
     * Remove the specified Pembayaran from storage.
     * DELETE /pembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pembayaran $pembayaran */
        $pembayaran = $this->pembayaranRepository->findWithoutFail($id);

        if (empty($pembayaran)) {
            return $this->sendError('Pembayaran not found');
        }

        $pembayaran->delete();

        return $this->sendResponse($id, 'Pembayaran deleted successfully');
    }
}
