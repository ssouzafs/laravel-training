<?php

namespace LaraDev\Http\Controllers;
use LaraDev\Property;
use LaraDev\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
       $properties = Property::orderBy('id', 'DESC')->get();
        return view('property.index', ['properties' => $properties]);
    }

    /**
     * @return void
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * @param  PropertyRequest $request
     * @return void
     */
    public function store(PropertyRequest $request)
    {
        $propertySlug = $this->setFrendlyUrl($request->title);
        $property = [
            'title'=>$request->title,
            'name_uri'=>$propertySlug,
            'description'=>$request->description,
            'rental_price'=>$request->rental_price,
            'sale_price'=>$request->sale_price,
        ];
        Property::create($property);
        return redirect()->route('property.create')->with([
            'color' => 'success',
            'message' => 'Propriedade Cadastrada com Sucesso!'
        ]);
    }

    /**
     * @param  [type] $uri
     * @return void
     */
    public function edit($uri)
    {
        $property = Property::where('name_uri', $uri)->first();
        return view('property.edit', ['property' => $property]);  
    }

    /**
     * @param  PropertyRequest $request
     * @param  [type]  $uri
     * @return void
     */
    public function update(PropertyRequest $request, $uri)
    {
        $propertySlug = $this->setFrendlyUrl($request->title);
        $property = Property::where('name_uri', $uri)->first();

        $property->title = $request->title;
        $property->name_uri = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        if($property->save()){
        return redirect()->route('property.edit', ['property' => $property->name_uri])->with([
            'color' => 'success',
            'message' => 'Propriedade Atualizada com Sucesso!'
        ]);
    }
    // return redirect()->back()->withInputs()->withErrors();
}

/**
 * @param  [type] $uri
 * @return void
 */
    public function destroy($uri)
    {
       Property::where('name_uri', $uri)->delete();
       return redirect()->route('property.index');

    }

    /**
     * Criando URL Amigável.
     * 
     * @param  [type] $requestTitle
     * @return void
     */
    private function setFrendlyUrl($requestTitle)
    {
        $propertySlug = str_slug($requestTitle);
        $properties = Property::all();
        $cont = 0;
        
        foreach($properties as $propert){
            if(str_slug($propert->title) === $propertySlug){
                $cont++;
            }
        }
        if($cont > 0){
            $i =  '-' . $cont;
            $propertySlug = $propertySlug . $i;
        }
        return $propertySlug;
    }
}
