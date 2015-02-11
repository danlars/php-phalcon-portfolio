<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 1/28/15
 * Time: 12:20 PM
 */

namespace Portfolio\Security;

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

class Security extends Plugin
{

    /**
     * Returns an existing or new access control list
     *
     * @returns AclList
     */
    public function getAcl()
    {

        //throw new \Exception("something");

        if (!isset($this->persistent->acl)) {

            $acl = new AclList();

            $acl->setDefaultAction(Acl::DENY);

            //Register roles
            $roles = array(
                'users'  => new Role('Users'),
                'guests' => new Role('Guests')
            );
            foreach ($roles as $role) {
                $acl->addRole($role);
            }

            //Private area resources
            $privateResources = array(
                'frontpanel'    => array('index'),
                'about'         => array('index'),
                'tasks'         => array('index', 'article'),
                'contact'       => array('index', 'send')
            );

            foreach ($privateResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }

            //Public area resources
            $publicResources = array(
                'errors'        => array('p404', 'p500'),
                'login'         => array('index', 'end')
            );

            foreach ($publicResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }

            //Grant access to public areas to both users and guests
            foreach ($roles as $role) {
                foreach ($publicResources as $resource => $actions) {
                    $acl->allow($role->getName(), $resource, '*');
                }
            }

            //Grant acess to private area to role Users
            foreach ($privateResources as $resource => $actions) {
                foreach ($actions as $action){
                    $acl->allow('Users', $resource, $action);
                }
            }

            //The acl is stored in session, APC would be useful here too
            $this->persistent->acl = $acl;
        }

        return $this->persistent->acl;
    }

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get('auth');
        if (!$auth){
            $role = 'Guests';
        } else {
            $role = 'Users';
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            $dispatcher->forward(array(
                'controller' => 'errors',
                'action'     => 'p401'
            ));
            return false;
        }
    }


}