<?php

namespace App\Controller;



class UsersController extends AbstractController
{

    public function index()
    {
        $users = $this->container->getUserManager()->findAll();
        echo $this->container->getTwig()->render('users/index.html.twig', [
            'users' => $users, // On envoie la variable $users à notre template. Il la recevra nommée "users".
        ]);
    }
    public function show($id)
    {
        $user = $this->container->getUserManager()->findOneById($id);
        echo $this->container->getTwig()->render('users/show.html.twig', [
            'user' => $user
        ]);
    }

    public function new()
    {
        echo $this->container->getTwig()->render('users/new.html.twig');
    }


    public function create()
    {
        $this->container->getUserManager()->create($_POST);
        // echo $this->container->getTwig()->render('users/create.html.twig', [
        //     'create' => $create
        // ]);
        header('Location: ' . $this->config['env']['base_path'] . '/users');
    }

    public function update(int $id)
    {
        $this->container->getUserManager()->update($id, $_POST);
        $this->index();
    }

    public function edit(int $id)
    {
        $user = $this->container->getUserManager()->findOneById($id);
        echo $this->container->getTwig()->render('users/edit.html.twig', ['user' => $user]);
    }
}
