<?php

class Post extends Eloquent {

	/**
	 * Assignable fields.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'user_id', 'slug', 'body'];
}
