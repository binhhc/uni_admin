<?php

App::uses('Controller', 'Controller');

class SystemAuthsController extends AppController {

    public $uses = array('SystemAuth');
    public $components = array('Paginator');
    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('systemAuth');
        $this->Session->write('flag_link_systemAuth', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'SystemAuth.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('SystemAuth.id' => 'ASC')
        );
        $this->set('systemAuth', $this->Paginator->paginate('SystemAuth'));
        $this->set(array(
            'title_for_layout' => 'System Auths',
            'page_title' => 'System Auths',
        ));
    }

    public function add() {
        if ($this->Session->read('flag_link_systemAuth') == 0) {
            $this->Session->write('save_latest_link_systemAuth', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            if ($this->SystemAuth->customValidate()) {
                $this->SystemAuth->create();
                if ($this->SystemAuth->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect(array('action' => 'index'));
                }
            }
        }
        $this->Session->write('flag_link_systemAuth', 1);
        $this->set(array(
            'title_for_layout' => 'System Auths',
            'page_title' => 'System Auths',
        ));
        $this->set('readonly', '');
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_systemAuth') == 0) {
            $this->Session->write('save_latest_link_systemAuth', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('sys_id', $this->request->data['id']);
        }
        $id = $this->Session->read('sys_id');
        if (!$this->SystemAuth->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['SystemAuth']['modified'] = date('Y-m-d');
            $data['SystemAuth']['beforeSave'] = false;
            unset($data['SystemAuth']['employee_id']);

            if ($this->SystemAuth->customValidate()) {
                if ($this->SystemAuth->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_systemAuth'));
                }
            }
        } else {
            $quanlitify = $this->SystemAuth->findById($id);
            $this->request->data = $quanlitify;
        }
        $this->Session->write('flag_link_systemAuth', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set(array(
            'title_for_layout' => 'System Auths',
            'page_title' => 'System Auths',
        ));
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_systemAuth') == 0)
            $this->Session->write('save_latest_link_systemAuth', $_SERVER['HTTP_REFERER']);

        if (intval($id > 0) || !empty($id)) {
            $this->SystemAuth->id = $id;
            $data['SystemAuth']['delete_flg'] = DELETE_FLG_ON;
            $data['SystemAuth']['beforeSave'] = false;
            if ($this->SystemAuth->save($data)) {
                $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
            } else {
                $this->Session->setFlash(__('UAD_ERR_MSG0001'), 'error');
            }
        }
        $this->Session->write('flag_link_systemAuth', 1);
    }
}