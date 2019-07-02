<?php

class gsUserDashmix extends sfGuardSecurityUser{

    public function setNotification($message,$type){
        $this->setAttribute('notification_message', $message);
        $this->setAttribute('notification_type', $type);
        $this->setAttribute('notification_hasMessage', true);
    }
    
    public function clearNotification(){
        $this->setAttribute('notification_hasMessage', false);
    }

    public function getNotificationMessage(){
        return $this->getAttribute('notification_message');
    }
    public function getNotificationType(){
        return $this->getAttribute('notification_type');
    }

    public function hasNotification(){
        return $this->getAttribute('notification_hasMessage');
    }
  
}
