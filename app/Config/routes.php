<?php
Router::connect("/:controller/:id",array("controller"=>"books","action" => "buscaBook", "[method]" => "GET"),array("id" => "[0-9+]"));
Router::connect("/:controller/:title",array("controller"=>"books","action" => "buscaBook", "[method]" => "GET"));
Router::connect("/:controller/:title/:author",array("controller"=>"books","action" => "buscaBook", "[method]" => "GET"));
Router::connect( "/:controller",array("controller"=>"books","action" => "listarBooks", "[method]" => "GET"),array("id" => false));






