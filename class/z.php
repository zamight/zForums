<?php

/**
 * z Class will setup the whole website. Which class to use ect.
 * Lets start with the
 */

class z
{

    /**
     * @var array $hooks
     */
    public $hooks = array();

    public function AddHook($hook, $function)
    {
        if (!isset($this->hooks[$hook])) {
            $this->hooks[$hook] = array();
        }

        $this->hooks[$hook][] = $function;
    }

    public function RunHook($hook)
    {
        if (isset($this->hooks[$hook])) {
            $getHooks = $this->hooks[$hook];
            foreach($getHooks as $callHook)
            {
                if (function_exists($callHook))
                    call_user_func($callHook);
            }
        }
    }

    public function HelloWorld()
    {
        $this->RunHook('zBeforeHelloWorld');
        print 'hello world';
        $this->RunHook('zAfterHelloWorld');
    }
}