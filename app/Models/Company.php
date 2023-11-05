<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Company extends Model
    {
        use HasFactory;

        protected $table = 'companies';
        protected $primaryKey = 'email';
        /*
         * Como estamos usando otro campo como llave primaria devemos indicar que no es autoincrementable
         * ya que al hacer una consulta nos devolver 0
         */
        public $incrementing = false;
        protected $fillable = [
            'nameCompany',
            'address',
            'phoneNumber',
            'email',
            'logo'
        ];

        public static function getAllCompanies()
        {
            return Company::select('email', 'nameCompany')->get();
        }

        public static function getCompanyById($idCompany)
        {
            return Company::where('email', $idCompany)->get();
        }

        public static function getCompanies()
        {
            return Company::select('nameCompany', 'address', 'phoneNumber', 'email', 'logo')->get();
        }

        public static function getLogoByIdCompany($idCompany) {
            return Company::select('logo')->where('email', $idCompany)->get();
        }
    }
