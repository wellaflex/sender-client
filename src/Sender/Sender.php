<?php

namespace Sender;

use Sender\Exception;
use Sender\Model;

class Sender
{
    /**
     * @var array
     */
    protected static $_config = null;

    /**
     * @var string
     */
    protected static $_token = null;

    /**
     * @var Model\AbstractModel[]
     */
    protected $_messages = [];

    /**
     * @return array
     */
    public static function getConfig()
    {
        return self::$_config;
    }

    /**
     * @param array $config
     */
    public static function setConfig(array $config)
    {
        self::$_config = $config;
    }

    /**
     * @return string
     */
    public static function getToken()
    {
        return self::$_token;
    }

    /**
     * @param string $token
     */
    public static function setToken($token)
    {
        self::$_token = $token;
    }

    /**
     * @throws Exception\ConfigWasNotProvided
     * @throws Exception\TokenWasNotProvided
     */
    public function __construct()
    {
        if (!self::getConfig()) {
            throw new Exception\ConfigWasNotProvided();
        }

        if (!self::getToken()) {
            throw new Exception\TokenWasNotProvided();
        }
    }

    /**
     * @param Model\AbstractModel $message
     * @return Sender
     */
    public function addMessage(Model\AbstractModel $message)
    {
        $this->_messages = (array)$this->_messages;
        $this->_messages[] = $message;

        return $this;
    }

    /**
     * @param Model\AbstractModel[] $messages
     * @return Sender
     */
    public function setMessages(array $messages = [])
    {
        $this->_messages = $messages;
        return $this;
    }

    /**
     * @return Model\AbstractModel[]
     */
    public function getMessages()
    {
        return $this->_messages;
    }

    /**
     * @throws Exception\ReceiversWasNotSpecified
     */
    public function send()
    {
        if (!count($this->getMessages())) {
            throw new Exception\ReceiversWasNotSpecified();
        }

        $client = new \Zend\Http\Client();

        $client->setUri(implode('/', [self::getConfig()['uri'], 'index/send']));
        $client->setHeaders(['x-auth' => self::getToken()]);
        $client->setMethod('POST');

        $messages = [];

        foreach ($this->getMessages() as $message) {
            $messages[] = $message->asArray();
        }

        $client->setParameterPost(['messages' => $messages]);
        return $client->send()->getBody();
    }
}