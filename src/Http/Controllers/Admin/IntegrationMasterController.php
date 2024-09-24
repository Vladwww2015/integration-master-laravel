<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use IntegrationHelper\IntegrationMasterLaravel\Datagrids\IntegrationMasterGrid;
use IntegrationHelper\IntegrationMasterLaravel\IntegrationMasterParamsPool;
use IntegrationHelper\IntegrationMasterLaravel\IntegrationMasterSerializator;
use IntegrationHelper\IntegrationMasterLaravel\Repositories\IntegrationMasterRepository;


class IntegrationMasterController extends Controller
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

    /**
     * @param string $hash
     * @return JsonResponse
     */
    public function edit(string $hash)
    {
        $data = IntegrationMasterSerializator::decode($hash);
        $id = $data['id'] ?? false;
        $integrationMaster = false;
        if($id) {
            $integrationMaster = $this->repository->find($id);
        }

        $url = $integrationMaster ? route('admin.integration.master.update') : route('admin.integration.master.create');

        return response()->json([
            'integrationMaster' => $integrationMaster,
            'formUrl' => $url,
            'externalSourceIdentities' => IntegrationMasterParamsPool::getInstance()
        ]);
    }

    public function delete()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }
}
