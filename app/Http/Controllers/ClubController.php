<?php

namespace App\Http\Controllers;

use App\Models\club;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use DB;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clubs');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function fetchclub(Request $request)
    {   
        $clubs = club::all();
        return response()->json([
            'clubs'=>$clubs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        
                $filename = $request->file("club_logo")->getClientOriginalName();
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $fileNameToStore = $filename."_".time();
                $logo = $request->file("club_logo")->storeAs("/public/logos", $fileNameToStore); 

                $filename = $request->file("club_banner")->getClientOriginalName();
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $fileNameToStore = $filename."_".time();
                $banner = $request->file("club_banner")->storeAs("/public/banners", $fileNameToStore);

                $clubs = new club; 
                $clubs->group_id = $request->input('group_id');
                $clubs->business_name = $request->input('business_name');
                $clubs->club_number = $request->input('club_number');
                $clubs->club_name = $request->input('club_name');
                $clubs->club_state = $request->input('club_state');
                $clubs->club_description = $request->input('club_description');
                $clubs->club_slug = $request->input('club_slug');
                $clubs->website_title = $request->input('website_title');
                $clubs->website_link = $request->input('website_link');
                $clubs->club_logo = $logo;
                $clubs->club_banner = $banner; 
                $clubs->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Club Added successfully'
                ]);
    }

    //search 
    public function search(Request $request){
        if($request){
            $club = DB::table('clubs')->where('business_name','LIKE','%'.$request->search."%")->get();
        
            $output="";
                foreach($club as $c){
                    $output='<tr>'.
                    '<td>'.$c->id.'</td>'.
                    '<td>'.$c->group_id.'</td>'.
                    '<td>'.$c->business_name.'</td>'.
                    '<td>'.$c->club_number.'</td>'.
                    '<td>'.$c->club_name.'</td>'.
                    '<td>'.$c->club_state.'</td>'.
                    '<td>'.$c->club_description.'</td>'.
                    '<td>'.$c->website_title.'</td>'.
                    '<td>'.$c->website_link.'</td>'.
                    '<td>'.$c->club_logo.'</td>'.
                    '<td>'.$c->club_banner.'</td>'.
                    '</tr>';
                }
                return response()->json([
                    'search' => $club,
                ]);
        } 
    }
    /**
     * Display the specified resource.
     */
    public function show(club $club)
    {
        if($club){
            return response()->json(['status' => 'success', 'data' => $club]);
        }
        else{
        return response()->json(['status' => 'Failed', 'data' => 'no products Found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $club = club::where('id',$id)->first();
        
        return response()->json($club);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        dd($request->all());
        if($request->$id){ 
            $club = club::find($request->$id);
            $club->update($request->all());
            dd($request->$id);
                return response()->json([
                    'status' => 200,
                    'message' => 'Club updated successfully'
                ]);
        }       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(club $club,$id)
    {
        $club = club::find($id);
        if($club)
        {
            $club->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Product Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Product Found.'
            ]);
        }
    }
}
