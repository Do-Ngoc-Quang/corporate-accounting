<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class USERController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('user.user', compact('user'));
    }

    public function update(Request $request, $id){
        // $user = User::find($id);

        // if ($user) {

        //     $user->update([
        //         'name' => $request->name,
        //         'sodienthoai' => $request->sodienthoai,
        //         'diachi' => $request->diachi,
        //     ]);

        //     $data = ([
        //         'id' => $id,
        //         'name' => $request->name,
        //         'sodienthoai' => $request->sodienthoai,
        //         'diachi' => $request->diachi,
                
        //     ]);
        //     return response()->json($data);


        //     return response()->json(['success']);
        // } else {
        //     return response()->json(['error']);
        // }

        $user = User::find($id);

        $user->name = $request['name'];
        $user->sodienthoai = $request['sodienthoai'];
        $user->diachi = $request['diachi'];
  
        if(isset($request->avatar)){
            $img_temp = pathinfo($request->avatar->getClientOriginalName());
            $request->avatar->storeAs('public/upload_avatars/',$img_temp['basename']);
            $user->avatar = $img_temp['basename'];
        }
        
        $user->save();

        return redirect('/user');
    }
}
