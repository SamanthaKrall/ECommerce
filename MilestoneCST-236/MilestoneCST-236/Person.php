<?php
class Person {
    private $id;
    private $first_name;
    private $last_name;
    private $user_name;
    private $role;
    
    function __construct($id, $first_name, $last_name, $user_name, $role){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->user_name = $user_name;
        $this->role = $role;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getUser_name()
    {
        return $this->user_name;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUser_name($username)
    {
        $this->user_name = $user_name;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    
}