<?php

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="uid", type="integer", length=11, nullable=false)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(column="mobile", type="string", length=11, nullable=false)
     */
    public $mobile;

    /**
     *
     * @var string
     * @Column(column="partner", type="string", length=20, nullable=false)
     */
    public $partner;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=32, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(column="user_name", type="string", length=20, nullable=false)
     */
    public $user_name;

    /**
     *
     * @var string
     * @Column(column="jname", type="string", length=20, nullable=false)
     */
    public $jname;

    /**
     *
     * @var integer
     * @Column(column="web_mode", type="integer", length=3, nullable=false)
     */
    public $web_mode;

    /**
     *
     * @var integer
     * @Column(column="account_status", type="integer", length=3, nullable=false)
     */
    public $account_status;

    /**
     *
     * @var integer
     * @Column(column="score", type="integer", length=6, nullable=false)
     */
    public $score;

    /**
     *
     * @var integer
     * @Column(column="invite_user_id", type="integer", length=6, nullable=false)
     */
    public $invite_user_id;

    /**
     *
     * @var integer
     * @Column(column="is_give_invite_user_score", type="integer", length=3, nullable=false)
     */
    public $is_give_invite_user_score;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=3, nullable=false)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(column="login_time", type="string", nullable=false)
     */
    public $login_time;

    /**
     *
     * @var string
     * @Column(column="create_time", type="string", nullable=false)
     */
    public $create_time;

    /**
     *
     * @var string
     * @Column(column="update_time", type="string", nullable=false)
     */
    public $update_time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("fjl");
        $this->setSource("user");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]|User|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
