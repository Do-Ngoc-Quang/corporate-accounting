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
        $user = User::find($id);

        if ($user) {

            $user->update([
                'name' => $request->name,
                'sodienthoai' => $request->sodienthoai,
                'diachi' => $request->diachi,
            ]);

            $data = ([
                'id' => $id,
                'name' => $request->name,
                'sodienthoai' => $request->sodienthoai,
                'diachi' => $request->diachi,
                
            ]);
            return response()->json($data);


            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }
}
