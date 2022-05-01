<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{


    protected $DBGroup = "default";
    protected $table = "comment";
    protected $primaryKey = "id_comment";
    protected $useAutoIncrement = true;
    protected $insertID = 1;
    protected $returnType = "object";
    protected $useSoftDeletes = false;
    protected $protectFields = false;
    protected $allowedFields = ["*"];
    protected $idcomment;
    protected $idpost;
    protected $iduser;
    protected $comment;
    protected $isdelete;
    protected $entrydate;
    protected $deletedate;
    protected $updatedate;
    public function table()
    {
        return $this->db->table($this->table);
    }

    public function getall()
    {
        return $this->db->table($this->table)->get()->getResult();
    }

    public function getbyorder($column, $opsi)
    {
        return $this->db->table($this->table)->orderBy($column, $opsi)->get()->getResult();
    }

    public function getrow($data)
    {
        return $this->db->table($this->table)->where($data)->get(1)->getRowArray();
    }

    public function getrowlast($data)
    {
        return $this->db->table($this->table)->where($data)->orderBy("id_comment", "DESC")->get(1)->getRowArray();
    }

    public function put($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function putAll($data)
    {
        return $this->db->table($this->table)->insertBatch($data);
    }

    public function patch($data, $id)
    {
        return $this->db->table($this->table)->update($data, ["id_comment" => $id]);
    }

    public function patchAll($data, $condition)
    {
        return $this->db->table($this->table)->update($data, $condition);
    }

    public function remove($id)
    {
        return $this->db->table($this->table)->delete(["id_comment" => $id]);
    }

    public function removeAll($id)
    {
        return $this->db->table($this->table)->delete($id);
    }

    public function get($data)
    {
        return $this->db->table($this->table)->where($data);
    }

    public function getdata($data)
    {
        return $this->db->table($this->table)->where($data)->get()->getResult();
    }

    public function getdatabyorder($data, $column, $asc)
    {
        return $this->db->table($this->table)->where($data)->orderBy($column, $asc)->get()->getResult();
    }

    public function getjoin($table, $cond, $data)
    {
        return $this->db->table($this->table)->join($table, $cond)->where($data);
    }

    public function getjoin2($table, $cond, $table2, $cond2, $data)
    {
        return $this->db->table($this->table)->join($table, $cond)->join($table2, $cond2)->where($data);
    }

    function up()
    {
        return $this->db->query("CREATE TABLE `comment` (`id_comment` int(11) NOT NULL auto_increment,`id_post` int(11) NOT NULL ,`id_user` int(11) NOT NULL ,`comment` text NOT NULL ,`is_delete` int(11) NOT NULL ,`entry_date` datetime NULL ,`delete_date` datetime NULL ,`update_date` datetime NULL ,    PRIMARY KEY (`id_comment`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1");
    }


    public static function Paging_All($array, $per_page)
    {
        $dataarray = array_chunk($array,  $per_page);
        $data = [
            'per_page' => $per_page,
            'total_data' => count($array),
            'total_page' => ceil(count($array) / $per_page),
            'data' => $dataarray,
        ];
        return $data;
    }

    public static function Paging($array, $start, $per_page)
    {
        $dataarray = array_slice($array, $start, $per_page);
        $data = [
            'per_page' => $per_page,
            'total_data' => count($array),
            'total_page' => ceil(count($array) / $per_page),
            'data' => $dataarray,
        ];
        return $data;
    }
}
