<?php

App::uses('Controller', 'Controller');

class AnnualIncomesController extends AppController {

    public $uses = array('AnnualIncome', 'UserInfo');
    public $components = array('Paginator');
    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('annual_id');
        $this->Session->write('flag_link_annual', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'AnnualIncome.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('AnnualIncome.employee_id' => 'ASC')
        );

        $this->set('annualIncome', $this->Paginator->paginate('AnnualIncome'));
        $this->set(array(
            'title_for_layout' => '年収情報',
            'page_title' => '年収情報',
        ));
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
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_annual'));
                }
            }
        }
        $this->Session->write('flag_link_annual', 1);
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '年収計算',
            'page_title' => '年収計算',
        ));
        $this->set('readonly', '');
        $this->render('detail');
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
            unset($data['AnnualIncome']['employee_id']);
            if ($this->AnnualIncome->customValidate()) {
                if ($this->AnnualIncome->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_annual'));
                }
            }
        } else {

            $this->request->data = $this->AnnualIncome->findById($id);
        }
        $this->Session->write('flag_link_annual', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '年収計算',
            'page_title' => '年収計算',
        ));
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_annual') == 0) {
            $this->Session->write('save_latest_link_annual', $_SERVER['HTTP_REFERER']);
        }

        if (intval($id > 0) || !empty($id)) {
            $this->AnnualIncome->id = $id;
            $data['AnnualIncome']['delete_flg'] = DELETE_FLG_ON;
            $data['AnnualIncome']['beforeSave'] = false;
            if ($this->AnnualIncome->save($data)) {
                $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
            } else {
                $this->Session->setFlash(__('UAD_ERR_MSG0001'), 'error');
            }
        }
        $this->Session->write('flag_link_annual', 1);
    }
}
?>
