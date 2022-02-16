<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

/**
     * Handle an incoming admin authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('startupUser')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = auth()->user();
            $token = $user->createToken();

            return redirect()->intended(url('/admin/dashboard'))->with([
                'bearerToken' => 'Bearer ' . $token,
            ]);
        } else {
            return redirect()->back()->withError('Credentials doesn\'t match.');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('startupUser')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // /**
    //  * Display a listing of the resource.
    //  * @return Renderable
    //  */
    // public function index()
    // {
    //     return view('incubator::index');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  * @return Renderable
    //  */
    // public function create()
    // {
    //     return view('incubator::create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  * @param Request $request
    //  * @return Renderable
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Show the specified resource.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function show($id)
    // {
    //     return view('incubator::show');
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function edit($id)
    // {
    //     return view('incubator::edit');
    // }

    // /**
    //  * Update the specified resource in storage.
    //  * @param Request $request
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
