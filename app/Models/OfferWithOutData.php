<?php

    namespace App\Models;

    use App\customClass\IOffer;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

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

        public function getAllOffertsActives()
        {
            return OfferWithOutData::select(
                'offerImage',
                DB::raw("DATE_FORMAT(publicationDate,'%y-%m-%d') as fecha_convertida"),
                'eliminationDate',
                'state'
            )->where('state', 'active')->get();
        }

        public function getAllOffertsInactives()
        {
            return OfferWithOutData::select(
                'offerImage',
                DB::raw("DATE_FORMAT(publicationDate,'%y-%m-%d %h:%i:%s') as fecha_convertida"),
                'eliminationDate',
                'state'
            )->where('state', 'inactive')->get();
        }

        public function getOffertsByIdCompany(string $idCompany)
        {
            return OfferWithOutData::where('mail', $idCompany)->get();
        }

        public function getOfferById($idOffer)
        {
            return OfferWithOutData::where('publicationDate', $idOffer)->get();
        }

        public function getAllOffertsActivesForAdmin()
        {
            return OfferWithOutData::select(
                'offerImage',
                DB::raw("DATE_FORMAT(publicationDate,'%y-%m-%d %h:%i:%s') as fecha_convertida"),
                'eliminationDate',
                'state'
            )->where('state', 'active')->get();
        }
        public function company()
        {
            return $this->belongsTo(Company::class, 'email', 'email');
        }
    }
