<?php

namespace App\Http\Controllers;

use App\Interfaces\CourtRepositoryInterface;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    private CourtRepositoryInterface $courtRepository;

    public function __construct(CourtRepositoryInterface $courtRepository)
    {
        $this->courtRepository = $courtRepository;
    }

    public function index(Request $request)
    {
        $courts = $this->courtRepository->getAllCourts();

        return view('court.index', compact('count', 'courts'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('court.create');
    }

    public function store(Request $request)
    {
        
    }
}
