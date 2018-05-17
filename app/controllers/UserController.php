<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for user
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'User', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "uid";

        $user = User::find($parameters);
        if (count($user) == 0) {
            $this->flash->notice("The search did not find any user");

            $this->dispatcher->forward([
                "controller" => "user",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $user,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a user
     *
     * @param string $uid
     */
    public function editAction($uid)
    {
        if (!$this->request->isPost()) {

            $user = User::findFirstByuid($uid);
            if (!$user) {
                $this->flash->error("user was not found");

                $this->dispatcher->forward([
                    'controller' => "user",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->uid = $user->uid;

            $this->tag->setDefault("uid", $user->uid);
            $this->tag->setDefault("mobile", $user->mobile);
            $this->tag->setDefault("partner", $user->partner);
            $this->tag->setDefault("password", $user->password);
            $this->tag->setDefault("user_name", $user->user_name);
            $this->tag->setDefault("jname", $user->jname);
            $this->tag->setDefault("web_mode", $user->web_mode);
            $this->tag->setDefault("account_status", $user->account_status);
            $this->tag->setDefault("score", $user->score);
            $this->tag->setDefault("invite_user_id", $user->invite_user_id);
            $this->tag->setDefault("is_give_invite_user_score", $user->is_give_invite_user_score);
            $this->tag->setDefault("status", $user->status);
            $this->tag->setDefault("login_time", $user->login_time);
            $this->tag->setDefault("create_time", $user->create_time);
            $this->tag->setDefault("update_time", $user->update_time);
            
        }
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        $user = new User();
        $user->mobile = $this->request->getPost("mobile");
        $user->partner = $this->request->getPost("partner");
        $user->password = $this->request->getPost("password");
        $user->userName = $this->request->getPost("user_name");
        $user->jname = $this->request->getPost("jname");
        $user->webMode = $this->request->getPost("web_mode");
        $user->accountStatus = $this->request->getPost("account_status");
        $user->score = $this->request->getPost("score");
        $user->inviteUserId = $this->request->getPost("invite_user_id");
        $user->isGiveInviteUserScore = $this->request->getPost("is_give_invite_user_score");
        $user->status = $this->request->getPost("status");
        $user->loginTime = $this->request->getPost("login_time");
        $user->createTime = $this->request->getPost("create_time");
        $user->updateTime = $this->request->getPost("update_time");
        

        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("user was created successfully");

        $this->dispatcher->forward([
            'controller' => "user",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        $uid = $this->request->getPost("uid");
        $user = User::findFirstByuid($uid);

        if (!$user) {
            $this->flash->error("user does not exist " . $uid);

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        $user->mobile = $this->request->getPost("mobile");
        $user->partner = $this->request->getPost("partner");
        $user->password = $this->request->getPost("password");
        $user->userName = $this->request->getPost("user_name");
        $user->jname = $this->request->getPost("jname");
        $user->webMode = $this->request->getPost("web_mode");
        $user->accountStatus = $this->request->getPost("account_status");
        $user->score = $this->request->getPost("score");
        $user->inviteUserId = $this->request->getPost("invite_user_id");
        $user->isGiveInviteUserScore = $this->request->getPost("is_give_invite_user_score");
        $user->status = $this->request->getPost("status");
        $user->loginTime = $this->request->getPost("login_time");
        $user->createTime = $this->request->getPost("create_time");
        $user->updateTime = $this->request->getPost("update_time");
        

        if (!$user->save()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'edit',
                'params' => [$user->uid]
            ]);

            return;
        }

        $this->flash->success("user was updated successfully");

        $this->dispatcher->forward([
            'controller' => "user",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a user
     *
     * @param string $uid
     */
    public function deleteAction($uid)
    {
        $user = User::findFirstByuid($uid);
        if (!$user) {
            $this->flash->error("user was not found");

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'index'
            ]);

            return;
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "user",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("user was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "user",
            'action' => "index"
        ]);
    }

}
