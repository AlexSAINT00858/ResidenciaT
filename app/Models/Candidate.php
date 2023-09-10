<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    //Indicamos que tabla usaremos
    protected $table = 'candidates';
    //Como no estamos usando la variable por defecto(id), le indicamos como se llama el parametro del id
    protected $primaryKey = 'CURP';

    protected $fillable = [
        'CURP',
        'nameCandidate',
        'lastName',
        'phoneNumberCandidate',
        'emailCandidate',
        'jobTrade',
        'resumeCandidate'
    ];

    public static function getCandidatesById($idCandidate) {
        return Candidate::where('CURP', $idCandidate)->get();
    }

    public static function existCandidatesById($idCandidate) {
        return Candidate::where('CURP', $idCandidate)->exists();
    }
}
