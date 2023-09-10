<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DB;

class Offer extends Model
{
    use HasFactory;

    //Indicamos que tabla usaremos
    protected $table = 'offerts';
    //Como no estamos usando la variable por defecto(id), le indicamos como se llama el parametro del id
    protected $primaryKey = 'idOffer';

    protected $fillable = [
        'offerName',
        'descriptionOffer',
        'publicationDate',
        'salary',
        'idCompany'
    ];

    public static function getAllOfferts() {
        return Offer::all();
    }

    //Devolvemos las ofertas de trabajo que ha creado cierta compañia
    public static function getOffertsByIdCompany(String $idCompany) {
        return Offer::where('idCompany', $idCompany)->get();
    }
    //Devolvemos la oferta de trabajo por medio del id que nos proporcionan
    public static function getOfferById($idOffer) {
        return Offer::where('idOffer', $idOffer)->get();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
