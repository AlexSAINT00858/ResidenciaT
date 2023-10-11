<?php

    namespace App\Http\Controllers;

    use App\Models\OfferWithData;
    use Illuminate\Http\Request;

    class IndexController extends Controller
    {
        //views
        public function show()
        {
            // filtramos todas las ofertas de trabajo de la empresa que ha iniciado sesion
            $offer = new OfferWithData();
            $offertsWithData = $offer->getAllOfferts();

            // retornamos la vista con un arreglo que contiene todas las ofertas de empleo
            return view('welcome', ['offerts' => $offertsWithData]);
        }

//        //actions
//        public function loginCandidate(LoginCandidateRequest $request, $idOffer)
//        {
//            //Si es que existe el usuario
//            try {
//                $dataJobApplication = [
//                    'idOffer' => $idOffer,
//                    'CURP' => $request['CURP']
//                ];
//                //verificamos que exista el candidato por su Id
//                if (Candidate::find($request['CURP'])) {
//                    JobApplication::create($dataJobApplication);
//                    // Redireccionamos a la vista pricipal
//                    return redirect('/')->with('success', 'Se registro su seleccion correctamente');
//                }
//                //Si no existe el candidato, lo redireccionamos al login
//                return redirect('/loginCandidate/' . $idOffer)->with('danger', 'No se encontro el candidato con esa curp');
//            } catch (\Throwable $th) {
//                return redirect('/')->with('danger', 'Ha ocurrido un error intentelo mas tarde');
//            }
//        }
//
//        public function registerCandidate(CandidateRequest $request, $idOffer)
//        {
//            //validamos los campos de el candidato
//            $dataCandidate = [
//                'CURP' => $request->validated()['CURP'],
//                'nameCandidate' => $request->validated()['nameCandidate'],
//                'lastName' => $request->validated()['lastName'],
//                'phoneNumberCandidate' => $request->validated()['phoneNumberCandidate'],
//                'emailCandidate' => $request->validated()['emailCandidate'],
//                'jobTrade' => $request->validated()['jobTrade'],
//                'resumeCandidate' => $request->validated()['resumeCandidate']
//            ];
//            if ($this->existCandidate($request['CURP'])) {
//                return redirect('/registerCandidate/' . $idOffer)->with('danger', 'Verifique su CURP, ya que esa CURP esta en uso');
//            }
//
//            //subir pdf
//            //Si se subio el curriculum registramos al usuario
//            $response = $this->saveCV($request);
//            if ($response[0]) {
//                //Si es que existe el usuario
//                try {
//                    $dataCandidate['resumeCandidate'] = $response[1];
//                    // realizamos la incersion de el nuevo candidato
//                    Candidate::create($dataCandidate);
//                    //Realizamos la insercion de la postulacion
//                    $dataJobApplication = [
//                        'idOffer' => $idOffer,
//                        'CURP' => $request['CURP']
//                    ];
//                    JobApplication::create($dataJobApplication);
//                    // Redireccionamos a la vista pricipal
//                    return redirect('/')->with('success', 'Se ha registrad correctamente el candidato');
//                } catch (\Throwable $th) {
//                    return redirect('/')->with('danger', 'El usuario ya existe, no se realizo la insercion');
//                }
//            }
//
//            return redirect('/registerCandidate/' . $idOffer)->with('danger', 'No ha ingresado un archivo pdf.');
//        }
//
//        //subir Curriculum al servidor
//        private function saveCV($request)
//        {
//            //Si se sube el pdf se registra el candidato
//            if ($request->hasFile("resumeCandidate")) {
//                $file = $request->file("resumeCandidate");
//                $nombre = "cv_" . time() . "." . $file->guessExtension();
//                $ruta = public_path("resumes/" . $nombre);
//                if ($file->guessExtension() == "pdf") {
//                    copy($file, $ruta);
//                    return [true, $nombre];
//                } else {
//                    return [false];
//                }
//            }
//            return [false];
//        }
//
//        //valida si esxiste ya registrado ese candidato por medio de su curp
//        private function existCandidate($curp)
//        {
//            return Candidate::existCandidatesById($curp);
//        }
    }
