<?php

/**
 * Created by PhpStorm.
 * User: WILLY
 * Date: 31/08/2015
 * Time: 15:17
 */

namespace Entity\Mapper;
use \Spot\Mapper;

class Test extends Mapper
{
    /**
     * Get 10 most recent posts for display on the sidebar
     *
     * @return \Spot\Query
     */
    public function mostRecentPostsForSidebar()
    {
        return $this->where(['status' => 'active'])
            ->order(['date_created' => 'DESC'])
            ->limit(10);
    }

    public function getUserName(){
        return $this->where(['id' => 1]);
    }
}