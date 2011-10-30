<?php

class UserController extends Zend_Controller_Action
{
    public function listAction()
    {
        $page = $this->_getParam('page', 1);

        $userModel = new User();
        $users = $userModel->fetchAll();

        $paginator = Zend_Paginator::factory($users);
        $paginator->setCurrentPageNumber($page)
                  ->setItemCountPerPage(10);

        Zend_Paginator::setDefaultScrollingStyle('Sliding');
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');

        $this->view->assign('paginator', $paginator);
    }

}

