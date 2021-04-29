<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Groups;
use App\Models\User;
use App\Models\Users;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;

class UsersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->usersRepository->paginate(6);

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        $group = Groups::all()->pluck('name', 'id');
        return view('users.create', compact('group'));
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {

        if ($request->multiData) {
            $str = "";
            for ($i = 0; $i < strlen($request->multiData); $i++) {
                if ($request->multiData[$i] >= 'a' && $request->multiData[$i] <= 'z' || $request->multiData[$i] >= 'A' && $request->multiData[$i] <= 'Z') {
                    $str .= $request->multiData[$i];
                } else {
                    User::create([
                        'name' => $str,
                        'username' => $request->username . $str,
                        'password' => Hash::make($request->password),
                        'password_deHash' => $request->password,
                        'group_id' => $request->group_id
                    ]);
                    $str = "";
                    $i += 1;
                }
            }
            if ($str != "") {
                User::create([
                    'name' => $str,
                    'username' => $request->username . $str,
                    'password' => Hash::make($request->password),
                    'password_deHash' => $request->password,
                    'group_id' => $request->group_id
                ]);
            }
        }

        if ($request->name) {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'password_deHash' => $request->password,
                'group_id' => $request->group_id
            ]);
        }

        Flash::success('Users saved successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $users = $this->usersRepository->update($request->all(), $id);

        Flash::success('Users updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }
}
