<?php


namespace App\Models\Form;


class UserForm
{
    /**
     * @var string|null
     */
    public $email;
    /**
     * @var string|null
     */
    public $fio;
    /**
     * @var string|null
     */
    public $password;
    /**
     * @var string|null
     */
    public $password_copy;

    /**
     * UserForm constructor.
     */
    public function __construct()
    {
        $this->email = array_key_exists('email', $_POST) ? $this->getTrimValue($_POST['email']) : NULL;
        $this->fio = array_key_exists('fio', $_POST) ? $this->getTrimValue($_POST['fio']) : NULL;
        $this->password = array_key_exists('password', $_POST) ? $this->getTrimValue($_POST['password']) : NULL;
        $this->password_copy = array_key_exists('password_copy', $_POST)
            ? $this->getTrimValue($_POST['password_copy']) : NULL;
    }

    /**
     * @param string $value
     * @return string
     */
    private function getTrimValue(string $value): string
    {
        $result = trim($value);
        return $result;
    }
}
