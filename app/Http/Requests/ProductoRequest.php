<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.unique' => 'Ya existe un producto con ese nombre.',
            'precio.required' => 'El precio es requerido.',
            'stock.required' => 'El stock es requerido.',
            'descripcion.required' => 'La descripcion es requerida.',
            'descripcion.max' => 'Maximo numero de caracteres 200.',
            'id_categoria.required' => 'La categoria es requerida.',
            'image.required' => 'La imagen es requerida',
            'image.dimensions' => 'Por favor subir una imagen de 480x480.',
            'image-detalle.required' => 'La imagen de detalle es requerida',
            'image-detalle.dimensions' => 'Por favor subir una imagen de 480x480 (Imagen detalle).',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $edit = $this->has('id_producto');
        
        return [
            'nombre' => $edit ? 'required' : 'required|unique:producto',
            'precio' => 'required',
            'stock' => 'required',
            'descripcion' => 'required|max:200',
            'id_categoria' => 'required',
            'image' => $edit ? '' : 'required|image|mimes:jpeg,png,jpg|dimensions:width=480,height=480',
            'image-detalle.*' => $edit ? '' : 'required|image|mimes:jpeg,png,jpg|dimensions:width=480,height=480',
        ];
    }
}
