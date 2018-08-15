<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateartikelRequest;
use App\Http\Requests\UpdateartikelRequest;
use App\Repositories\artikelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class artikelController extends AppBaseController
{
    /** @var  artikelRepository */
    private $artikelRepository;

    public function __construct(artikelRepository $artikelRepo)
    {
        $this->artikelRepository = $artikelRepo;
    }

    /**
     * Display a listing of the artikel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->artikelRepository->pushCriteria(new RequestCriteria($request));
        $artikels = $this->artikelRepository->all();

        return view('artikels.index')
            ->with('artikels', $artikels);
    }

    /**
     * Show the form for creating a new artikel.
     *
     * @return Response
     */
    public function create()
    {
        return view('artikels.create');
    }

    /**
     * Store a newly created artikel in storage.
     *
     * @param CreateartikelRequest $request
     *
     * @return Response
     */
    public function store(CreateartikelRequest $request)
    {
        $input = $request->all();

        $artikel = $this->artikelRepository->create($input);

        Flash::success('Artikel saved successfully.');

        return redirect(route('artikels.index'));
    }

    /**
     * Display the specified artikel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $artikel = $this->artikelRepository->findWithoutFail($id);

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        return view('artikels.show')->with('artikel', $artikel);
    }

    /**
     * Show the form for editing the specified artikel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $artikel = $this->artikelRepository->findWithoutFail($id);

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        return view('artikels.edit')->with('artikel', $artikel);
    }

    /**
     * Update the specified artikel in storage.
     *
     * @param  int              $id
     * @param UpdateartikelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateartikelRequest $request)
    {
        $artikel = $this->artikelRepository->findWithoutFail($id);

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        $artikel = $this->artikelRepository->update($request->all(), $id);

        Flash::success('Artikel updated successfully.');

        return redirect(route('artikels.index'));
    }

    /**
     * Remove the specified artikel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $artikel = $this->artikelRepository->findWithoutFail($id);

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        $this->artikelRepository->delete($id);

        Flash::success('Artikel deleted successfully.');

        return redirect(route('artikels.index'));
    }
}
