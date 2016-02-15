<?php namespace App\Models;

use Validator;

class Membersvalidator
{
    /**
     * Get a validator for an incoming registration request.
     */
    public static function validator($data, $id=0)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'name' => 'required|alpha|max:30', // name can not to be greater than 30 characters and only Alphabetical (Read Laravel Validation documentation for more rules)
            'email'    => 'required|email|max:50|unique:members,email,'.$id, // make sure the email is an actual email Note: this extra $id is the trick to avoid conflicts regarding updates
            'phone' => 'required|max:30', // phone can not to be greater than 30 characters
            'dob' => 'required|date',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($data, $rules);

        return $validator;
    }
}