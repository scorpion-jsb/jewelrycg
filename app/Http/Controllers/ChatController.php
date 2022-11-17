<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ChatController extends Controller
{
     public function create(Request $request)
        {
            $seller = $request->seller;
            $user_id = Auth::user()->id;
           
            if($seller){
                $is_connected = Message::where(['user_id' =>$user_id,'dest_id' => $seller])->count();
                if($is_connected == 0){
                    $message = new Message;
                    $message->user_id = $user_id;
                    $message->dest_id = $seller;
                    $message->save();
                }
            }
            // $chat_content = Message::where(['user_id'=>$user_id,'dest_id'=>$seller])
            //                         ->orWhere(['user_id'=>$seller,'dest_id'=>$user_id])
            //                         ->get();
            $chat_content = DB::select(DB::raw('SELECT * FROM `messages` WHERE (user_id='.$user_id.' AND dest_id='.$seller.') OR (user_id='.$seller.' AND dest_id='.$user_id.');'));                        
            
            $side_info = DB::select(DB::raw('SELECT a.*, u.`first_name`,u.`last_name`,u.`id` FROM (SELECT m.* FROM messages m WHERE id IN (SELECT MAX(id) FROM messages GROUP BY dest_id) AND user_id = '.$user_id.') AS a LEFT JOIN users u ON a.dest_id = u.id  ORDER BY a.created_at DESC'));

            return view('chat.create', compact('side_info','chat_content','seller','user_id'));
        }

    public function contentFetchByClientId(Request $request){
        $client_id = $request->client_id;
        $user_id = Auth::user()->id;
        $chat_content = Message::where(['user_id'=>$user_id,'dest_id'=>$client_id])
                                    ->orWhere(['user_id'=>$client_id,'dest_id'=>$user_id])
                                    ->get();
        $chat_content = DB::select(DB::raw('SELECT * FROM `messages` WHERE (user_id='.$user_id.' AND dest_id='.$client_id.') OR (user_id='.$client_id.' AND dest_id='.$user_id.');'));                            
        return response()->json([
            'result'        => true,
            'chat_content'  => $chat_content,
        ]);
    }    
       
    public function filter(Request $request){
        $filter = $request->filter;
        $user_id = Auth::user()->id;
        if(strlen($filter)==0){
            $side_info = DB::select(DB::raw('SELECT a.*, u.`first_name`,u.`last_name` FROM (SELECT m.* FROM messages m WHERE id IN (SELECT MAX(id) FROM messages GROUP BY dest_id) AND user_id = '.$user_id.') AS a LEFT JOIN users u ON a.dest_id = u.id   ORDER BY a.created_at DESC'));
            return view('chat.create', compact('side_info'));
        }else if(strlen($filter)!=0) {
            $side_info = DB::select(DB::raw('SELECT a.*, u.`first_name`,u.`last_name` FROM (SELECT m.* FROM messages m WHERE id IN (SELECT MAX(id) FROM messages GROUP BY dest_id) AND user_id = '.$user_id.') AS a LEFT JOIN users u ON a.dest_id = u.id  WHERE u.`first_name`=".$filter" OR u.`last_name`=".$filter" ORDER BY a.created_at DESC'));
            return view('chat.create', compact('side_info'));
        } 

    }
        
    public function getNameById($user_id){
       return  $user_name = User::where('id',$user_id)->get('first_name');
    }    
}
