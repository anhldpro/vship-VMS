<?php

namespace App\Http\Controllers\Account;


use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;


class AccountController extends Controller
{


    protected $redirectTo = '/';


    public function __construct()
    {
//        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function getLogin () {
        return view('auth.login');
    }

    public function postLogin(Request $request) {

        try{
            $rules = [
                'username' =>'required',
                'password' => 'required'
            ];
            $messages = [
                'username.required' => 'Email là trường bắt buộc',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $username = $request->input('username');
                $password = $request->input('password');

                if( Auth::attempt(['username' => $username, 'password' =>$password])) {
                    return redirect()->intended('/');
                } else {
                    $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                    return redirect()->back()->withInput()->with('errors', 'Email hoặc mật khẩu không đúng');
                }
            }
        }catch (Exception $ex){
            dd($ex);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'username' => 'required',
                'email' => 'required|email|unique:account,email',
                'password' => 'required|same:c_password',
                'c_password' => 'required',
                'acct_type' => 'required'
            ]);

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);

            $user = Account::create($input);

            return redirect()->route('account.index')
                ->with('success','Thêm tài khoản thành công!!!');
        } catch (Exception $e) {
            return back()->withInput()->with('errors', 'Failed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }


}
