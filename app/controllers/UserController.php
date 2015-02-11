<?php

class UserController extends \BaseController {

	protected $primarykey = "user_id" ;


	public function __construct() {
		if ( ! Session::has('message') ) {
			Session::flash('msgType', 'success');
		}

    	$this->beforeFilter('csrf', array('on'=>'post'));

    	$this->beforeFilter(function(){
            if(Auth::guest())
                return Redirect::to('login');
        },['except' => ['signin','showLogin']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if( Input::has('text')) {
			$users = User::where( 'first_name' , 'LIKE' , sprintf( "%s%%" ,Input::get('text') ) )
				->orWhere( 'last_name' , 'LIKE' , sprintf( "%s%%" ,Input::get('text') ) )
				->orWhere( 'email' , 'LIKE' , sprintf( "%s%%" ,Input::get('text') ) )
				->paginate(20) ;
		}
		else {
			$users = User::paginate(20);
		}

		return View::make( "users" )->with( "users" , $users ) ;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('user-create') ;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// valida e, em caso de erro, redireciona para o registro,
		$validator = $this->create_validator() ;
		if ($validator->fails()) {
			return Redirect::to('usuarios/create')
					->withErrors($validator)
					->withInput(Input::except('password'));
		}

		$user = new User;
		$user->email= Input::get('email');
		$user->birth_date= Input::get('birth_date');
		$user->first_name= Input::get('first_name');
		$user->last_name= Input::get('last_name');
		$user->gender= Input::get('gender');
		$user->password= Input::get('password');
		$user->save();

		Session::flash('message', sprintf("Usuário '#%d - %s' criado com sucesso", $user->user_id, $user ));

		return $this->index() ;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('user-edit')
            ->with('user', User::find($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('user-edit')
            ->with('user', User::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validação
		$validator = $this->create_validator() ;

		if ($validator->fails()) {
			return Redirect::to(sprintf( 'usuarios/%d/edit' , $id ))
					->withErrors($validator)
					->withInput(Input::except('password'));
		}

		$user = User::find($id);
		$user->email = Input::get('email');
		$user->birth_date = Input::get('birth_date');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->gender = Input::get('gender');
		$user->password = Hash::make( Input::get('password') ) ;
		$user->save();

		//redirect
		Session::flash('message', sprintf("Usuário '#%d - %s' atualizado com sucesso", $id, $user ));
		Session::flash('msgType', 'info');
		return Redirect::to('usuarios');

	}

	/**
	 * post data validate
	 *
	 * @param  int  $url
	 * @return Response
	 */
	protected function create_validator()
	{
		// valida
		$rules = array(
			"first_name" => 'required|min:3' ,
			"email" => 'required|email',
			"birth_date" => 'required|date_format:d/m/Y',
		) ;

		return Validator::make(Input::all(), $rules) ;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		$message = sprintf("Usuário '%s' removido com sucesso.", $user ) ;
		if (!$user->delete()) {
			$message = sprintf("Erro na tentativa de remoção do usuário  %s. Tente novamente mais tarde." , $user ) ;
			Session::flash('msgType', 'danger');
		}

		//redirect
		Session::flash('message', $message);
		return Redirect::to('usuarios');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function signin()
	{

		$rules = [
	        'email' => 'required',
	        'password'=>'required'
        ];

        $validator = Validator::make( $this->getLoginCredentials() , $rules ) ;

        if ( ! $validator->passes() ) {
        	return Redirect::back()
        			->withErrors($validator)
        			->with('msgType', 'danger' )
        			->withInput();
        }

		if ( Auth::attempt( $this->getLoginCredentials() , Input::has('remember') ) ) {
			return Redirect::to('usuarios')->with('message', 'Logado!');
		}

		return Redirect::to('login')
			->with('message', 'E-mail ou senha inválidos.' )
			->with('msgType', 'danger' )
			->withInput();
	}

	 protected function getLoginCredentials()
  {
		return array(
			"email" => Input::get("email"),
			"password" => Input::get("password")
		) ;
  }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function showLogin()
	{
		return View::make('login') ;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function logout()
	{
		Auth::logout() ;
		return Redirect::to('login')->with( 'message' , "Logout efetuado com sucesso" ) ;
	}
}
