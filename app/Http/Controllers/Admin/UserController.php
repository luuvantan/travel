<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->role==1) {
            return redirect()->route('users.index')->with('msgError', 'Không thể xóa quản lý');
        }
        $user->delete();

        return redirect()->route('users.index')->with('thongbao', 'Xóa users thành công');
    }

    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->role = $user->role == 0 ? 1 : 0;
        $user->save();

        return redirect()->back()->with('thongbao', 'Thêm quyền thành công');
    }
}
