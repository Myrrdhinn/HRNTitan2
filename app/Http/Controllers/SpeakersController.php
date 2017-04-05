<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speakers;
use App\SpeakersStatus;
use App\SpeakersStatusSpecial;
use App\SpeakersOrder;
use App\SpeakersOrderSpecial;
use App\Http\Requests\SpeakerRequest;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $statVar = $request->get('eventCode').'_'.$request->get('eventType').'_status';

        //Get speakers for the given event
        $result = Speakers::whereHas('speakers_status', function ($q) use($statVar){
        $q->where($statVar, 1);
        })->get();

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpeakerRequest $request){

         //getting the required connection
        $connection = \DB::connection('main');

        //Based on parameters set the event+page status variable (eg: en_sp_status)
        $statVar = $request->get('eventCode').'_'.$request->get('eventType').'_status';

        // Start transaction!
        $connection->beginTransaction();

        try {
            //Try to save the User data
                   $SaveData = Speakers::create([

                        'name' => request('name'),
                        'title' => request('title'),
                        'bio' => request('bio'),
                        

                    ]);
        } catch(ValidationException $e){
            // Rollback and then present error
            
            $connection->rollback();
            return $e;
        } catch(\Exception $e)
        {
            $connection->rollback();
            throw $e;
        }

        try {
                //Based on the page code insert in to the tables
            switch ($request->get('eventMode')) {
                case 'simple':

                   //Try to save the user Status data
                    $SaveStatus = SpeakersStatus::create([
                        'speaker_id' => $SaveData->id,
                         $statVar => request('status')

                    ]);


                        //Try to save the user Status Special data
                    $SaveStatusSpecial = SpeakersStatusSpecial::create([
                        'speaker_id' => $SaveData->id,
                         

                    ]);
                   
                    break;

                case 'special':

                //Try to save the user Status data
                    $SaveStatus = SpeakersStatus::create([
                        'speaker_id' => $SaveData->id,
                         

                    ]);


                     //Try to save the user Status Special data
                    $SaveStatusSpecial = SpeakersStatusSpecial::create([
                        'speaker_id' => $SaveData->id,
                         $statVar => request('status')
                         

                    ]);

                    break;                    
                
            }



        } catch(ValidationException $e){
            // Rollback and then redirect
          
            $connection->rollback();
            return $e;
        } catch(\Exception $e)
        {
            $connection->rollback();
            throw $e;
        }

        // If we reach here, then
        // data is valid and working.
        // Commit the queries!
        $connection->commit();


         return "Speker Saved!";

            /*'name' => 'test Three',
            'title' => 'titleSas',
            'bio' => 'MooBio',
            //'en_sp_status' => 1,
            request(['name', 'title', 'bio', 'en_sp_status'])*/

     

       
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
