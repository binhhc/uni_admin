<?php

App::uses('Controller', 'Controller');

class UnitPricesController extends AppController {

    public $uses = array('UnitPrice', 'UserInfo');

    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('unitPrice_id');
        $this->Session->write('flag_link_price', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('UnitPrice.employee_id' => 'ASC')
        );
        $this->set('unitPrice', $this->paginate('UnitPrice'));
        $this->set(array(
            'title_for_layout' => '給与計算',
            'page_title' => '給与計算',
        ));
    }

    public function add() {
        if ($this->Session->read('flag_link_price') == 0) {
            $this->Session->write('save_latest_link_price', $_SERVER['HTTP_REFERER']);
        }
        if ($this->Session->read('flag_link_price') == 0) {
            $this->Session->write('save_latest_link_price', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['UnitPrice']['created'] = date('Y-m-d');
            if ($this->UnitPrice->customValidate()) {
                $this->UnitPrice->create();
                if ($this->UnitPrice->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_price'));
                }
            }
        }
        $this->Session->write('flag_link_price', 1);
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '給与計算',
            'page_title' => '給与計算',
        ));
        $this->set('readonly', '');
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_price') == 0) {
            $this->Session->write('save_latest_link_price', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('unitPrice_id', $this->request->data['id']);
        }
        $id = $this->Session->read('unitPrice_id');
        if (!$this->UnitPrice->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['UnitPrice']['modified'] = date('Y-m-d');
            unset($data['UnitPrice']['employee_id']);
            if ($this->UnitPrice->customValidate()) {
                if ($this->UnitPrice->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_price'));
                }
            }
        } else {
            $quanlitify = $this->UnitPrice->findById($id);
            $this->request->data = $quanlitify;
        }
        $this->Session->write('flag_link_price', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '給与計算',
            'page_title' => '給与計算',
        ));
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_price') == 0) {
            $this->Session->write('save_latest_link_price', $_SERVER['HTTP_REFERER']);
        }

        if (!empty($id)) {
            if (!$this->UnitPrice->deleteAll(array('UnitPrice.id' => $id))) {
                $this->Session->setFlash(__('UAD_ERR_MSG0001'), 'error');
            } else {
                $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
            }
        } 
        $this->Session->write('flag_link_price', 1);
    }
}
?>
