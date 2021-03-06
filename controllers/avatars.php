<?php

require "AuthenticatedController.php";

/**
 *    get usefull avatars
 *    @author Marcus Lunzenauer - mlunzena@uos.de
 *    @author André Klaßen - aklassen@uos.de
 */
class AvatarsController extends AuthenticatedController
{
    function show_action($id = NULL, $size = Avatar::SMALL)
    {
        $this->redirect(Avatar::getAvatar($id)->getURL($size));
    }
}
