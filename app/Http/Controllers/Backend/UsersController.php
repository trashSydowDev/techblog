<?php
namespace App\Http\Controllers\Backend;

use App;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Blog\User\Repository;

class UsersController extends Controller
{
    public function __construct(Repository $repo)
    {
        parent::__construct();
        $this->userRepository = $repo;
    }

    public function index()
    {
        $user = Input::get('page', 0);

        $users = $this->userRepository->all($user);

        return $this->render('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = App::make('Blog\User\User');

        return $this->render('backend.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $user  = $this->userRepository->createNew($input);

        if (count($user->errors()) == 0) {
            return $this->goToAction(
                'Backend\UsersController@edit',
                ['id' => $user->id ]
           );
        } else {
            return $this->goToAction('Backend\UsersController@create')
                ->withInput($input)
                ->withErrors($user->errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findOrFail($id);

        return $this->render('backend.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findOrFail($id);

        return $this->render('backend.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $user  = $this->userRepository->update($id, $input);

        if (! $user->errors()) {
            return $this->goToAction('Backend\UsersController@edit', ['id' => $user->id ])
                ->withInput($input);
        } else {
            return $this->goToAction('Backend\UsersController@edit', ['id' => $user->id ])
                ->withInput($input)
                ->withErrors($user->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deleted = $this->userRepository->delete($id);

        return $this->goToAction('Backend\UsersController@index');
    }
}
