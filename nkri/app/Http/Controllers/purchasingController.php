<?php

namespace App\Http\Controllers;

use App\DataTables\purchasingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepurchasingRequest;
use App\Http\Requests\UpdatepurchasingRequest;
use App\Repositories\purchasingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class purchasingController extends AppBaseController
{
    /** @var  purchasingRepository */
    private $purchasingRepository;

    public function __construct(purchasingRepository $purchasingRepo)
    {
        $this->purchasingRepository = $purchasingRepo;
    }

    /**
     * Display a listing of the purchasing.
     *
     * @param purchasingDataTable $purchasingDataTable
     * @return Response
     */
    public function index(purchasingDataTable $purchasingDataTable)
    {
        return $purchasingDataTable->render('purchasings.index');
    }

    /**
     * Show the form for creating a new purchasing.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchasings.create');
    }

    /**
     * Store a newly created purchasing in storage.
     *
     * @param CreatepurchasingRequest $request
     *
     * @return Response
     */
    public function store(CreatepurchasingRequest $request)
    {
        $input = $request->all();

        $purchasing = $this->purchasingRepository->create($input);

        Flash::success('Purchasing saved successfully.');

        return redirect(route('purchasings.index'));
    }

    /**
     * Display the specified purchasing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchasing = $this->purchasingRepository->findWithoutFail($id);

        if (empty($purchasing)) {
            Flash::error('Purchasing not found');

            return redirect(route('purchasings.index'));
        }

        return view('purchasings.show')->with('purchasing', $purchasing);
    }

    /**
     * Show the form for editing the specified purchasing.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchasing = $this->purchasingRepository->findWithoutFail($id);

        if (empty($purchasing)) {
            Flash::error('Purchasing not found');

            return redirect(route('purchasings.index'));
        }

        return view('purchasings.edit')->with('purchasing', $purchasing);
    }

    /**
     * Update the specified purchasing in storage.
     *
     * @param  int              $id
     * @param UpdatepurchasingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepurchasingRequest $request)
    {
        $purchasing = $this->purchasingRepository->findWithoutFail($id);

        if (empty($purchasing)) {
            Flash::error('Purchasing not found');

            return redirect(route('purchasings.index'));
        }

        $purchasing = $this->purchasingRepository->update($request->all(), $id);

        Flash::success('Purchasing updated successfully.');

        return redirect(route('purchasings.index'));
    }

    /**
     * Remove the specified purchasing from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchasing = $this->purchasingRepository->findWithoutFail($id);

        if (empty($purchasing)) {
            Flash::error('Purchasing not found');

            return redirect(route('purchasings.index'));
        }

        $this->purchasingRepository->delete($id);

        Flash::success('Purchasing deleted successfully.');

        return redirect(route('purchasings.index'));
    }
}
