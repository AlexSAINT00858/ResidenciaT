<?php

namespace App\Models;

use App\customClass\IOffer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OfferWithData extends Model implements IOffer
{
    use HasFactory;

    protected $table = 'offerts_with_data';
    protected $primaryKey = self::PRIMARYKEY;

    protected $fillable = [
        'offerName',
        'descriptionOffer',
        'publicationDate',
        'eliminationDate',
        'salary',
        'email',
        'state'
    ];
    public function getAllOfferts()
    {
        return OfferWithData::all();
    }

    public function getOffertsByIdCompany(string $idCompany)
    {
        return OfferWithData::where('mail', $idCompany)->get();
    }

    public function getOfferById($idOffer)
    {
        return OfferWithData::where('publicationDate', $idOffer)->get();
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
