<?php
namespace App\Repositories;

interface BaseRepository{
    public function all();
    public function create($data);
    public function find($id);
    public function update($data,$id);
    public function delete($id);
    public function uploadFile($file,$path);
}