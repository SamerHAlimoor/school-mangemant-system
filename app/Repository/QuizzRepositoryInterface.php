<?php

namespace App\Repository;

interface QuizzRepositoryInterface{

    public function index();
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
}
