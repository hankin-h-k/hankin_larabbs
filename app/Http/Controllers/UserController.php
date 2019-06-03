<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']);
    }

    public function show(Request $request, User $user)
    {

    	// $topics = $user->topics()->paginate();
    	return view('users.show', compact('user'));
    }

    public function update(UserRequest $request, User $user, ImageUploadHandler $upload)
    {
    	$this->authorize('update', $user);
    	$data = $request->all();
    	if ($request->avatar) {
    		$result = $upload->save($request->avatar, 'avatars', $user->id, 416);
    		if ($result) {
    			$data['avatar'] = $result['path'];
    		}
    	}
    	$user->update($data);
    	return redirect()->route('users.show', $user->id)->with('success', '个人资料修改成功');
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
    	return view('users.edit', compact('user'));
    }
}
