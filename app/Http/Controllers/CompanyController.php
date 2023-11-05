<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CompanyRequest;
    use App\Models\Company;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use PHPUnit\Util\Exception;

    class CompanyController extends Controller
    {
        public function showRegisterCompany()
        {
            //si existe un usuario autenticado lo redirigimos a el formulario de registro de la compañia
            if (Auth::check()) {
                return view('admin.registerCompany');
            }
            return view('/home');
        }

        public function registerCompany(CompanyRequest $request)
        {
            $dataCompany = [
                'nameCompany' => $request->validated()['nameCompany'],
                'address' => $request->validated()['address'],
                'phoneNumber' => $request->validated()['phoneNumber'],
                'email' => $request->validated()['email'],
                'logo' => $request->validated()['logo'] ?? null
            ];

            //subir img
            //Si se subio el curriculum registramos al usuario
            $response = $this->saveImage($request);
            if ($response[0]) {
                $dataCompany['logo'] = $response[1];
            }else {
                //Si al registrar una empresa no se carga una imagen se redireccionara a la omagen por defecto
                $dataCompany['logo'] = "empresa.png";
            }
            // realizamos la incersion de la nueva oferta pasando los atributos de la oferta
            company::create($dataCompany);
            // Redireccionamos a la vista pricipal
            return redirect('/viewCompanies')->with('success', 'Se registro la empresa correctamente');
        }

        public function editCompany(CompanyRequest $request, $idCompany)
        {
            $request->validated()['nameCompany'];
            $request->validated()['address'];
            $request->validated()['phoneNumber'];
            $request->validated()['email'];
                $request->validated()['logo'] ?? null;

            //subir img
            //Si se subio el curriculum registramos al usuario
            $response = $this->saveImage($request);

            $stateChangeToImage = [true, 1];
            if ($response[0]) {
                //Verificamos si existe el campo logo
                if ($request->has('logo')) {
                    $request->merge(['logo' => $response[1]]);
                    //obtenemos el nombre de la imagen del logo
                    $company = Company::getLogoByIdCompany($idCompany);
                    //eliminamos la imagen ya que se remplazara
                    //Pero si es la que trae por defecto no se elimina
                    //Por que afectaria las otras empresa
                    if($company->first()->logo != "empresa.png") {
                        $stateChangeToImage = $this->deleteImage($company->first()->logo);
                    }
                }
            }

            if ($stateChangeToImage[1] == 1) {
                //Realizamos cambios en la bd
                $companyToChange = Company::find($idCompany);
                $companyToChange->update($request->all());
                if($request->hasFile("logo")) {
                    $companyToChange->logo = $response[1];
                    $companyToChange->save();
                }
            }

            if ($stateChangeToImage[1] == -1 || $stateChangeToImage[1] == 0) {
                return redirect('/editCompany/' . $idCompany)->with('danger', 'No se pudo hacer la modificacion por error al eliminar la imagen anterior de la compañia');
            }
            //Redireccionamos a la pagina principal
            return redirect('/viewCompanies')->with('success', 'Se edito correctamente la oferta');
        }

        //subir la imagen de la oferta de empleo
        private function saveImage($request): array
        {
            date_default_timezone_set("America/Mexico_City");
            //Si se sube la imagen registramos a la oferta
            if ($request->hasFile("logo")) {
                $file = $request->file("logo");
                $name = "company_" . date('y-m-d H:i:s') . "." . $file->guessExtension();
                $ruta = public_path("imagesCompanies/" . $name);
                if ($file->guessExtension() == "jpg" || $file->guessExtension() == "png" || $file->guessExtension() == "jpeg") {
                    copy($file, $ruta);
                    return [true, $name];
                }
            }
            return [false];
        }

        /*
         * Elimina las imagenes de las compañias cada ves que se quiere cambiar por otra
         * tiene tres tipos de retorno
         * [true, 1] => se elimino correctamente
         * [false, 0] => no se pudo eliminar
         * [false, -1] => no existe el archivo
         */
        private function deleteImage($idImage)
        {
            if (file_exists("imagesCompanies/" . $idImage)) {
                if (unlink("imagesCompanies/" . $idImage)) {
                    return [true, 1];
                } else {
                    return [false, 0];
                }
            } else {
                return [false, -1];
            }
        }

        public function showAllCompanies()
        {
            //si existe un usuario autenticado lo redirigimos a ver todas las compañias
            if (Auth::check()) {
                $companies = Company::getCompanies();
                return view('admin.showCompanies', ['companies' => $companies]);
            }
            return view('/home');
        }

        public function showEditCompany($idCompany)
        {
            //si existe un usuario autenticado redirigimos a editar la compañia
            if (Auth::check()) {
                // filtramos a la compañia por medio del id de la compañia que ha seleccionado para editar
                $companySelected = Company::getCompanyById($idCompany);
                // devolvemos un objeto con los datos de la compañia seleccionada
                // a la respectiva vista
                return view('admin.editCompany', ['companySelected' => $companySelected]);
            }
            return view('/home');
        }

        public function deleteCompany($idCompany) {
            try {
                //Buscar la compañia por medio de su id
                $companySelected = Company::find($idCompany);
                //Eliminamos la compañia de la bd
                $companySelected->delete();
                return redirect('/viewCompanies')->with('success', 'Se elimino la compañia correctamente');
            } catch (Exception $e) {
                // Manejar cualquier error que pueda ocurrir durante la eliminación
                return redirect('/viewCompanies')->with('error', 'No se pudo eliminar la compañia');
            }
        }
    }
