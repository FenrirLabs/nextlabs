<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        private $repository;

        public function __construct(User $user)
        {
            $this->repository =$user;
        }

        public function index()
        {
            $user =$this->repository->paginate(10);

            return view('admin.pages.user.index', [
                'user' => $user,
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->repository->create($request->all());

            return redirect()->route('user.index');
        }

        public function update(Request $request)
        {
            User::updateOrCreate(
                ['id' => $request->post('user_id')],
                [
                    'name'  =>  $request->post('name'),
                    'email' => $request->post('email'),
                ]
            );

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
            $user = $this->repository->where('id', $id)->first();
            if (!$user)
                return redirect()->back();

            return view('admin.pages.user.show', [
                'user' => $user
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.pages.user.create');
        }

        public function destroy($id)
        {
            $user = $this->repository->where('id', $id)->first();
            if (!$user)
                return redirect()->back();

            $user->delete();

            return redirect()->route('user.index');

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $user = $this->repository->where('id', $id)->first();

            if (!$user)
                return redirect()->back();

            return view('admin.pages.user.edit', [
                'user' => $user
            ]);
        }
    }
