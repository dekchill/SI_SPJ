<?php

namespace Config;

interface Query
{
    public function table($table);
    public function select($select);
    public function join($join, $joinOn, $typeJoin);
    public function where($where);
    public function orderBy($order, $type);
    public function get();
    public function result();
    public function resultArray();
    public function row();
    public function rowArray();
};
