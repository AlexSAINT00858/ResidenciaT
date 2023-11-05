<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\OfferWithDataRequest;
    use App\Http\Requests\OfferWithOutDataRequest;
    use App\Models\Company;
    use App\Models\OfferWithData;
    use App\Models\OfferWithOutData;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Requests\OfferRequest;
    use PHPUnit\Exception;

    class OfferController extends Controller
    {
        //views
        // Muestra la vista principal al iniciar sesion
        public function show()
        {
            // filtramos todas las ofertas de trabajo activas
            $offer1 = new OfferWithData();
            $offer2 = new OfferWithOutData();
            $offertsWithData = $offer1->getAllOffertsActivesForAdmin();
            $offertsWithOutData = $offer2->getAllOffertsActivesForAdmin();

            $result = $offertsWithData->concat($offertsWithOutData);
            $result = $result->sortBy('publicationDate');

            // retornamos la vista con un arreglo que contiene todas las ofertas de empleo
            return view('dashboard', ['offerts' => $result]);
        }

        //Muestra el formulario para regiatrar una oferta de trabajo
        public function showRegisterOffer()
        {
            //si existe un usuario autenticado refirigirlo a registrar la oferta
            if (Auth::check()) {
                $companies = Company::getAllCompanies();
                return view('admin.registerOffer', ['companies' => $companies]);
            }
            return view('/home');
        }

        //Mostramos la vista del formulario para editar una oferta
        public function showEditOffer($idOffer)
        {
            //si existe un usuario autenticado refirigirlo a registrar la oferta
            if (Auth::check()) {
                $offer = new OfferWithData();
                // filtramos a la oferta por medio del id de la oferta que ha seleccionado para editar
                $offerSelected = $offer->getOfferById($idOffer);
                // devolvemos un objeto con los datos de la oferta seleccionada
                // a la respectiva vista
                return view('admin.editOffer', ['offerSelected' => $offerSelected]);
            }
            return view('/home');
        }

        /*
         * Mostramos todas las ofertas de empleo
         * En este caso no respetaremos el atributo statusde la tabla offerts
         * ya que el historial muestra las que estan activas o desactivadas*/
        public function showHistory()
        {
            //si existe un usuario autenticado refirigirlo a registrar la oferta
            if (Auth::check()) {
                // filtramos todas las ofertas de trabajo activas
                $offer1 = new OfferWithData();
                $offer2 = new OfferWithOutData();
                $offertsWithData = $offer1->getAllOffertsInactives();
                $offertsWithOutData = $offer2->getAllOffertsInactives();

                $result = $offertsWithData->concat($offertsWithOutData);
                $result = $result->sortBy('publicationDate');
                // redireccionamos los datos a nuestra vista
                return view('admin.showHistory', ['offerts' => $result]);
            }
            return view('/home');
        }

        //actions
        // Se usa cuando acemos un post para registrar una oferta de empleo
        //Por medio de la clase OfferRequest validamos los datos que se registraran
        public function registerOfferWithData(OfferWithDataRequest $request)
        {
            date_default_timezone_set("America/Mexico_City");
            $dataOffer = [
                'offerName' => $request->validated()['offerName'],
                'descriptionOffer' => $request->validated()['descriptionOffer'],
                'publicationDate' => date('y-m-d H:i:s'),
                'eliminationDate' => date('y-m-d'),
                'salary' => $request->validated()['salary'],
                'email' => $request->input('idCompany'),
                'state' => 'active'
            ];
            // realizamos la incersion de la nueva oferta pasando los atributos de la oferta
            OfferWithData::create($dataOffer);
            // Redireccionamos a la vista pricipal
            return redirect('/dashboard')->with('success', 'Se creo la oferta de empleo correctamente');
        }

        public function registerOfferWithOutData(OfferWithOutDataRequest $request)
        {
            date_default_timezone_set("America/Mexico_City");
            $dataOffer = [
                'offerImage' => $request->validated()['offerImage'],
                'publicationDate' => date('y-m-d H:i:s'),
                'eliminationDate' => date('y-m-d'),
                'email' => $request->input('idCompany'),
                'state' => 'active'
            ];

            //subir img
            //Si se subio el curriculum registramos al usuario
            $response = $this->saveImage($request);
            if ($response[0]) {
                $dataOffer['offerImage'] = $response[1];
                // realizamos la incersion de la nueva oferta pasando los atributos de la oferta
                OfferWithOutData::create($dataOffer);
                // Redireccionamos a la vista pricipal
                return redirect('/dashboard')->with('success', 'Se creo la oferta de empleo correctamente');
            }
            return redirect('/registerOffer')->with('danger', 'No ha ingresado un archivo de imagen.');
        }

        //subir la imagen de la oferta de empleo
        private function saveImage($request): array
        {
            date_default_timezone_set("America/Mexico_City");
            //Si se sube la imagen registramos a la oferta
            if ($request->hasFile("offerImage")) {
                $file = $request->file("offerImage");
                $name = "offer_" . date('y-m-d H:i:s') . "." . $file->guessExtension();
                $ruta = public_path("imagesOfferts/" . $name);
                if ($file->guessExtension() == "jpg" || $file->guessExtension() == "png" || $file->guessExtension() == "jpeg") {
                    copy($file, $ruta);
                    return [true, $name];
                }
            }
            return [false];
        }

        // metodo que utilizamos cuado hacemos un post para guardar la edicion de una oferta
        // Utilizamos dos parametros una para validar datos y otra que nos indica que oferta es la que editaremos
        public function editOffer(OfferWithDataRequest $request, $idOffer)
        {
            date_default_timezone_set("America/Mexico_City");
            //validamos los campos de la oferta
            $dataOffer = [
                'offerName' => $request->validated()['offerName'],
                'descriptionOffer' => $request->validated()['descriptionOffer'],
                'publicationDate' => date('Y-m-d H:i:s'),
                'salary' => $request->validated()['salary'],
            ];
            //Buscamos la oferta por medio de su id
            $offerToChange = OfferWithData::find($idOffer);
            // realizamos cambios a la oferta y las guardamos
            $offerToChange->update($request->all());
            //Redireccionamos a la pagina principal
            return redirect('/dashboard')->with('success', 'Se edito correctamente la oferta');
        }

        public function changeStateOfferWithData($idOffer)
        {
            try {
                date_default_timezone_set("America/Mexico_City");
                //Buscamos la oferta por medio de su id
                $offerToChange = OfferWithData::find($idOffer);
                // realizamos cambios a la oferta y las guardamos
                $offerToChange->update(['state' => 'inactive', 'eliminationDate' => date('Y-m-d')]);

                return redirect('/dashboard')->with('success', 'Offer delete successfully');
            } catch (\Exception $e) {
                // Manejar cualquier error que pueda ocurrir durante la eliminación
                return redirect('/dashboard')->with('error', 'could not delete offer' . $e);
            }

        }

        public function changeStateOfferWithOutData($idOffer)
        {
            try {
                date_default_timezone_set("America/Mexico_City");
                //Buscamos la oferta por medio de su id
                $offerToChange = OfferWithOutData::find($idOffer);
                // realizamos cambios a la oferta y las guardamos
                $offerToChange->update(['state' => 'inactive', 'eliminationDate' => date('Y-m-d')]);

                return redirect('/dashboard')->with('success', 'Offer delete successfully');
            } catch (\Exception $e) {
                // Manejar cualquier error que pueda ocurrir durante la eliminación
                return redirect('/dashboard')->with('error', 'could not delete offer' . $e);
            }
        }

        public function deleteOfferWithOutData($idOffer)
        {
            try {
                //Buscar la oferta por medio de su id
                $offerSelected = OfferWithOutData::find($idOffer);
                //Eliminamos la oferta de la bd
                $offerSelected->delete();
                return redirect('/showHistory')->with('success', 'Se elimino la oferta correctamente');
            } catch (Exception $e) {
                // Manejar cualquier error que pueda ocurrir durante la eliminación
                return redirect('/showHistory')->with('error', 'No se pudo eliminar el candidato');
            }
        }

        public function deleteOfferWithData($idOffer)
        {
            try {
                //Buscar la oferta por medio de su id
                $offerSelected = OfferWithData::find($idOffer);
                //Eliminamos la oferta de la bd
                $offerSelected->delete();
                return redirect('/showHistory')->with('success', 'Se elimino correctamente');
            } catch (Exception $e) {
                // Manejar cualquier error que pueda ocurrir durante la eliminación
                return redirect('/showHistory')->with('error', 'No se pudo eliminar el candidato');
            }
        }
    }
