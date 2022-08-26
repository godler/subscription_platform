<?php

namespace App\Http\Controllers;

use App\Actions\Website\WebsiteCreator;
use App\Http\Requests\WebsiteRequest;
use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use App\Repositories\WebsiteRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function __construct(private WebsiteRepository $repository, private WebsiteCreator $creator){

    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $websites = WebsiteResource::collection($this->repository->all());

        return response()->json($websites);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  WebsiteRequest  $request
     * @return JsonResponse
     */
    public function store(WebsiteRequest $request)
    {
        $this->creator->create($request->toArray());

        return response()->json(['message' => 'ok']);
    }



}
