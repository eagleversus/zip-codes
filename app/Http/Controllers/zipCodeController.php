<?php

namespace App\Http\Controllers;

use App\Classes\federal_entity;
use App\Classes\municipality;
use App\Classes\settlement;
use App\Classes\settlement_type;
use App\Classes\zipCodeObject;
use App\Models\neighborhood;
use App\Models\city;
use App\Models\state;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class zipCodeController extends Controller
{
    public function getZipCodes($id)
    {
        
        $lista= neighborhood::where('codeneighborhoods', $id)->get();
        if (!$lista->isEmpty() ) {
            # code...
        
        $collection= collect();
        $zipobject= new zipCodeObject();
        $valores= neighborhood::where('codeneighborhoods', $id)->first();
        $zipobject->zip_code= $valores->codecodeneighborhoods;
        $municipio = city::where('idcitys',$valores->idcitys)->first();
        $estado = state:: where('idstates',$municipio->idstates)->first();
        
        $zipobject->zip_code=$id;
        $zipobject->locality= $municipio->namecitys;
        $zipobject->federal_entity= new federal_entity();
        $zipobject->federal_entity->key= intval($estado->codestates);
        $zipobject->federal_entity->name= $estado->namestates;
        $zipobject->federal_entity->code= $estado->initialstates;
        $zipobject->settlements=collect();
        foreach ($lista as $key => $value) {
              $settle= new settlement();
              $settle->key=intval($value->keyneighborhoods);
              $settle->name=strtoupper($value->nameneighborhoods);
              $settle->zone_type=$value->zoneneighborhoods;
             // $settle->settlement_type=collect();
             $settle->settlement_type=new settlement_type();
              $settle->settlement_type->name=$value->typeneighborhoods;
              
              $zipobject->settlements->add($settle);
              //$zipobject= new zipCodeObject();
              //$zipobject->zip_code=$value->codeneighborhoods;
               //$collection->add($zipobject);
                
        }
        $zipobject->municipality= new municipality();
        $zipobject->municipality->key=intval($municipio->codecitys);
        $zipobject->municipality->name=$municipio->namecitys;
        
        return  json_encode( $zipobject->jsonSerialize(), JSON_UNESCAPED_UNICODE );
        }
        else
        {
            abort(404);
        }
    }
}
