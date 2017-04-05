<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use Closure;

class CheckEvent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->input('event') == NULL) {

             return response('Event not specified', 417);

        } else {

             switch ($request->input('event')) {
                  case 'london':
                     $eventPref = "en";
                     break;

                  case 'sanfrancisco':
                     $eventPref = "sf";
                     break; 

                   case 'amsterdam':
                    $eventPref = "am";
                     break;
                   
                 default:
                      return response('Unknown event', 400);
                    break;
             }

       }

        if ($request->input('pagetype') == NULL) {
            $eventType = "sp";
            $eventMode = "moo";
        } else {

              switch ($request->input('pagetype')) {
                  case 'afterevent':
                     $eventType = "ae";
                     $eventMode = "special";
                     break;

                  case 'preevent':
                     $eventType = "pe";
                     $eventMode = "special";
                     break; 

                   case 'mainpage':
                    $eventType = "mp";
                    $eventMode = "simple";
                     break;


                   case 'disrupthr':
                    $eventType = "dhr";
                    $eventMode = "special";
                     break;                     
                   
                 default:
                      $eventType = "sp";
                      $eventMode = "simple";
                    break;
             }  

        }
        
        $request->attributes->add([
            'eventCode' => $eventPref, 
            'eventType' => $eventType, 
            'eventMode' => $eventMode, 
            ]);
 

        return $next($request);
    }
}
