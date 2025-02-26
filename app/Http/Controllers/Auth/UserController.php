<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTheme;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $folder = 'assets/images/auth';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $userType = Auth::user()->user_type;

        $users = User::when($userType == 2, function ($query) {
            return $query->where('user_type', 2)->get();
        })->when($userType == 1, function ($query) {
            return $query->where('user_type', '>=', 1)->get();
        })->when($userType == 0, function ($query) {
            return $query->get();
        });

        return view('auth.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = new User();
        $themes = UserTheme::all();

        return view('auth.create', compact('user', 'themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $data = $this->validateRequest($this->rules(), ['email'], User::class);

        if(File::isFile($request->image)) {
            $data['image'] = $this->uploadImage($request->file('image'), $this->folder, 225, 225);
        }

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $themes = UserTheme::all();
        return view('auth.edit', compact('user', 'themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $this->validateRequest($this->rules(), ['email'], User::class, $user);

        if(File::isFile($request->image)) {
            $this->deleteImage($user->id, $this->folder, User::class);
            $data['image'] = $this->uploadImage($request->file('image'), $this->folder, 225, 225);
        }

        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->deleteImage($user->id, $this->folder, User::class);
        $user = User::findOrFail($user->id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    protected function rules(): array
    {
        return [
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255'],
            'contact_number'    => ['required', 'string', 'max:15'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'image'             => 'nullable|mimes:jpeg,jpg,png,gif',
            'user_type'         => ['required'],
            'theme_id'          => ['nullable'],
        ];
    }

}
