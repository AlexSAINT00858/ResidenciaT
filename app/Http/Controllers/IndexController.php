<?php

    namespace App\Http\Controllers;

    use App\Models\OfferWithData;
    use App\Models\OfferWithOutData;
    use Illuminate\Http\Request;

    class IndexController extends Controller
    {
        //views
        public function show()
        {
            // filtramos todas las ofertas de trabajo
            $offer1 = new OfferWithData();
            $offer2 = new OfferWithOutData();
            $offertsWithData = $offer1->getAllOffertsActives();
            $offertsWithOutData = $offer2->getAllOffertsActives();

            $result = $offertsWithData->concat($offertsWithOutData);
            $result = $result->sortBy('fecha_convertida');

            // retornamos la vista con un arreglo que contiene todas las ofertas de empleo
            return view('welcome', [
                'offerts' => $result
            ]);
        }
    }
