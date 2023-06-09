<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\V1\StorePersonRequest;
use App\Http\Requests\V1\UpdatePersonRequest;
use App\Http\Requests\V1\BulkStorePersonRequest;
use App\Http\Resources\V1\PersonResource;
use App\Http\Resources\V1\PersonCollection;
use App\Filters\V1\PeopleFilter;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PeopleFilter();
        $queryItems = $filter->transform($request);

        if($queryItems && count($queryItems) == 0){
            return new PersonCollection(Person::paginate());
        }else{
            $people = Person::where($queryItems)->paginate();
            return new PersonCollection($people->appends($request->query()));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        return new PersonResource(Person::create($request->all()));
    }

    public function bulkStore(BulkStorePersonRequest $request){
        $bulk = collect($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['firstName', 'lastName', 'mobileNumber', 'postCode']);
        });

        Person::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
