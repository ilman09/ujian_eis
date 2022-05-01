<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;

class Home extends BaseController
{
    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();
    }

    public function index()
    {
        if (session('name') == null || session('name') == '') {
            return redirect()->to(base_url('login'));
        } else {
            $data['post'] = $this->post->get(['post.is_deleted' => 0])->orderBy('post.entry_date', 'DESC')->join('user', 'user.id_user=post.id_user')->get()->getResult();

            foreach ($data['post'] as $obj) {
                $obj->comment = $this->comment->get(['comment.is_delete' => 0, 'comment.id_post' => $obj->id_post])->join('user', 'user.id_user=comment.id_user')->get()->getResult();
                $obj->jumlah_komentar = $this->comment->get(['comment.is_delete' => 0, 'comment.id_post' => $obj->id_post])->countAllResults(false);
            }
            return view('welcome_message', $data);
        }
    }

    public function create_post()
    {
        $id_user = session("id_user");
        $status = $this->request->getVar("status");
        $entry_date = date("Y-m-d H:i:s");
        $delete_date = date("Y-m-d H:i:s");
        $update_date = date("Y-m-d H:i:s");

        $data = [
            "id_user" => $id_user,
            "status" => $status,
            "entry_date" => $entry_date,
            "delete_date" => $delete_date,
            "update_date" => $update_date,
        ];
        $save = $this->post->table()->insert($data);
        if ($save) {
            return redirect()->to(base_url());
        } else {
            echo "Gagal Insert";
        }
    }

    public function hide_post($id)
    {

        $save = $this->post->table()->update(['is_deleted' => 1], ['id_post' => $id]);
        if ($save) {
            return redirect()->to(base_url());
        } else {
            echo "Gagal Update";
        }
    }

    public function create_comment()
    {
        $id_post = $this->request->getVar("id_post");
        $id_user = session("id_user");
        $comment = $this->request->getVar("comment");
        $is_delete = 0;
        $entry_date = date("Y-m-d H:i:s");
        $delete_date = date("Y-m-d H:i:s");
        $update_date = date("Y-m-d H:i:s");

        $data = [
            "id_post" => $id_post,
            "id_user" => $id_user,
            "comment" => $comment,
            "is_delete" => $is_delete,
            "entry_date" => $entry_date,
            "delete_date" => $delete_date,
            "update_date" => $update_date,
        ];
        $save = $this->comment->table()->insert($data);
        if ($save) {
            return redirect()->to(base_url());
        } else {
            echo "Gagal Insert";
        }
    }

    public function delete_comment($id)
    {

        $save = $this->comment->table()->update(['is_delete' => 1], ['id_comment' => $id]);
        if ($save) {
            return redirect()->to(base_url());
        } else {
            echo "Gagal Update";
        }
    }
}
