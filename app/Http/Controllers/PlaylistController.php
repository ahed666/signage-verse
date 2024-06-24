<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PlaylistUpdated;
use App\Jobs\UpdateDevice;
class PlaylistController extends Controller
{
    public function refresh($code)
    {
        // event(new PlaylistUpdated($code));

        UpdateDevice::dispatch($code);
        // return response()->json(['message' => 'Playlist refresh event triggered.']);
    }
}
