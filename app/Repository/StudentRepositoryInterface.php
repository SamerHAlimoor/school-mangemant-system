<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    // get all Teachers
   // get all Teachers
   public function getAllStudends();

   // Get specialization
   public function Getspecialization();

   // Get Gender
   public function GetGender();

   // StoreTeachers
   public function StoreStudends($request);

   // StoreTeachers
   public function editStudends($id);

   // UpdateTeachers
   public function UpdateStudends($request);

   // DeleteTeachers
   public function DeleteStudends($request);

}
