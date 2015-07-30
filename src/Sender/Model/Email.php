<?php

namespace Sender\Model;

class Email extends AbstractModel
{
    /**
     * @var string
     */
    protected $_type = 'email';

    /**
     * @var []
     */
    protected $_receivers = [];

    /**
     * @var string
     */
    protected $_subject = null;

    /**
     * @var string
     */
    protected $_content = null;

    /**
     * @var int
     */
    protected $_time = null;

    /**
     * @return mixed
     */
    public function getReceivers()
    {
        return $this->_receivers;
    }

    /**
     * @param mixed $receivers
     */
    public function setReceivers(array $receivers = [])
    {
        $this->_receivers = $receivers;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->_subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->_subject = $subject;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @param string $message
     */
    public function setContent($message)
    {
        $this->_content = $message;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * @param int $time
     */
    public function setTime($time)
    {
        $this->_time = $time;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }
}