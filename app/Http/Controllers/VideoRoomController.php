<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use App\VideoRoom;
use DB;

class VideoRoomController extends Controller
{
    protected $sid;
    protected $token;
    protected $key;
    protected $secret;

    public function __construct() {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }

    public function indexGuru()
    {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);

                $rooms = array_map(function($room) {
                return $room->uniqueName;
                }, $allRooms);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('vidcon.guru-index', ['rooms' => $rooms]);
    }

    public function indexMurid()
    {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);

                $rooms = array_map(function($room) {
                return $room->uniqueName;
                }, $allRooms);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('vidcon.murid-index', ['rooms' => $rooms]);
    }

    public function createRoom(Request $request)
    {
        $client = new Client($this->sid, $this->token);

        $exists = $client->video->rooms->read([ 'uniqueName' => $request->roomName]);

        $data = DB::table('video')->where('room_name', '=', $request->roomName)->get();
        
        if (empty($exists)) {
            if (empty($data)) {
                DB::table('video')->where('room_name', $data)->update(['rooms_name' => $data['room_name'] , 'password' => $data['room_password']]);

                $client->video->rooms->create([
                    'uniqueName' => $request->roomName,
                    'type' => 'group',
                    'recordParticipantsOnConnect' => false
                ]);
            } else {
                DB::table('video')->insert(['room_name' => $request->roomName, 'room_password' => $request->room_password]);

                $client->video->rooms->create([
                    'uniqueName' => $request->roomName,
                    'type' => 'group',
                    'recordParticipantsOnConnect' => false
                ]);
            }
        }

        \Log::debug("created new room: ".$request->roomName);

        return redirect()->action('VideoRoomController@joinRoom', ['roomName' => $request->roomName]);
    }
    
    public function joinRoomMurid(Request $request)
    {
        $client = new Client($this->sid, $this->token);
        
        $data2 = DB::table('video')->where([['room_name', '=', $request->roomName], ['room_password', '=', $request->room_password]])->get();

        if(count($data2)>=1){
            return redirect()->action('VideoRoomController@joinRoom', ['roomName' => $request->roomName]);
        } else {
            echo "Data yang anda masukkan salah !";
        }
    }

    public function joinRoom($roomName)
    {
        // A unique identifier for this user
        $identity = rand(3,1000);

        \Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($roomName);

        $token->addGrant($videoGrant);

        return view('vidcon.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName ]);
    }
}