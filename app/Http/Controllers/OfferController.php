<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\JobApplication;
use App\Models\Candidate;
use App\Http\Requests\OfferRequest;

class OfferController extends Controller
{
    //views
    // Muestra la vista principal al iniciar sesion
    public function show() {
        // filtramos todas las ofertas de trabajo de la empresa que ha iniciado sesion
        $offerts = Offer::getOffertsByIdCompany(Auth::user()->id);
        // retornamos la vista con un arreglo que contiene todas las ofertas de empleo
        return view('dashboard', ['offerts' => $offerts]);
    }

    //Muestra el formulario para regiatrar una oferta de trabajo
    public function showRegisterOffer() {
        //si existe un usuario autenticado refirigirlo a registrar la oferta
        if(Auth::check()){
            return view('company.registerOffer');
        }
        return view('/home');
    }

    //Mostramos la vista del formulario para editar una oferta
    public function showEditOffer($idOffer) {
        //si existe un usuario autenticado refirigirlo a registrar la oferta
        if(Auth::check()){
            // filtramos a la oferta por medio del id de la oferta que ha seleccionado para editar
            $offerSelected = Offer::getOfferById($idOffer);
            // devolvemos un objeto con los datos de la oferta seleccionada
            // a la respectiva vista
            return view('company.editOffer', ['offerSelected' => $offerSelected]);
        }
        return view('/home');
    }

    public function getCandidatesByOffer($idOffer) {
        try {
            $jobsApplications = JobApplication::getJobApplicationByOffer($idOffer);

            // $dataCandidates = [];
            // foreach ($jobsApplications as $jobApplication) {
            //     array_push($dataCandidates, Candidate::getCandidatesById($jobApplication->CURP));
            // }
            // return view('company.vacantes', ['candidates' => $dataCandidates]);
            foreach ($jobsApplications as $jobApplication) {
                $jobApplication->dataCandidate = Candidate::getCandidatesById($jobApplication->CURP)->first();
            }
            return view('company.vacantes', ['dataJobApplications' => $jobsApplications]);
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante la eliminación
            return redirect('/dashboard')->with('danger', 'Ha Ocurrido un error'.$e);
        }
        
    }

    //actions
    // Se usa cuando acemos un post para registrar una oferta de empleo
    //Por medio de la clase OfferRequest validamos los datos que se registraran
    public function registerOffer(OfferRequest $request) {
        //validamos los campos de la oferta
        $dataOffer = [
            'offerName' => $request->validated()['offerName'],
            'descriptionOffer' => $request->validated()['descriptionOffer'],
            'publicationDate' => date('y-m-d'),
            'salary' => $request->validated()['salary'],
            'idCompany' => auth()->user()->id,
        ];
        // realizamos la incersion de la nueva oferta pasando los atributos de la oferta
        Offer::create($dataOffer);
        // Redireccionamos a la vista pricipal
        return redirect('/dashboard')->with('success', 'Offer created successfully');
    }

    // metodo que utilizamos cuado hacemos un post para guardar la edicion de una oferta
    // Utilizamos dos parametros una para validar datos y otra que nos indica que oferta es la que editaremos
    public function editOffer(OfferRequest $request, $idOffer) {
        //validamos los campos de la oferta
        $dataOffer = [
            'offerName' => $request->validated()['offerName'],
            'descriptionOffer' => $request->validated()['descriptionOffer'],
            'publicationDate' => date('y-m-d'),
            'salary' => $request->validated()['salary'],
            'idCompany' => auth()->user()->id,
        ];
        //Buscamos la oferta por medio de su id
        $offerToChange = Offer::find($idOffer);
        // realizamos cambios a la oferta y las guardamos
        $offerToChange->update($request->all());
        //Redireccionamos a la pagina principal
        return redirect('/dashboard')->with('success', 'Offer change successfully');
    }

    public function deleteOffer($idOffer) {
        try {
            //Buscamos la oferta por medio de su id
            $offerSelected = Offer::find($idOffer);
            // eliminamos la oferta
            $offerSelected->delete();

            return redirect('/dashboard')->with('success', 'Offer delete successfully');
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante la eliminación
            return redirect('/dashboard')->with('error', 'could not delete offer'.$e);
        }
        
    }

    public function deleteJobApplication($idJobApplication,$idOffer) {
        try {
            //Buscamos la oferta por medio de su id
            $JobApplicationSelected = JobApplication::find($idJobApplication);
            // eliminamos la oferta
            $JobApplicationSelected->delete();

            return redirect('/getCandidatesByOffer/'.$idOffer)->with('success', 'Se elimino el candidato');
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante la eliminación
            return redirect('/getCandidatesByOffer/'.$idOffer)->with('error', 'No se pudo eliminar el candidato'.$e);
        }
    }
}
