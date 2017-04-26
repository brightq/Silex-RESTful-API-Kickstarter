<?php

namespace Demo\Controller;

use Demo\Repository\PostRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

function postIndexJson(PostRepository $repo) {
    return function() use ($repo) {
        return new JsonResponse($repo->findAll());
    };
}

?>

