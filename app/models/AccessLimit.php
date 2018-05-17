<?php

class AccessLimit extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="action", type="string", length=70, nullable=false)
     */
    public $action;

    /**
     *
     * @var string
     * @Column(column="times", type="string", length=255, nullable=false)
     */
    public $times;

    /**
     *
     * @var string
     * @Column(column="vip_times", type="string", length=255, nullable=false)
     */
    public $vip_times;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    public $status;

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
        $this->setSource("access_limit");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'access_limit';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccessLimit[]|AccessLimit|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccessLimit|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
