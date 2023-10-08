<?php

    namespace App\Http\Controllers;

    use App\Models\Company;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

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

        public function registerCompany()
        {

        }

        public function showAllCompanies()
        {
            //si existe un usuario autenticado lo redirigimos a ver todas las compañias
            if (Auth::check()) {
                return view('admin.showCompanies');
            }
            return view('/home');
        }

        public function showEditCompany($idCompany)
        {
            //si existe un usuario autenticado redirigimos a editar la compañia
            if (Auth::check()) {
                // filtramos a la compañia por medio del id de la compañia que ha seleccionado para editar
//                $companySelected = Company::getCompanyById($idCompany);
                $companySelected = "";
                // devolvemos un objeto con los datos de la compañia seleccionada
                // a la respectiva vista
                return view('admin.editCompany', ['companySelected' => $companySelected]);
            }
            return view('/home');
        }
    }
