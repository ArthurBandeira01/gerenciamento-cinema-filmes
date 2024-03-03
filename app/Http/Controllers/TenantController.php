<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stancl\Tenancy\Database\Models\Tenant;
use App\Models\Tenant as TenantModel;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{

    protected $tenantModel;

    public function __construct(TenantModel $tenantModel)
    {
        $this->tenantModel = $tenantModel;
    }

    public function index()
    {
        $tenants = $this->tenantModel->get();

        return view('admin.tenants.index', ['tenants' => $tenants]);
    }

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        //Verifica se há algum cinema/tenant já cadastrado com o mesmo nome
        $tenantExist = $this->tenantModel->where('id', $inputs['tenant'])->first();

        if ($tenantExist) {
            return redirect()->back()->with('error', 'Cinema com o mesmo nome já existe na base de dados!');
        } else {
            $tenant = TenantModel::create(['id' => $inputs['tenant']]);
            $tenant->domains()->create(['domain' => $inputs['tenant'] . '.localhost']);

            return redirect()->route('tenants')->with('success', 'Cinema cadastrado com sucesso!');
        }
    }

    public function show($id)
    {
        $tenant = $this->tenantModel->where('id', $id)->first();

        return view('admin.tenants.show', ['tenant' => $tenant]);
    }

    public function edit($id)
    {
        $tenant = $this->tenantModel->where('id', $id)->first();

        return view('admin.tenants.edit', ['tenant' => $tenant]);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        //Verifica se há algum cinema/tenant já cadastrado com o mesmo nome
        $tenantExist = $this->tenantModel->where('id', $inputs['tenant'])->where('id', '!=', $id)->first();

        if ($tenantExist) {
            return redirect()->back()->with('error', 'Cinema com o mesmo nome já existe na base de dados!');
        } else {
            $tenant = TenantModel::findOrFail($id);
            $tenant->update(['id' => $inputs['tenant']]);
            $tenant->domains()->update(['domain' => $inputs['tenant'] . '.localhost']);

            return redirect()->route('tenants')->with('success', 'Cinema atualizado com sucesso!');
        }
    }

    public function destroy($id)
    {
        $tenant = TenantModel::findOrFail($id);
        $tenant->delete();

        $this->tenantModel->deleteTenancy($tenant->tenancy_db_name);

        return redirect()->route('tenants')->with('success', 'Cinema excluído com sucesso!');
    }
}
