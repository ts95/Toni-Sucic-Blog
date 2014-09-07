<?php

class BlogController extends BaseController {

	public function view($slug) {
		$post = Post::where('slug', $slug)->firstOrFail();
		return View::make('blog.view')->with('post', $post);
	}

	public function create() {
		if (Request::isMethod('get')) {
			return View::make('blog.auth.create');
		}

		$input = Input::all();

		$validator = Validator::make($input, [
			'title'	=> 'required|min:2|max:100',
			'body'	=> 'required|min:10',
		]);

		if ($validator->passes()) {
			$id = Auth::id();
			$title = $input['title'];
			$slug = empty($input['slug']) ? Str::slug($title) : Str::slug($input['slug']);
			$body = $input['body'];

			if (Post::where('slug', $slug)->count() != 0) {
				$slug .= '-'.substr((string)time(), 5);
			}

			$post = Post::create([
				'user_id'	=> $id,
				'title'		=> $title,
				'slug'		=> $slug,
				'body'		=> $body,
			]);

			return Redirect::action('BlogController@view', [$post->slug]);
		}

		$errors = implode('<br>', $validator->messages()->all());

		return Redirect::back()->withInput()->with('message', $errors);
	}

	public function edit($id) {
		$post = Post::find($id);

		if (Auth::id() != $post->user_id) {
			return Redirect::action('BlogController@view', [$post->slug])->with('message', "You can't edit this post.");
		}

		if (Request::isMethod('get')) {
			return View::make('blog.auth.edit')->with('post', $post);
		}

		$input = Input::all();

		$validator = Validator::make($input, [
			'title'	=> 'required|min:2|max:100',
			'body'	=> 'required|min:10',
		]);

		if ($post->slug !== $input['slug']) {
			if (Post::where('slug', $input['slug'])->count() > 0) {
				return Redirect::back()->with('message', "That slug is all ready in use.");
			}
		}

		if ($validator->passes()) {
			$post->title = $input['title'];
			$post->slug = Str::slug($input['slug']);
			$post->body = $input['body'];
			$post->save();

			return Redirect::action('BlogController@view', [$post->slug]);
		}

		$errors = implode('<br>', $validator->messages()->all());

		return Redirect::back()->with('message', $errors);
	}

	public function delete($id) {
		$post = Post::find($id);

		if (Auth::id() != $post->user_id and Auth::id() != 1) {
			return Redirect::action('BlogController@view', [$post->slug])->with('message', "You can't delete this post.");
		}

		$title = $post->title;

		$post->delete();

		return Redirect::action('BlogController@posts')->with('message', "\"$title\" has been deleted.");
	}

	public function posts() {
		$posts = Post::orderBy('created_at', 'DESC')->paginate(5);
		return View::make('blog.posts')->with('posts', $posts);
	}

}
