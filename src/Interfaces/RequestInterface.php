<?php

namespace Application\Interfaces;

interface RequestInterface {

    function get_params ();

    function get_param ($element);


}