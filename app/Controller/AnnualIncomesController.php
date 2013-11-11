<?php

App::uses('Controller', 'Controller');

class AnnualIncomesController extends AppController {

    public $uses = array('AnnualIncome');

    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('annual_id');
        $this->Session->write('flag_link_annual', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('AnnualIncome.employee_id' => 'ASC')
        );
        $this->set('annualIncome', $this->paginate('AnnualIncome'));
        $this->set('title_for_layout', 'Annual Income');
    }

    public function add() {
        if ($this->Session->read('flag_link_annual') == 0) {
            $this->Session->write('save_latest_link_annual', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['AnnualIncome']['created'] = date('Y-m-d');
            if ($this->AnnualIncome->customValidate()) {
                $this->AnnualIncome->create();
                if ($this->AnnualIncome->save($data)) {
                    $this->Session->setFlash(__('Save successful!'));
                    $this->redirect($this->Session->read('save_latest_link_annual'));
                } else {
                    $this->Session->setFlash(__('Save error!'));
                }
            } else {
                $this->Session->setFlash(__('Validate error!'));
            }
        }
        $this->Session->write('flag_link_annual', 1);
    }

    public function edit() {
        if ($this->Session->read('flag_link_annual') == 0) {
            $this->Session->write('save_latest_link_annual', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('annual_id', $this->request->data['id']);
        }
        $id = $this->Session->read('annual_id');
        if (!$this->AnnualIncome->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['AnnualIncome']['modified'] = date('Y-m-d');
            if ($this->AnnualIncome->customValidate()) {
                if ($this->AnnualIncome->save($data)) {
                    $this->Session->setFlash(__('Save successful!'));
                    $this->redirect($this->Session->read('save_latest_link_annual'));
                } else {
                    $this->Session->setFlash(__('Save error!'));
                }
            } else {
                $this->Session->setFlash(__('Validate error!'));
            }
        } else {
            $schoolEdu = $this->AnnualIncome->findById($id);
            $this->request->data = $schoolEdu;
        }
        $this->Session->write('flag_link_annual', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->render('add');
    }

    public function delete($id = null) {
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_annual', $_SERVER['HTTP_REFERER']);
        }
        $this->AnnualIncome->id = $id;
        if (!$this->AnnualIncome->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (isset($id)) {
            $this->AnnualIncome->deleteAll(array('AnnualIncome.id' => $id));
            $this->Session->setFlash(__('Delete successful!'));
            $this->redirect($this->Session->read('save_latest_link_annual'));
        }
        $this->Session->write('flag_link_annual', 1);
    }

}

?>
