<?php


namespace App\Models\Form;

use Fuel\Validation\Validator;

class ValidateUserForm
{
    /**
     * @var Validator
     */
    private $validator;
    private $result;

    /**
     * ValidateUserForm constructor.
     * @param UserForm $form
     */
    public function __construct(UserForm $form)
    {
        $this->validator = new Validator();
        $this->validator->addField('email', 'Email')
            ->required()
            ->email()
            ->setMessage('Field "{label}" is required, please enter a value');
        $this->validator->addField('fio', 'Fio')
            ->required()
            ->setMessage('Field "{label}" is required, please enter a value');
        $this->validator->addField('password', 'password')
            ->required()->setMessage('Field "{label}" is required, please enter a value')
            ->minLength(6)->setMessage('Field {label} does not satisfy the minimum length requirement.')
            ->matchField('password_copy')
            ->setMessage('Field {label} does not match the other given field.');
        $this->validator->addField('password_copy', 'repeat password')
            ->required()->setMessage('Field "{label}" is required, please enter a value')
            ->minLength(6)->setMessage('Field {label} does not satisfy the minimum length requirement.')
            ->matchField('password');
        $arrForm = get_object_vars($form);
        $this->result = $this->validator->run($arrForm);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->result->isValid();
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->result->getErrors();
    }
}
