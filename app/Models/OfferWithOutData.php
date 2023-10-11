<?php

namespace App\Models;

use App\customClass\IOffer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferWithOutData extends Model implements IOffer
{
    use HasFactory;

    protected $table = 'offerts_with_out_data';
    protected $primaryKey = self::PRIMARYKEY;

    protected $fillable = [
        'offerImage',
        'publicationDate',
        'eliminationDate',
        'email',
        'state'
    ];

    public function getAllOfferts()
    {
        return OfferWithOutData::all();
    }

    public function getOffertsByIdCompany(string $idCompany)
    {
        return OfferWithOutData::where('mail', $idCompany)->get();
    }

    public function getOfferById($idOffer)
    {
        return OfferWithOutData::where('publicationDate', $idOffer)->get();
    }
}
