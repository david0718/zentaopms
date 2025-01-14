<?php
/**
 * The model file of jenkins module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 禅道软件（青岛）有限公司(ZenTao Software (Qingdao) Co., Ltd. www.cnezsoft.com)
 * @license     ZPL(http://zpl.pub/page/zplv12.html) or AGPL(https://www.gnu.org/licenses/agpl-3.0.en.html)
 * @author      Chenqi <chenqi@cnezsoft.com>
 * @package     product
 * @version     $Id: $
 * @link        http://www.zentao.net
 */

class jenkinsModel extends model
{
    /**
     * Get a jenkins by id.
     *
     * @param  int    $id
     * @access public
     * @return object
     */
    public function getByID($id)
    {
         return $this->loadModel('pipeline')->getByID($id);
    }

    /**
     * Get jenkins list.
     *
     * @param  string $orderBy
     * @param  object $pager
     * @access public
     * @return array
     */
    public function getList($orderBy = 'id_desc', $pager = null)
    {
         return $this->loadModel('pipeline')->getList('jenkins', $orderBy, $pager);
    }

    /**
     * Get jenkins pairs
     *
     * @return array
     */
    public function getPairs()
    {
       return $this->loadModel('pipeline')->getPairs('jenkins');
    }

    /**
     * Get jenkins tasks.
     *
     * @param  int    $id
     * @access public
     * @return array
     */
    public function getTasks($id)
    {
        $jenkins = $this->getById($id);

        $jenkinsServer   = $jenkins->url;
        $jenkinsUser     = $jenkins->account;
        $jenkinsPassword = $jenkins->token ? $jenkins->token : $jenkins->password;

        $userPWD  = "$jenkinsUser:$jenkinsPassword";
        $response = common::http($jenkinsServer . '/api/json/items/list', '', array(CURLOPT_USERPWD => $userPWD));
        $response = json_decode($response);

        $tasks = array();
        if(isset($response->jobs))
        {
            foreach($response->jobs as $job) $tasks[basename($job->url)] = $job->name;
        }
        return $tasks;
    }

    /**
     * Create a jenkins.
     *
     * @access public
     * @return bool
     */
    public function create()
    {
       return $this->loadModel('pipeline')->create('jenkins');
    }

    /**
     * Update a jenkins.
     *
     * @param  int    $id
     * @access public
     * @return bool
     */
    public function update($id)
    {
       return $this->loadModel('pipeline')->update($id);
    }
}
