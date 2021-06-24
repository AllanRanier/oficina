<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use Twig\Node\Expression\FunctionExpression;

class Auth extends BaseController
{
    
	protected $session;
	protected $UsuarioModel;
    public function __construct(){
        $this->session =  \Config\Services::session();
		$this->UsuarioModel = new UsuarioModel();
    }

    /**
    * View de login
    * @return void
    */
	public function index()
	{
		return $this->twig->render("auth/index.html.twig");
	}

    /**
     * Verificando o login
     *
     * @return void
     */

	public function logar()
    {
        $data = $this->request->getPost();

        $user = $this->UsuarioModel->where('email', $data['email'])
            ->first();    

        if (!$user || !password_verify($data['senha'], $user->senha)) {
            $this->session->setFlashdata('warning_notice', 'E-mail e Senha Incorretos!');
            return  redirect()->to('/');
            // echo "<script>alert('E-mail e Senha Incorretos!');</script>";
            // return $this->twig->render('auth/login.html.twig');
        } else {
            $this->session->set([
                'email' => $this->request->getPost('email'),
                'nome' => $user->nome,
                'id' => $user->id
            ]);
            return redirect()->to('/dashboard');
        }
    }

    /**
     * Destroi a seção e desloga o usuario
     *
     * @return void
     */
    public function logout(){
        
        session()->destroy();
        return redirect()->to('/');
    }
}
