<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\Request;
use OpenAI\Laravel\Facades\OpenAI;


class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        $path = Storage::disk('public')->put('avatars',$request->file('avatar'));
        //$path = $request->file('avatar')->store('avatars', 'public');
        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);

        }
        auth()->user()->update(['avatar'=> $path]);
        // dd(auth()->user());
        // 


        return redirect(route('profile.edit'))->with('message', 'Avatar is Updated');
    }

    public function generate(Request $request)
    {
        $result = OpenAI::images()->create([
            "prompt" => "penguin",
            'n'      => 1,
            'size'   => "256x256",
    
    
        ]);

        $contents = file_get_contents($result->data[0]->url);
        // dd($contents);

        $filename = Str::random(25);

        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);

        }
        
        Storage::disk('public')->put("avatars/$filename.jpg", $contents);

        auth()->user()->update(['avatar'=> "avatars/$filename.jpg"]);
        return redirect(route('profile.edit'))->with('message', 'Avatar is Updated');
        
    }
}
