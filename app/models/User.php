<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon ;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The gender translate list
	 *
	 * @var array
	 */
	public static $gender_list = array(
		"male" => "Masculino" ,
		"fame" => "Feminino" ,
	) ;

	/**
	 * The table primary key
	 *
	 * @var string
	 */
	protected $primaryKey = 'user_id';

	public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
	}

	public function getUpdatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
	}

	public function __toString()
	{
	    return sprintf( "%s %s" , $this->first_name, $this->last_name ) ;
	}

	public function getGenderAttribute($gender) {
		if (array_key_exists($gender,static::$gender_list)) {
			return static::$gender_list{$gender} ;
		}

		return $gender ;
	}

	public function getBirthDateAttribute($value) {
		if (empty($value)) {
			return $value;
		}

		return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
	}

	public function setBirthDateAttribute($value) {
		if (empty($value)) {
			return $value;
		}

		return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
	}
}
