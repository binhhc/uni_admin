<?php

App::uses('Controller', 'Controller');

class UnitPricesController extends AppController {

    public $uses = array('UnitPrice');

    public function beforeFilter() {
        $this->Auth->allow(array('index', 'add', 'edit', 'delete'));
    }

    public function index() {
        $this->Session->delete('unitPrice_id');
        $this->Session->write('flag_link_price', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('UnitPrice.employee_id' => 'ASC')
        );
        $this->set('unitPrice', $this->paginate('UnitPrice'));
    }

    public function add() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['UnitPrice']['created'] = date('Y-m-d');
            if ($this->UnitPrice->customValidate()) {
                $this->UnitPrice->create();
                if ($this->UnitPrice->save($data)) {
                    $this->Session->setFlash(__('Save successful!'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Save error!'));
                }
            } else {
                $this->Session->setFlash(__('Validate error!'));
            }
        }
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
            if ($this->UnitPrice->customValidate()) {
                if ($this->UnitPrice->save($data)) {
                    $this->Session->setFlash(__('Save successful!'));
                    $this->redirect($this->Session->read('save_latest_link_price'));
                }
                else
                    $this->Session->setFlash(__('Save error!'));
            }else {
                $this->Session->setFlash(__('Validate error!'));
            }
        } else {
            $quanlitify = $this->UnitPrice->findById($id);
            $this->request->data = $quanlitify;
        }
        $this->Session->write('flag_link_price', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->render('add');
    }

    public function delete($id = null) {
        if ($this->Session->read('flag_link_price') == 0) {
            $this->Session->write('save_latest_link_price', $_SERVER['HTTP_REFERER']);
        }
        $this->UnitPrice->id = $id;
        if (!$this->UnitPrice->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (isset($id)) {
            $this->UnitPrice->deleteAll(array('UnitPrice.id' => $id));
            $this->Session->setFlash(__('Delete Suceessful!'));
            $this->redirect($this->Session->read('save_latest_link_price'));
        }
        $this->Session->write('flag_link_price', 1);
    }

}

?>
