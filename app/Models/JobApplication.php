<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    //Indicamos que tabla usaremos
    protected $table = 'jobApplications';
    //Como no estamos usando la variable por defecto(id), le indicamos como se llama el parametro del id
    protected $primaryKey = 'idJobApplication';

    protected $fillable = [
        'idOffer',
        'CURP'
    ];

    public static function getJobApplicationByOffer($idOffer) {
        return JobApplication::where('idOffer', $idOffer)->get();
    }

    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }

    public function offer() {
        return $this->belongsTo(Offer::class);
    }
}
