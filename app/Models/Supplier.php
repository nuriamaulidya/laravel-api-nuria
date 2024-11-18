<?php

namespace App\Models;

use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id','contact',];

    // Relasi Many-to-One dengan model Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
    * Aturan validasi untuk model ini.
    *
    * @return array
    */
   public static function rules($process)
   {
       if ($process == 'insert') {
           return [
               'name' => 'required|string|max:225',
               'price' => 'required|integer',
           ];
       } elseif ($process == 'update') {
           return [
               'name' => 'required|string|max:225',
               'price' => 'required|integer',
           ];
       }
   }

   /**
    * Mendaftarkan aturan validasi kustom.
    *
    * @param  \Illuminate\Validation\Validator  $validator
    * @return void
    */
   public static function customValidation(Validator $validator)
   {
       $customAttributes = [
           'name' => 'Nama',
           'price' => 'Harga',
       ];

       $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
           return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
       });

       $validator->addReplacer('price', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
           return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa angka.');
       });
   }

}
