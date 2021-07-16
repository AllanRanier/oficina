<?php

namespace App\Controllers;

use App\Models\TipoUsuarioModel;
use App\Models\UsuarioModel;

class UsuariosController extends BaseController
{
    protected $tipoUsuarioModel;
    protected $base_url = '/usuario';
    protected $UsuarioModel;

    public function __construct(){
        $this->tipoUsuarioModel = new TipoUsuarioModel;
        $this->UsuarioModel = new UsuarioModel;
    }
    /**
     * Carrega a lista de usuarios
     *
     * @return void
     */
	public function index()   
	{

        $tipoDoUsuario = $this->UsuarioModel->getUsuario();

		return $this->twig->render("usuarios/index.html.twig",[
			'title' => 'Usuários',
			'usuarios' => $tipoDoUsuario,
			'baseRoute' => $this->base_url,
		]);
	}
    /**
     * Chama a view para cadastro de um novo usuario do sistema
     *
     * @return void
     */
	public function create()
    {   
      

        $tipo_usuarios = $this->tipoUsuarioModel->findall();
        $base_url = '/usuario';   

        return $this->twig->render('usuarios/form.html.twig', [
            'title' => 'Adicionar novo Usuario',
            'tipo_usuario' => $tipo_usuarios,
            'baseRoute' => $base_url
        ]);
    }

    /**
     * Carrega o formulario para alterar o usuario
     *
     * @param string $id
     * @return void
     */
    public function update(string $id){
        $usuario = $this->UsuarioModel->find($id);
        $tipo_usuarios = $this->tipoUsuarioModel->find();
        $base_url = '/usuario'; 
        
        if(!$usuario){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario não existe');
        }

        return $this->twig->render('usuarios/form.html.twig', [
            'baseRoute' => $base_url,
            'title' => 'Editar Usuario',
            'usuario' => $usuario,
            'tipo_usuario' => $tipo_usuarios
        ]);
    }
    /**
     * Exclusão de um registro
     *
     * @param int $id
     * @return void
     */
    public function delete($id){
            
        $record = $this->UsuarioModel->find($id);
        // dd($record);
        if (!$record)
        return $this->response->setStatusCode(404, 'Usuario não existe!');
        
        $this->UsuarioModel->delete($id);
        
        return redirect()->to('/usuario');
    }
    /**
     * salva um novo usuario
     *
     * @return void
     */
    public function save(){
        if ($this->request->getMethod() === 'post') {
    
            $form = $this->request->getPost();

            $data = [
                'nome' => trim($this->request->getPost('nome')),
                'email' => trim($this->request->getPost('email')),
                'tipo_usuario_id' => trim($this->request->getPost('tipo_usuario')),
            ];
            // dd($data);

            if($this->request->getPost('senha')){
                $senha = password_hash(trim($this->request->getPost('senha')), PASSWORD_DEFAULT);
                $data['senha'] = $senha;
            }

            if (\key_exists('id', $this->request->getPost()))
                $data['id'] = $this->request->getPost('id');

            

            $this->UsuarioModel->save($data);

            if (\key_exists('id', $this->request->getPost()))
                $this->session->setFlashdata('success_notice', 'Usuario atualizado com sucesso!');
            else
                $this->session->setFlashdata('success_notice', 'Usuario cadastrado com sucesso!');

            return redirect()->to('/usuario');
        }
    }
}
