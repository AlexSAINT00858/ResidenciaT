<?php

    namespace App\Models;

    use App\customClass\IOffer;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

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

        public function getAllOffertsActives()
        {
            return OfferWithData::select(
                'offerts_with_data.offerName',
                'offerts_with_data.descriptionOffer',
                DB::raw("DATE_FORMAT(offerts_with_data.publicationDate,'%Y-%m-%d') as fecha_convertida"),
                'offerts_with_data.eliminationDate',
                'offerts_with_data.salary',
                'offerts_with_data.email',
                'offerts_with_data.state',
                'companies.logo'
            )
                ->join('companies', 'offerts_with_data.email', '=', 'companies.email')
                ->get();
        }

        public function getAllOffertsInactives()
        {
            return OfferWithData::select(
                'offerName',
                'descriptionOffer',
                DB::raw("DATE_FORMAT(publicationDate,'%Y-%m-%d %H:%i:%s') as fecha_convertida"),
                'eliminationDate',
                'salary',
                'email',
                'state'
            )->where('state', 'inactive')->get();
        }

        public function getOffertsByIdCompany(string $idCompany)
        {
            return OfferWithData::where('mail', $idCompany)->get();
        }

        public function getOfferById($idOffer)
        {
            $resultado = OfferWithData::select(
                'offerName',
                'descriptionOffer',
                DB::raw("DATE_FORMAT(publicationDate,'%Y-%m-%d %H:%i:%s') as fecha_convertida"),
                'eliminationDate',
                'salary',
                'email',
                'state'
            )->where('publicationDate', $idOffer)->get();
            return $resultado;
        }

        public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(Company::class, 'email');
        }

        public function getAllOffertsActivesForAdmin()
        {
            return OfferWithData::select(
                'offerts_with_data.offerName',
                'offerts_with_data.descriptionOffer',
                DB::raw("DATE_FORMAT(offerts_with_data.publicationDate,'%Y-%m-%d %H:%i:%s') as fecha_convertida"),
                'offerts_with_data.eliminationDate',
                'offerts_with_data.salary',
                'offerts_with_data.email',
                'offerts_with_data.state',
                'companies.logo'
            )
                ->join('companies', 'offerts_with_data.email', '=', 'companies.email')
                ->get();
        }
    }
