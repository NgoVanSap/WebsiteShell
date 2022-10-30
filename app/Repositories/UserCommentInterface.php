<?php
namespace App\Repositories;

interface UserCommentInterface
{

    public function getUserComments();

    public function getUserCommentDetails($idUser);

}
