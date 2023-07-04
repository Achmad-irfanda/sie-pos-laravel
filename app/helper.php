<?php

namespace App;

use App\Models\CompanyModel;
use App\Models\CompanyUserModel;

class Helpers{
    /**
     * define variable for using in apps 
     */
    public const IMAGE_PATH_THUMBNAIL = "image/thumbnails/";
    public const IMAGE_PATH = "image"; 

    public const PAYMENT_TYPE = ['','cash', 'transfer', 'e-wallet'];   

    /**
     * Get Company Information
     * @return mixed
     * @throws \Exception
     */

     public static function company(){
        $company = CompanyModel::where('UserId', auth('api')->user()->id)->first();
        if (!$company){
            throw new \Exception('Company not found');
        }
        return $company;
     }

     /**
      * @throws \Exception
      */
    public static function companyId(){
        $user = auth('api')->user();
        if($user){
            if($user->user_type == 'admin'){
                // return company from companies   
                $company = CompanyModel::where('UserId', $user->id)->first();
                if(!$company) throw new \Exception('Company not found');
                return $company->CompamyId;
            } else if($user->user_type == 'kasir'){
                $compamyUser = CompanyUserModel::where('UserId', $user->id)->first();
                if (!$compamyUser) throw new \Exception('Company not found'); 
                return $compamyUser->CompanyId;
            }
        }
        throw new \Exception('Ccompany not found');
        
    }
}