<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information\Vaccination;
use Illuminate\Support\Facades\Auth;

class vaccineController extends Controller
{
    public static $products, $product, $image, $imageName, $imageUrl, $directory;

    public function vaccinationRecord(Request $request)
    {
        
        $vaccinationRecords = Vaccination::all();
    
        return view('pages.info-vaccination-record', compact('vaccinationRecords'));
    }


    public static function uploadImage($request, $product = null)
    {
        self::$image = $request->file('image');
        if (self::$image) {
            if ($product) {
                if (file_exists($product->image)) {
                    unlink($product->image);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'public/assets/images/upload-images/vaccine/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl = self::$directory . self::$imageName;
        } else {
            if ($product) {
                self::$imageUrl = $product->image;
            } else {
                self::$imageUrl = null;
            }
        }

        return self::$imageUrl;
    }
    public function saveVaccinations(Request $request)
    {
       
        try{

           
            if($request->hidden_section == 'section one')
            {
                $vaccinestore = new Vaccination;
                $vaccinestore->type = $request->hidden_section;
                $vaccinestore->vaccine_name = $request->vaccine_name;
                $vaccinestore->dose_01 = $request->doseone;
                $vaccinestore->dose_02 = $request->dosetwo;
                $vaccinestore->dose_03 = $request->dosethree;
                $vaccinestore->booster = $request->booster;
                $vaccinestore->upload_tool = self::uploadImage($request);
                $vaccinestore->patient_id = Auth::user()->id;
                $vaccinestore->save();
            }else if($request->hidden_section == 'section two'){
                $vaccinestore = new Vaccination;
                $vaccinestore->type = $request->hidden_section;
                $vaccinestore->manufacturer = $request->manufacturer;
                $vaccinestore->dose_01 = $request->doseone;
                $vaccinestore->dose_02 = $request->dosetwo;
                $vaccinestore->dose_03 = $request->dosethree;
                $vaccinestore->booster = $request->booster;
                $vaccinestore->location = $request->location;
                $vaccinestore->certificate_number = $request->certificate;
                $vaccinestore->upload_tool = self::uploadImage($request);
                $vaccinestore->patient_id = Auth::user()->id;
                $vaccinestore->save();
            }else{
                $vaccinestore = new Vaccination;
                $vaccinestore->type = $request->hidden_section;
                $vaccinestore->market_name = $request->market_name;
                $vaccinestore->applicable_for = $request->applicable_name;
                $vaccinestore->dose_01 = $request->doseone;
                $vaccinestore->dose_02 = $request->dosetwo;
                $vaccinestore->dose_03 = $request->dosethree;
                $vaccinestore->booster = $request->booster;
                $vaccinestore->upload_tool = self::uploadImage($request);
                $vaccinestore->patient_id = Auth::user()->id;
                $vaccinestore->save();
            }

           
            $notification = ['messege' => 'Data has been saved successfully', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        }catch(Exception $e){
            $notification = ['messege' => 'Media Info save not successfull', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }
       
    }
}
