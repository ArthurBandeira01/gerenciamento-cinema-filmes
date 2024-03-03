<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stancl\Tenancy\Database\Models\Tenant;
use App\Models\Tenant as TenantModel;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    protected $tenantModel;

    public function __construct(TenantModel $tenantModel)
    {
        $this->tenantModel = $tenantModel;
    }

    public function index()
    {
        return view('site.index');
    }
}
