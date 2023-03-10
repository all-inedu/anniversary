<?php

namespace App\Http\Controllers;

use App\Http\Traits\CreateUUIDTrait;
use App\Interfaces\UniversityRepositoryInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use CreateUUIDTrait;

    protected UniversityRepositoryInterface $universityRepository;

    public function __construct(UniversityRepositoryInterface $universityRepository)
    {
        $this->universityRepository = $universityRepository;
    }

    public function index()
    {
        $universities = $this->universityRepository->getActiveUniversities();

        return view('home.main')->with(
            [
                'universities' => $universities
            ]
        );
    }
}
