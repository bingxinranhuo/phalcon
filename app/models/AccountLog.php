<?php

class AccountLog extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="account_id", type="integer", length=11, nullable=false)
     */
    public $account_id;

    /**
     *
     * @var string
     * @Column(column="ret_msg", type="string", length=300, nullable=false)
     */
    public $ret_msg;

    /**
     *
     * @var string
     * @Column(column="req_msg", type="string", length=300, nullable=false)
     */
    public $req_msg;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=4, nullable=false)
     */
    public $type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("fjl");
        $this->setSource("account_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'account_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccountLog[]|AccountLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccountLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
