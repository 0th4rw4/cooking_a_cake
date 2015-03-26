<?php
class MtClientBehavior extends ModelBehavior {

	public function beforeSave(Model $Model, $options = array() ){
		if( defined('MT_CLIENT_ID') ){
            $Model->data[$Model->alias]['mt_client_id'] = MT_CLIENT_ID;
            return true;
        }
        return false;
	}

	public function beforeFind(Model $Model, $query = array() ){
        if( defined('MT_CLIENT_ID') ){
            $query['conditions'][$Model->alias.'.mt_client_id'] = MT_CLIENT_ID;
        }
        return $query;
    }
} 