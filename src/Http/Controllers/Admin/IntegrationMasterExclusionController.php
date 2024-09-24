<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use IntegrationHelper\IntegrationMasterLaravel\Datagrids\IntegrationMasterGrid;
use IntegrationHelper\IntegrationMasterLaravel\Repositories\IntegrationMasterRepository;


class IntegrationMasterExclusionController extends Controller
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected IntegrationMasterRepository $repository
    ) {
        $this->middleware('admin');

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(IntegrationMasterGrid::class)->toJson();
        }

        return view($this->_config['view']);
    }
}
