<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

        private $name;
        private $address;
        private $phoneNumber;
        private $logo;

        public function __constructor()
        {

        }

        public function getCompanyById($idCompany)
        {
            return "";
        }

        public function registerCompany($data) {

        }

        public function getCompanies()
        {

        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setAddress($address)
        {
            $this->address = $address;
        }

        public function setPhoneNumber($phoneNumber)
        {
            $this->phoneNumber = $phoneNumber;
        }

        public function setLogo($logo)
        {
            $this->logo = $logo;
        }
}
