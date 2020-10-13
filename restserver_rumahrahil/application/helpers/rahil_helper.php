<?php


function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Login');
    }
}
function is_logout()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        redirect('dashboard');
    }
}
