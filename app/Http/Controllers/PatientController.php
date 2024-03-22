<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        return view('modules.patient.index', [
            'success' => $request->cookie('success')
        ]);
    }

    public function loadPatient(Request $request) {
        if($request->search) {
            if($request->field == 'affiliation'){
                $patient = Patient::orWhere('affiliation1', 'LIKE', '%' . $request->search . '%')
                ->orWhere('affiliation2', 'LIKE', '%' . $request->search . '%');
            } else {
                $patient = Patient::where($request->field, 'LIKE', '%' . $request->search . '%');
            }
            
            $result = $patient->count();
            $search = $patient->limit(5)->get();
        } else {
            $result = 0;
            $search = NULL;
        }

        return view('modules.patient.search', [
            'result' => $result,
            'search' => $search
        ]);
    }

    public function create(Request $request) {
        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        return view('modules.patient.create', [
            'erro' => $request->cookie('erro')
        ]);
    }

    public function store(Request $request) {
        if(Patient::where('chart', $request->chart)->count() > 0) {
            return redirect('patient/create')->cookie('erro', 'Paciente Já Cadastrado!', 0.03);
        } else {
            $create = new Patient;
            $create->user         = session()->get('id_user');
            $create->chart        = $request->chart;
            $create->name         = trim(mb_strtoupper($request->name));
            $create->birth_date   = $request->birth_date;
            $create->social_name  = trim(mb_strtoupper($request->social_name));
            $create->rg           = $request->rg;
            $create->cpf          = $request->cpf;
            $create->cns          = $request->cns;
            $create->breed        = $request->breed;
            $create->sex          = $request->sex;
            $create->phone        = $request->phone;
            $create->affiliation1 = trim(mb_strtoupper($request->affiliation1));
            $create->affiliation2 = trim(mb_strtoupper($request->affiliation2));
            $create->cep          = $request->cep;
            $create->address      = trim(mb_strtoupper($request->address));
            $create->informations = trim(mb_strtoupper($request->informations));
            $create->save();

            return redirect('patient')->cookie('success', 'Pacient Cadastrado com Sucesso!', 0.03);
        }
    }

    public function edit(Request $request, $id) {
        if($id <= 0 || $id > Patient::max('id'))
            return redirect('patient');

        $verify = AccessController::verify();
        if($verify)
            return redirect($verify);

        return view('modules.patient.update', [
            'erro' => $request->cookie('erro'),
            'data' => Patient::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {        
        if(Patient::where([['cpf', $request->cpf],['id', '!=', $id]])->count() > 0) {
            $cookie = cookie('erro', 'Paciente Já Cadastrado!', 0.03);
            return redirect('patient/' . $id)->cookie($cookie);
        } else {
            $update = Patient::find($id);
            $update->chart        = $request->chart;
            $update->name         = trim(mb_strtoupper($request->name));
            $update->birth_date   = $request->birth_date;
            $update->social_name  = trim(mb_strtoupper($request->social_name));
            $update->rg           = $request->rg;
            $update->cpf          = $request->cpf;
            $update->cns          = $request->cns;
            $update->breed        = $request->breed;
            $update->sex          = $request->sex;
            $update->phone        = $request->phone;
            $update->affiliation1 = trim(mb_strtoupper($request->affiliation1));
            $update->affiliation2 = trim(mb_strtoupper($request->affiliation2));
            $update->cep          = $request->cep;
            $update->address      = trim(mb_strtoupper($request->address));
            $update->informations = trim(mb_strtoupper($request->informations));
            $update->save();

            return redirect('patient')->cookie('success', 'Paciente Atualizado com Sucesso!', 0.03);
        }
    }
}
