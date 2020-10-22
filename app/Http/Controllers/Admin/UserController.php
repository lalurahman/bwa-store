<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query = User::query();
            
            return DataTables::of($query)
                    ->addColumn('action', function($item){
                        return '
                            <div class="btn-group">
                                <button 
                                    type="button" class="btn btn-primary dropdown-toggle mb-1 mr-1" data-toggle="dropdown">
                                    Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a href=" ' . route('user.edit', $item->id) .' " class="dropdown-item">
                                        Sunting
                                    </a>
                                    <form action="'.route('user.destroy', $item->id).'" method="POST">
                                        '.method_field('delete').csrf_field().'
                                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->make();
        }
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit',['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        // $this->validate($request,[
        //     'name' => 'required|max:50|string',
        //     'email' => 'string|email'
        // ]);

        $data = $request->all();

        $item = User::findOrFail($id);

        if($request->password){
            $data['password'] = bcrypt($request->password);
        } else{
            unset($data['password']);
        }

        // if ($request->email == User::where('email')) {
        //     // unset($data['email']);
        //     // $data = $request->email;
        //     unset($data,$request->email);
        // }
        // $request->email == User::get('email', $id)->findOrFail();
        // if(User::where('email') == $request->email){
        //     unset($request->email);
        // }

        
        // if($check){
        //     $this->validate($request,[
        //         'name' => 'required|max:50|string',
        //         'email' => 'required|string'
        //     ]);

        //     if($check->email == $request->email){
        //         $data['email'] = $check->email;
        //     }
        // }

        $item->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }
}
