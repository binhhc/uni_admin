<?php

App::uses('Controller', 'Controller');

class SchoolEducationsController extends AppController {

    public $uses = array('SchoolEducation');

        public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('school_id');
        $this->Session->write('flag_link_school', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('SchoolEducation.employee_id' => 'ASC')
        );
        $this->set('schoolEdu', $this->paginate('SchoolEducation'));
    }

    public function add() {
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_school', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['SchoolEducation']['created'] = date('Y-m-d');
            if ($this->SchoolEducation->customValidate()) {
                $this->SchoolEducation->create();
                if ($this->SchoolEducation->save($data)) {
                    $this->Session->setFlash(__('Save successful!'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_school'));
                } else {
                    $this->Session->setFlash(__('Save error!'), 'error');
                }
            }
        }
        $this->Session->write('flag_link_school', 1);
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_school', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('school_id', $this->request->data['id']);
        }
        $id = $this->Session->read('school_id');
        if (!$this->SchoolEducation->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['SchoolEducation']['modified'] = date('Y-m-d');
            if ($this->SchoolEducation->customValidate()) {
                if ($this->SchoolEducation->save($data)) {
                    $this->Session->setFlash(__('Save successful!'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_school'));
                }
                else
                    $this->Session->setFlash(__('Save error!'), 'error');
            }
        } else {           
            $this->request->data = $this->SchoolEducation->findById($id);
        }
        $this->Session->write('flag_link_school', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->render('detail');
    }

    public function delete($id = null) {
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_school', $_SERVER['HTTP_REFERER']);
        }
        $this->SchoolEducation->id = $id;
        if (!$this->SchoolEducation->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (isset($id)) {
            $this->SchoolEducation->deleteAll(array('SchoolEducation.id' => $id));
            $this->Session->setFlash(__('Delete successful!'),'success');
            $this->redirect($this->Session->read('save_latest_link_school'));
        }
        $this->Session->write('flag_link_school', 1);
    }

}

?>
