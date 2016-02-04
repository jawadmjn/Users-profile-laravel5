<?php namespace App;

use Validator;

class Membersvalidator
{
    /**
     * Get a validator for an incoming registration request.
     */
    public static function validator($data)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'name' => 'required|max:30', // name can not to be greater than 30 characters
            'email'    => 'required|email|max:50|unique:users', // make sure the email is an actual email
            'phone' => 'required|max:30', // phone can not to be greater than 30 characters
            'dob' => 'required',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($data, $rules);

        return $validator;
    }
}